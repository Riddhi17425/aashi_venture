<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Banner;
use App\Models\TrustedPartner;
use App\Models\Category;
use App\Models\WorkspaceCategory;
use App\Models\Newsletter;
use App\Models\Leader;
use App\Models\OurStory;
use Illuminate\Http\Request;
use App\Models\ContactFormInquiry;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', true)
            ->orderBy('sort_order')
            ->with('category')
            ->get();
       
        $partners = TrustedPartner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('id', 'asc')
            ->get();

        return view('front.index', compact('banners', 'partners', 'categories'));
    }

    public function about()
    {
        $ourStories = OurStory::where('is_active', true)
            ->orderBy('year', 'asc')
            ->get();

        $leaders = Leader::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $partners = TrustedPartner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('front.about', compact(
            'ourStories',
            'leaders',
            'partners',
        ));
    }

    public function contact()
    {
        $branches = Branch::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('front.contact', compact('branches'));
    }



    public function submitContactForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ], [
            'name.required'    => 'Please enter your name.',
            'email.required'   => 'Please enter your email address.',
            'email.email'      => 'Please enter a valid email address.',
            'subject.required' => 'Please enter a subject.',
            'message.required' => 'Please enter your message.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            ContactFormInquiry::create([
                'name'    => $request->name,
                'email'   => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Send to Google Sheet — happens BEFORE the return now
            try {
                Http::post(env('GOOGLE_SHEET_WEBHOOK_URL'), [
                    'date'    => now()->format('Y-m-d H:i:s'),
                    'name'    => $request->name,
                    'email'   => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                ]);
            } catch (\Exception $e) {
                Log::error('Google Sheet webhook failed: ' . $e->getMessage());
                // intentionally not re-thrown — a Sheet failure shouldn't break the user's form submission
            }

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been sent successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }

    public function factory()
    {
        $workspaceCategories = WorkspaceCategory::with(['workspaces' => function ($q) {
                $q->where('is_active', true)->orderBy('sort_order');
            }])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('front.factory', compact('workspaceCategories'));
    }

    public function subscribeNewsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:newsletters,email',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email'    => 'Please enter a valid email address.',
            'email.unique'   => 'This email is already subscribed.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            Newsletter::create([
                'email'      => $request->email,
                'ip_address' => $request->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing!',
            ]);
        } catch (\Exception $e) {
            Log::error('Newsletter subscription failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }

    public function productDetail($categoryUrl)
    {
        $category = Category::where('category_url', $categoryUrl)
            ->where('is_active', true)
            ->firstOrFail();

        return view('front.product-rainwear', compact('category'));
        // each route points to its own existing blade file, just now passing $category
    }

    
}