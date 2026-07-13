<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::withTrashed()
            ->with('category')
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $categories = $this->activeCategories();

        return view('admin.banners.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only([
                'category_id', 'title', 'short_note', 'description',
                'mobile_image_alt', 'desktop_image_alt',
            ]);

            if ($request->hasFile('mobile_image')) {
                $data['mobile_image'] = storeImageWithTimeId($request->file('mobile_image'), 'banners/mobile');
            }
            if ($request->hasFile('desktop_image')) {
                $data['desktop_image'] = storeImageWithTimeId($request->file('desktop_image'), 'banners/desktop');
            }

            $data['sort_order'] = $request->input('sort_order', 0);
            $data['is_active']  = $request->boolean('is_active');

            Banner::create($data);

            return redirect()->route('banners')->with('success', 'Banner created successfully.');
        } catch (\Exception $e) {
            Log::error('Banner store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Failed to save banner: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $banner     = Banner::findOrFail($id);
        $categories = $this->activeCategories($banner->category_id);

        return view('admin.banners.edit', compact('banner', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only([
                'category_id', 'title', 'short_note', 'description',
                'mobile_image_alt', 'desktop_image_alt',
            ]);

            if ($request->hasFile('mobile_image')) {
                deleteStoredFile($banner->mobile_image);
                $data['mobile_image'] = storeImageWithTimeId($request->file('mobile_image'), 'banners/mobile');
            }
            if ($request->hasFile('desktop_image')) {
                deleteStoredFile($banner->desktop_image);
                $data['desktop_image'] = storeImageWithTimeId($request->file('desktop_image'), 'banners/desktop');
            }

            $data['sort_order'] = $request->input('sort_order', 0);
            $data['is_active']  = $request->boolean('is_active');

            $banner->update($data);

            return redirect()->route('banners')->with('success', 'Banner updated successfully.');
        } catch (\Exception $e) {
            Log::error('Banner update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Failed to update banner: ' . $e->getMessage());
        }
    }

    /**
     * Soft delete — moves the banner to trash. Files are kept on disk
     * so a later Restore still has its images intact.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        try {
            $banner->delete();

            return redirect()->route('banners')->with('success', 'Banner moved to trash.');
        } catch (\Exception $e) {
            Log::error('Banner soft delete failed: ' . $e->getMessage());

            return redirect()->route('banners')->with('error', 'Failed to delete banner.');
        }
    }

    /**
     * Permanently delete — only meaningful for an already-trashed banner.
     * Removes the DB row and its uploaded files for good.
     */
    public function forceDestroy($id)
    {
        $banner = Banner::withTrashed()->findOrFail($id);

        try {
            deleteStoredFile($banner->mobile_image);
            deleteStoredFile($banner->desktop_image);

            $banner->forceDelete();

            return redirect()->route('banners')->with('success', 'Banner permanently deleted.');
        } catch (\Exception $e) {
            Log::error('Banner permanent delete failed: ' . $e->getMessage());

            return redirect()->route('banners')->with('error', 'Failed to permanently delete banner.');
        }
    }

    public function restore($id)
    {
        $banner = Banner::withTrashed()->findOrFail($id);
        $banner->restore();

        return redirect()->route('banners')->with('success', 'Banner restored.');
    }

    private function rules(): array
    {
        return [
            'category_id'       => 'required|exists:categories,id',
            'title'             => 'required|string|max:255',
            'short_note'        => 'nullable|string|max:500',
            'description'       => 'nullable|string',

            'mobile_image'      => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:5120',
            'mobile_image_alt'  => 'nullable|string|max:255',
            'desktop_image'     => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:5120',
            'desktop_image_alt' => 'nullable|string|max:255',

            'sort_order'        => 'nullable|integer|min:0',
            'is_active'         => 'nullable|boolean',
        ];
    }

    /**
     * Categories for the dropdown. On edit, the banner's current category
     * is included even if it has since been made inactive, so the form
     * doesn't silently drop the existing selection.
     */
    private function activeCategories(?int $includeId = null)
    {
        return Category::where('is_active', true)
            ->orWhere('id', $includeId)
            ->orderBy('title')
            ->get();
    }
}
