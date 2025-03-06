<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Services\SubcategoryService;

class SubcategoryController extends Controller
{
    protected $subcategoryService;

    public function __construct(SubcategoryService $subcategoryService)
    {
        $this->subcategoryService = $subcategoryService;
    }

    public function index()
    {
        $subcategories = $this->subcategoryService->getAllSubcategoriesWithCategory();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = $this->subcategoryService->getAllCategories();
        return view('admin.subcategories.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->subcategoryService->createSubcategory($request->all());
        return redirect()->route('admin.subcategories');
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = $this->subcategoryService->getAllCategories();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $this->subcategoryService->updateSubcategory($subcategory, $request->all());
        return redirect()->route('admin.subcategories');
    }

    public function destroy(Subcategory $subcategory)
    {
        $this->subcategoryService->deleteSubcategory($subcategory);
        return redirect()->route('admin.subcategories');
    }
}