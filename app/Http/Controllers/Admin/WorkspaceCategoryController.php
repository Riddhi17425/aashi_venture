<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkspaceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WorkspaceCategoryController extends Controller
{
    /**
     * Called via AJAX from the "+ Add Category" panel inside the
     * Workspace create/edit form. Saves a new tab straight to the DB and
     * returns it as JSON so the form can push it into the <select> without
     * a page reload — same idea as WordPress's inline "Add New Category".
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:workspace_categories,name',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            $category = WorkspaceCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            return response()->json([
                'success'  => true,
                'category' => [
                    'id'   => $category->id,
                    'name' => $category->name,
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Workspace category store failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'errors'  => ['name' => ['Failed to save category. Please try again.']],
            ], 500);
        }
    }
    /**
     * Called via AJAX from the "Manage categories" panel inside the
     * Workspace create/edit form. Hard-deletes the category — no soft
     * delete for these, since they're just tab labels, not content.
     *
     * Blocked if any workspace image still points at this category
     * (the FK is restrictOnDelete at the DB level too, but we check here
     * first so we can return a friendly message instead of a raw SQL error).
     */
    public function destroy($id)
    {
        $category = WorkspaceCategory::findOrFail($id);

        if ($category->workspaces()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'This category has workspace images linked to it. Move or delete those images first.',
            ], 422);
        }

        try {
            $category->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Workspace category delete failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete category. Please try again.',
            ], 500);
        }
    }
}
