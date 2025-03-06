<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Services\CategoryService;
use App\Services\SubcategoryService;

class AdminController extends Controller
{
    protected $profileService;
    protected $categoryService;
    protected $subcategoryService;

    public function __construct(ProfileService $profileService, CategoryService $categoryService, SubcategoryService $subcategoryService)
    {
        $this->profileService = $profileService;
        $this->categoryService = $categoryService;
        $this->subcategoryService = $subcategoryService;
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = $this->profileService->getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function profilesCategories(User $user)
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.profiles.categories', compact('user', 'categories'));
    }

    public function updateProfilesCategories(Request $request, User $user)
    {
        $this->profileService->syncUserCategories($user, $request->categories);
        return redirect()->route('admin.users');
    }

    public function profilesSubcategories(User $user)
    {
        $subcategories = $this->subcategoryService->getAllSubcategoriesWithCategory();
        return view('admin.profiles.subcategories', compact('user', 'subcategories'));
    }

    public function updateProfilesSubcategories(Request $request, User $user)
    {
        $this->profileService->syncUserSubcategories($user, $request->subcategories);
        return redirect()->route('admin.users');
    }
}