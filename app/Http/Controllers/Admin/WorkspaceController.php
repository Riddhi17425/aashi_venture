<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\WorkspaceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class WorkspaceController extends Controller
{
    /**
     * Grouped listing: one row per category, with a thumbnail preview
     * and image count, instead of one row per image.
     */
    public function index()
    {
        $categories = WorkspaceCategory::withCount('workspaces')
            ->with(['workspaces' => function ($q) {
                $q->orderBy('sort_order');
            }])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.workspaces.index', compact('categories'));
    }

    /**
     * Shows the category picker + "upload first images" form.
     * Used to start a brand-new category's gallery.
     */
    public function create()
    {
        $categories = WorkspaceCategory::orderBy('sort_order')->orderBy('name')->get();

        return view('admin.workspaces.create', compact('categories'));
    }

    /**
     * Creates multiple workspace rows at once (one per uploaded file),
     * all under the chosen category.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'workspace_category_id' => 'required|exists:workspace_categories,id',
            'images'                => 'required|array|min:1',
            'images.*'              => 'file|image|mimes:jpg,jpeg,png,webp|max:5120',
            'sort_order'            => 'nullable|integer|min:0',
            'is_active'             => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            foreach ($request->file('images') as $file) {
                Workspace::create([
                    'workspace_category_id' => $request->workspace_category_id,
                    'image'                 => storeImageWithTimeId($file, 'workspaces'),
                    'sort_order'            => $request->input('sort_order', 0),
                    'is_active'             => $request->boolean('is_active'),
                ]);
            }

            $count   = count($request->file('images'));
            $message = $count > 1 ? "{$count} workspace images added successfully." : 'Workspace image added successfully.';

            return redirect()->route('workspaces')->with('toast_success', $message);
        } catch (\Exception $e) {
            Log::error('Workspace store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to save workspace image(s): ' . $e->getMessage());
        }
    }

    /**
     * Opens the gallery for the category that this image belongs to —
     * showing every image in that category together, with per-image
     * delete + status toggle, and an upload area for adding more.
     */
    public function edit($id)
    {
        $workspace  = Workspace::findOrFail($id);
        $categories = WorkspaceCategory::orderBy('sort_order')->orderBy('name')->get();

        // all images sharing this same category, so the gallery grid can show them
        $categoryImages = Workspace::where('workspace_category_id', $workspace->workspace_category_id)
            ->orderBy('sort_order')
            ->get();

        return view('admin.workspaces.edit', compact('workspace', 'categories', 'categoryImages'));
    }

    /**
     * AJAX: bulk-upload additional images into an existing category's gallery.
     * Called from the edit screen's upload button.
     */
    public function uploadImages(Request $request, $categoryId)
    {
        WorkspaceCategory::findOrFail($categoryId);

        $validator = Validator::make($request->all(), [
            'images'   => 'required|array|min:1',
            'images.*' => 'file|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $created = [];

            foreach ($request->file('images') as $file) {
                $workspace = Workspace::create([
                    'workspace_category_id' => $categoryId,
                    'image'                 => storeImageWithTimeId($file, 'workspaces'),
                    'sort_order'            => 0,
                    'is_active'             => true,
                ]);

                $created[] = [
                    'id'        => $workspace->id,
                    'image_url' => $workspace->image_url,
                    'is_active' => $workspace->is_active,
                ];
            }

            return response()->json(['success' => true, 'images' => $created]);
        } catch (\Exception $e) {
            Log::error('Workspace gallery upload failed: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Failed to upload image(s).'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $workspace = Workspace::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'workspace_category_id' => 'required|exists:workspace_categories,id',
            'images'                => 'nullable|array',
            'images.*'              => 'file|image|mimes:jpg,jpeg,png,webp|max:5120',
            'sort_order'            => 'nullable|integer|min:0',
            'is_active'             => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // update this row's own fields
            $workspace->update([
                'workspace_category_id' => $request->workspace_category_id,
                'sort_order'            => $request->input('sort_order', 0),
                'is_active'             => $request->boolean('is_active'),
            ]);

            // any newly selected files become additional rows in the same category
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    Workspace::create([
                        'workspace_category_id' => $request->workspace_category_id,
                        'image'                 => storeImageWithTimeId($file, 'workspaces'),
                        'sort_order'            => $request->input('sort_order', 0),
                        'is_active'             => $request->boolean('is_active'),
                    ]);
                }
            }

            return redirect()->route('workspaces')->with('toast_success', 'Workspace image(s) updated successfully.');
        } catch (\Exception $e) {
            Log::error('Workspace update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to update workspace image: ' . $e->getMessage());
        }
    }

    /**
     * AJAX: soft delete a single image from the gallery.
     */
    public function destroy($id)
    {
        $workspace = Workspace::findOrFail($id);

        try {
            $workspace->delete();

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['success' => true]);
            }

            return redirect()->route('workspaces')->with('toast_success', 'Workspace image moved to trash.');
        } catch (\Exception $e) {
            Log::error('Workspace soft delete failed: ' . $e->getMessage());

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Failed to delete image.'], 500);
            }

            return redirect()->route('workspaces')->with('toast_error', 'Failed to delete workspace image.');
        }
    }

    public function restore($id)
    {
        $workspace = Workspace::withTrashed()->findOrFail($id);
        $workspace->restore();

        return redirect()->route('workspaces')->with('toast_success', 'Workspace image restored.');
    }

    /**
     * AJAX: toggle a single image's active status from the gallery.
     */
    public function toggleStatus($id)
    {
        $workspace            = Workspace::findOrFail($id);
        $workspace->is_active = ! $workspace->is_active;
        $workspace->save();

        return response()->json([
            'success'   => true,
            'is_active' => $workspace->is_active,
        ]);
    }
}