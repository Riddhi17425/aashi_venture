<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.footer', function ($view) {
            $view->with('setting', Setting::first());
        });

        View::composer('layouts.master', function ($view) {
            $view->with('navCategories',
                Category::where('is_active', true)
                    ->orderBy('id')
                    ->get(['id', 'title', 'category_url'])
            );
        });
    }
} 