<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TrustedPartnerController;
use App\Http\Controllers\Admin\WorkspaceCategoryController;
use App\Http\Controllers\Admin\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [LoginController::class, 'register_page'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.store');
    Route::get('/login', [LoginController::class, 'login_page'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
});

Route::middleware(['auth', 'role:admin,super_admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
    Route::delete('/categories/{id}/force', [CategoryController::class, 'forceDestroy'])->name('categories.force_delete');
    Route::patch('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    Route::get('/banners', [BannerController::class, 'index'])->name('banners');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banners.delete');
    Route::delete('/banners/{id}/force', [BannerController::class, 'forceDestroy'])->name('banners.force_delete');
    Route::patch('/banners/{id}/restore', [BannerController::class, 'restore'])->name('banners.restore');

    Route::get('/partners', [TrustedPartnerController::class, 'index'])->name('partners');
    Route::get('/partners/create', [TrustedPartnerController::class, 'create'])->name('partners.create');
    Route::post('/partners', [TrustedPartnerController::class, 'store'])->name('partners.store');
    Route::get('/partners/{id}/edit', [TrustedPartnerController::class, 'edit'])->name('partners.edit');
    Route::put('/partners/{id}', [TrustedPartnerController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{id}', [TrustedPartnerController::class, 'destroy'])->name('partners.delete');
    Route::delete('/partners/{id}/force', [TrustedPartnerController::class, 'forceDestroy'])->name('partners.force_delete');
    Route::patch('/partners/{id}/restore', [TrustedPartnerController::class, 'restore'])->name('partners.restore');

    Route::get('/workspaces', [WorkspaceController::class, 'index'])->name('workspaces');
    Route::get('/workspaces/create', [WorkspaceController::class, 'create'])->name('workspaces.create');
    Route::post('/workspaces', [WorkspaceController::class, 'store'])->name('workspaces.store');
    Route::get('/workspaces/{id}/edit', [WorkspaceController::class, 'edit'])->name('workspaces.edit');
    Route::put('/workspaces/{id}', [WorkspaceController::class, 'update'])->name('workspaces.update');
    Route::delete('/workspaces/{id}', [WorkspaceController::class, 'destroy'])->name('workspaces.delete');
    Route::delete('/workspaces/{id}/force', [WorkspaceController::class, 'forceDestroy'])->name('workspaces.force_delete');
    Route::patch('/workspaces/{id}/restore', [WorkspaceController::class, 'restore'])->name('workspaces.restore');

    Route::get('/branches', [BranchController::class, 'index'])->name('branches');
    Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
    Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/{id}/edit', [BranchController::class, 'edit'])->name('branches.edit');
    Route::put('/branches/{id}', [BranchController::class, 'update'])->name('branches.update');
    Route::delete('/branches/{id}', [BranchController::class, 'destroy'])->name('branches.delete');
    Route::delete('/branches/{id}/force', [BranchController::class, 'forceDestroy'])->name('branches.force_delete');
    Route::patch('/branches/{id}/restore', [BranchController::class, 'restore'])->name('branches.restore');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/settings/create', [SettingController::class, 'create'])->name('settings.create');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::get('/settings/{id}/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/{id}', [SettingController::class, 'update'])->name('settings.update');
    Route::delete('/settings/{id}', [SettingController::class, 'destroy'])->name('settings.delete');
    Route::delete('/settings/{id}/force', [SettingController::class, 'forceDestroy'])->name('settings.force_delete');
    Route::patch('/settings/{id}/restore', [SettingController::class, 'restore'])->name('settings.restore');

    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');
    Route::delete('/blogs/{id}/force', [BlogController::class, 'forceDestroy'])->name('blogs.force_delete');
    Route::patch('/blogs/{id}/restore', [BlogController::class, 'restore'])->name('blogs.restore');

    Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub_categories');
    Route::get('/sub-categories/create', [SubCategoryController::class, 'create'])->name('sub_categories.create');
    Route::post('/sub-categories', [SubCategoryController::class, 'store'])->name('sub_categories.store');
    Route::get('/sub-categories/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub_categories.edit');
    Route::put('/sub-categories/{id}', [SubCategoryController::class, 'update'])->name('sub_categories.update');
    Route::delete('/sub-categories/{id}', [SubCategoryController::class, 'destroy'])->name('sub_categories.delete');
    Route::delete('/sub-categories/{id}/force', [SubCategoryController::class, 'forceDestroy'])->name('sub_categories.force_delete');
    Route::patch('/sub-categories/{id}/restore', [SubCategoryController::class, 'restore'])->name('sub_categories.restore');

// AJAX-only: called from the "+ Add Category" panel inside the workspace form.
    Route::post('/workspace-categories', [WorkspaceCategoryController::class, 'store'])->name('workspace_categories.store');
    Route::delete('/workspace-categories/{id}', [WorkspaceCategoryController::class, 'destroy'])->name('workspace_categories.destroy');

});
