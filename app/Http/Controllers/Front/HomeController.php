<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\TrustedPartner;
use Illuminate\Http\Request;

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

        return view('front.index', compact('banners', 'partners'));
    }

    public function about()
    {
        $partners = TrustedPartner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('front.about', compact('partners'));
    }
}