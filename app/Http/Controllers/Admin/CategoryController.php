<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private const ASSOCIATION_MESSAGE = 'You cannot perform this action because this category is associated with sub-categories or products.';

    public function index()
    {
        $categories = Category::withTrashed()->orderBy('created_at', 'desc')->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'category_url' => $request->filled('category_url')
                ? Str::slug($request->category_url)
                : Str::slug($request->title),
        ]);

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only([
                'title', 'category_url', 'short_note', 'description',
                'detail_page_title', 'detail_page_shortnote',
                'listing_image_alt', 'detail_image_alt',
                'meta_title', 'meta_description',
            ]);

            if ($request->hasFile('icon')) {
                $data['icon'] = storeImageWithTimeId($request->file('icon'), 'categories/icons');
            }
            if ($request->hasFile('listing_image')) {
                $data['listing_image'] = storeImageWithTimeId($request->file('listing_image'), 'categories/listing');
            }
            if ($request->hasFile('detail_image')) {
                $data['detail_image'] = storeImageWithTimeId($request->file('detail_image'), 'categories/detail');
            }
            if ($request->hasFile('brochure_pdf')) {
                $data['brochure_pdf'] = storeFileWithTimeId($request->file('brochure_pdf'), 'categories/brochures');
            }

            $data['stats']     = $this->collectStats($request);
            $data['is_active'] = $request->boolean('is_active');

            Category::create($data);

            return redirect()->route('categories')->with('toast_success', 'Category created successfully.');

        } catch (\Exception $e) {
            Log::error('Category store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to save category: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->merge([
            'category_url' => $request->filled('category_url')
                ? Str::slug($request->category_url)
                : Str::slug($request->title),
        ]);

        $validator = Validator::make($request->all(), $this->rules($category->id));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only([
                'title', 'category_url', 'short_note', 'description',
                'detail_page_title', 'detail_page_shortnote',
                'listing_image_alt', 'detail_image_alt',
                'meta_title', 'meta_description',
            ]);

            if ($request->hasFile('icon')) {
                deleteStoredFile($category->icon);
                $data['icon'] = storeImageWithTimeId($request->file('icon'), 'categories/icons');
            }
            if ($request->hasFile('listing_image')) {
                deleteStoredFile($category->listing_image);
                $data['listing_image'] = storeImageWithTimeId($request->file('listing_image'), 'categories/listing');
            }
            if ($request->hasFile('detail_image')) {
                deleteStoredFile($category->detail_image);
                $data['detail_image'] = storeImageWithTimeId($request->file('detail_image'), 'categories/detail');
            }
            if ($request->hasFile('brochure_pdf')) {
                deleteStoredFile($category->brochure_pdf);
                $data['brochure_pdf'] = storeFileWithTimeId($request->file('brochure_pdf'), 'categories/brochures');
            }

            $data['stats']     = $this->collectStats($request);
            $data['is_active'] = $request->boolean('is_active');

            $category->update($data);

            return redirect()->route('categories')->with('toast_success', 'Category updated successfully.');

        } catch (\Exception $e) {
            Log::error('Category update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to update category: ' . $e->getMessage());
        }
    }

    /**
     * Soft delete — moves the category to trash. Files are kept on disk
     * so a later Restore still has its images/brochure intact.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->hasAssociations()) {
            return redirect()->route('categories')->with('toast_error', self::ASSOCIATION_MESSAGE);
        }

        try {
            $category->delete();

            return redirect()->route('categories')->with('toast_success', 'Category moved to trash.');

        } catch (\Exception $e) {
            Log::error('Category soft delete failed: ' . $e->getMessage());

            return redirect()->route('categories')->with('toast_error', 'Failed to delete category.');

        }
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('categories')->with('toast_success', 'Category restored.');
    }

    private function rules(?int $ignoreId = null): array
    {
        $isCreate = is_null($ignoreId);

        $urlRule = 'required|string|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:categories,category_url';
        if (! $isCreate) {
            $urlRule .= ',' . $ignoreId;
        }

        return [
            'title'                 => 'required|string|max:255',
            'category_url'          => $urlRule,
            'short_note'            => 'nullable|string|max:500',
            'icon'                  => 'nullable|file|image|mimes:jpg,jpeg,png,webp,svg|max:1024',

            'description'           => 'required|string',
            'detail_page_title'     => 'nullable|string|max:255',
            'detail_page_shortnote' => 'nullable|string|max:500',

            'listing_image'         => ($isCreate ? 'required' : 'nullable') . '|file|image|mimes:jpg,jpeg,png,webp|max:2048',
            'listing_image_alt'     => 'nullable|string|max:255',
            'detail_image'          => ($isCreate ? 'required' : 'nullable') . '|file|image|mimes:jpg,jpeg,png,webp|max:2048',
            'detail_image_alt'      => 'nullable|string|max:255',
            'brochure_pdf'          => 'nullable|file|mimes:pdf|max:5120',

            'stats_number.*'        => 'nullable|string|max:50',
            'stats_title.*'         => 'nullable|string|max:255',

            'meta_title'            => 'nullable|string|max:255',
            'meta_description'      => 'nullable|string|max:500',

            'is_active'             => 'nullable|boolean',
        ];
    }

    private function collectStats(Request $request): array
    {
        return array_values(array_filter(array_map(function ($number, $title) {
            $number = trim($number ?? '');
            $title  = trim($title ?? '');
            if ($number === '' && $title === '') {
                return null;
            }

            return ['number' => $number, 'title' => $title];
        }, $request->input('stats_number', []), $request->input('stats_title', []))));
    }

    public function toggleStatus($id)
    {
        $category            = Category::findOrFail($id);
        $category->is_active = ! $category->is_active;
        $category->save();

        return response()->json([
            'success'   => true,
            'is_active' => $category->is_active,

        ]);
    }

}
