<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::withTrashed()->with('category')->orderBy('created_at', 'desc')->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('title')->get();

        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'url' => $request->filled('url') ? Str::slug($request->url) : Str::slug($request->title),
        ]);

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only([
                'category_id', 'title', 'url', 'date',
                'short_description', 'long_description', 'conclusion',
                'front_image_alt', 'detail_image_alt', 'cta_image_alt',
                'cta_link_url', 'schema_json',
                'meta_title', 'meta_description', 'status',
            ]);

            if ($request->hasFile('front_image')) {
                $data['front_image'] = storeImageWithTimeId($request->file('front_image'), 'blogs/front');
            }
            if ($request->hasFile('detail_image')) {
                $data['detail_image'] = storeImageWithTimeId($request->file('detail_image'), 'blogs/detail');
            }
            if ($request->hasFile('cta_image')) {
                $data['cta_image'] = storeImageWithTimeId($request->file('cta_image'), 'blogs/cta');
            }

            $data['faqs'] = $this->collectFaqs($request);

            Blog::create($data);

            return redirect()->route('blogs')->with('toast_success', 'Blog post created successfully.');
        } catch (\Exception $e) {
            Log::error('Blog store failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to save blog post: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $blog       = Blog::findOrFail($id);
        $categories = Category::where('is_active', true)->orderBy('title')->get();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->merge([
            'url' => $request->filled('url') ? Str::slug($request->url) : Str::slug($request->title),
        ]);

        $validator = Validator::make($request->all(), $this->rules($blog->id));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only([
                'category_id', 'title', 'url', 'date',
                'short_description', 'long_description', 'conclusion',
                'front_image_alt', 'detail_image_alt', 'cta_image_alt',
                'cta_link_url', 'schema_json',
                'meta_title', 'meta_description', 'status',
            ]);

            if ($request->hasFile('front_image')) {
                deleteStoredFile($blog->front_image);
                $data['front_image'] = storeImageWithTimeId($request->file('front_image'), 'blogs/front');
            }
            if ($request->hasFile('detail_image')) {
                deleteStoredFile($blog->detail_image);
                $data['detail_image'] = storeImageWithTimeId($request->file('detail_image'), 'blogs/detail');
            }
            if ($request->hasFile('cta_image')) {
                deleteStoredFile($blog->cta_image);
                $data['cta_image'] = storeImageWithTimeId($request->file('cta_image'), 'blogs/cta');
            }

            $data['faqs'] = $this->collectFaqs($request);

            $blog->update($data);

            return redirect()->route('blogs')->with('toast_success', 'Blog post updated successfully.');
        } catch (\Exception $e) {
            Log::error('Blog update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('toast_error', 'Failed to update blog post: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        try {
            $blog->delete();

            return redirect()->route('blogs')->with('toast_success', 'Blog post moved to trash.');
        } catch (\Exception $e) {
            Log::error('Blog soft delete failed: ' . $e->getMessage());

            return redirect()->route('blogs')->with('toast_error', 'Failed to delete blog post.');
        }
    }

    public function restore($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $blog->restore();

        return redirect()->route('blogs')->with('toast_success', 'Blog post restored.');
    }

    /**
     * Toggle between draft and published (blogs use a status enum,
     * not a plain is_active boolean like other modules).
     */
    public function toggleStatus($id)
    {
        $blog         = Blog::findOrFail($id);
        $blog->status = $blog->status === 'published' ? 'draft' : 'published';
        $blog->save();

        return response()->json([
            'success' => true,
            'status'  => $blog->status,
        ]);
    }

    private function rules(?int $ignoreId = null): array
    {
        $isCreate = is_null($ignoreId);

        $urlRule = 'required|string|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:blogs,url';
        if (! $isCreate) {
            $urlRule .= ',' . $ignoreId;
        }

        return [
            'category_id'       => 'required|exists:categories,id',
            'title'             => 'required|string|max:255',
            'url'               => $urlRule,
            'date'              => 'required|date',

            'short_description' => 'required|string',
            'long_description'  => 'required|string',
            'conclusion'        => 'nullable|string',

            'front_image'       => ($isCreate ? 'required' : 'nullable') . '|file|image|mimes:jpg,jpeg,png,webp|max:2048',
            'front_image_alt'   => 'nullable|string|max:255',
            'detail_image'      => ($isCreate ? 'required' : 'nullable') . '|file|image|mimes:jpg,jpeg,png,webp|max:2048',
            'detail_image_alt'  => 'nullable|string|max:255',
            'cta_image'         => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cta_image_alt'     => 'nullable|string|max:255',
            'cta_link_url'      => 'nullable|url|max:255',

            'schema_json'       => 'nullable|string',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:500',

            'faqs_question.*'   => 'nullable|string|max:500',
            'faqs_answer.*'     => 'nullable|string',

            'status'            => 'required|in:draft,published',
        ];
    }

    private function collectFaqs(Request $request): array
    {
        return array_values(array_filter(array_map(function ($question, $answer) {
            $question = trim($question ?? '');
            $answer   = trim($answer ?? '');
            if ($question === '' && $answer === '') {
                return null;
            }

            return ['question' => $question, 'answer' => $answer];
        }, $request->input('faqs_question', []), $request->input('faqs_answer', []))));
    }
}
