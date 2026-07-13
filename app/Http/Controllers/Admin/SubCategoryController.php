<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    private const ASSOCIATION_MESSAGE = 'You cannot perform this action because this sub-category is associated with categories.';

    public function index()
    {
        $subCategories = SubCategory::withTrashed()->with('category')->orderBy('created_at', 'desc')->get();

        return view('admin.sub_categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::orderBy('title')->get();

        return view('admin.sub_categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['category_id', 'title', 'image_alt']);

            if ($request->hasFile('image')) {
                $data['image'] = storeImageWithTimeId($request->file('image'), 'sub-categories');
            }

            $data['is_active'] = $request->boolean('is_active');

            SubCategory::create($data);

            return redirect()->route('sub_categories')->with('success', 'Sub-category created successfully.');
        } catch (\Exception $e) {
            Log::error('SubCategory store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Failed to save sub-category: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories  = Category::orderBy('title')->get();

        return view('admin.sub_categories.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['category_id', 'title', 'image_alt']);

            if ($request->hasFile('image')) {
                deleteStoredFile($subCategory->image);
                $data['image'] = storeImageWithTimeId($request->file('image'), 'sub-categories');
            }

            $data['is_active'] = $request->boolean('is_active');

            $subCategory->update($data);

            return redirect()->route('sub_categories')->with('success', 'Sub-category updated successfully.');
        } catch (\Exception $e) {
            Log::error('SubCategory update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Failed to update sub-category: ' . $e->getMessage());
        }
    }

    /**
     * Soft delete — moves the sub-category to trash. Files are kept on disk
     * so a later Restore still has its image intact.
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);

        if ($subCategory->hasAssociations()) {
            return redirect()->route('sub_categories')->with('error', self::ASSOCIATION_MESSAGE);
        }

        try {
            $subCategory->delete();

            return redirect()->route('sub_categories')->with('success', 'Sub-category moved to trash.');
        } catch (\Exception $e) {
            Log::error('SubCategory soft delete failed: ' . $e->getMessage());

            return redirect()->route('sub_categories')->with('error', 'Failed to delete sub-category.');
        }
    }

    /**
     * Permanently delete — only meaningful for an already-trashed sub-category.
     * Removes the DB row and its uploaded file for good.
     */
    public function forceDestroy($id)
    {
        $subCategory = SubCategory::withTrashed()->findOrFail($id);

        if ($subCategory->hasAssociations()) {
            return redirect()->route('sub_categories')->with('error', self::ASSOCIATION_MESSAGE);
        }

        try {
            deleteStoredFile($subCategory->image);

            $subCategory->forceDelete();

            return redirect()->route('sub_categories')->with('success', 'Sub-category permanently deleted.');
        } catch (\Exception $e) {
            Log::error('SubCategory permanent delete failed: ' . $e->getMessage());

            return redirect()->route('sub_categories')->with('error', 'Failed to permanently delete sub-category.');
        }
    }

    public function restore($id)
    {
        $subCategory = SubCategory::withTrashed()->findOrFail($id);
        $subCategory->restore();

        return redirect()->route('sub_categories')->with('success', 'Sub-category restored.');
    }

    private function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_alt'   => 'nullable|string|max:255',
            'is_active'   => 'nullable|boolean',
        ];
    }
}
