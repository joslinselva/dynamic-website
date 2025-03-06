<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Categories routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/categories/add', [CategoryController::class, 'create'])->name('admin.categories.add');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Subcategories routes
    Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('/subcategories/add', [SubcategoryController::class, 'create'])->name('admin.subcategories.add');
    Route::post('/subcategories', [SubcategoryController::class, 'store'])->name('admin.subcategories.store');
    Route::get('/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('admin.subcategories.edit');
    Route::put('/subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('admin.subcategories.update');
    Route::delete('/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('admin.subcategories.destroy');

    // User routes
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{user}/categories', [AdminController::class, 'profilesCategories'])->name('admin.users.categories');
    Route::post('/users/{user}/categories', [AdminController::class, 'updateProfilesCategories'])->name('admin.users.categories.update');
    Route::get('/users/{user}/subcategories', [AdminController::class, 'profilesSubcategories'])->name('admin.users.subcategories');
    Route::post('/users/{user}/subcategories', [AdminController::class, 'updateProfilesSubcategories'])->name('admin.users.subcategories.update');
});


//Routes for profile photo updation
Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/profile/edit', function () {
        return view('admin.profile.edit');
    })->name('admin.profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');
});

//Routes for Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home');
