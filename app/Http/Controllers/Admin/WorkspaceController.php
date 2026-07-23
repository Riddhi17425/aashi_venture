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
    public function index()
    {
        $workspaces = Workspace::withTrashed()
            ->with('category')
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.workspaces.index', compact('workspaces'));
    }

    public function create()
    {
        $categories = WorkspaceCategory::orderBy('sort_order')->orderBy('name')->get();

        return view('admin.workspaces.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(isCreate: true));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['workspace_category_id', 'image_alt']);

            if ($request->hasFile('image')) {
                $data['image'] = storeImageWithTimeId($request->file('image'), 'workspaces');
            }

            $data['sort_order'] = $request->input('sort_order', 0);
            $data['is_active']  = $request->boolean('is_active');

            Workspace::create($data);

            return redirect()->route('workspaces')->with('toast_success', 'Workspace image added successfully.');
        } catch (\Exception $e) {
            Log::error('Workspace store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to save workspace image: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $workspace  = Workspace::findOrFail($id);
        $categories = WorkspaceCategory::orderBy('sort_order')->orderBy('name')->get();

        return view('admin.workspaces.edit', compact('workspace', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $workspace = Workspace::findOrFail($id);

        $validator = Validator::make($request->all(), $this->rules(isCreate: false));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['workspace_category_id', 'image_alt']);

            if ($request->hasFile('image')) {
                deleteStoredFile($workspace->image);
                $data['image'] = storeImageWithTimeId($request->file('image'), 'workspaces');
            }

            $data['sort_order'] = $request->input('sort_order', 0);
            $data['is_active']  = $request->boolean('is_active');

            $workspace->update($data);

            return redirect()->route('workspaces')->with('toast_success', 'Workspace image updated successfully.');
        } catch (\Exception $e) {
            Log::error('Workspace update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to update workspace image: ' . $e->getMessage());
        }
    }

    /**
     * Soft delete — moves the workspace image to trash. File is kept on
     * disk so a later Restore still has its image intact.
     */
    public function destroy($id)
    {
        $workspace = Workspace::findOrFail($id);

        try {
            $workspace->delete();

            return redirect()->route('workspaces')->with('toast_success', 'Workspace image moved to trash.');
        } catch (\Exception $e) {
            Log::error('Workspace soft delete failed: ' . $e->getMessage());

            return redirect()->route('workspaces')->with('toast_error', 'Failed to delete workspace image.');
        }
    }

    public function restore($id)
    {
        $workspace = Workspace::withTrashed()->findOrFail($id);
        $workspace->restore();

        return redirect()->route('workspaces')->with('toast_success', 'Workspace image restored.');
    }

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

    private function rules(bool $isCreate): array
    {
        return [
            'workspace_category_id' => 'required|exists:workspace_categories,id',
            'image'                 => ($isCreate ? 'required' : 'nullable') . '|file|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image_alt'             => 'nullable|string|max:255',
            'sort_order'            => 'nullable|integer|min:0',
            'is_active'             => 'nullable|boolean',
        ];
    }
}
