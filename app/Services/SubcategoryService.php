<?php

namespace App\Services;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Exception;

class SubcategoryService
{
    public function getAllSubcategoriesWithCategory()
    {
        try {
            return Subcategory::with('category')->get();
        } catch (QueryException $e) {
            \Log::error('Error fetching all subcategories with category: ' . $e->getMessage());
            throw new Exception('Failed to fetch subcategories with category.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function createSubcategory(array $data)
    {
        try {
            return Subcategory::create($data);
        } catch (QueryException $e) {
            \Log::error('Error creating subcategory: ' . $e->getMessage());
            throw new Exception('Failed to create subcategory.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function getSubcategoryById(int $subcategoryId)
    {
        try {
            return Subcategory::find($subcategoryId);
        } catch (QueryException $e) {
            \Log::error('Error fetching subcategory by ID: ' . $e->getMessage());
            throw new Exception('Failed to fetch subcategory.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function updateSubcategory(Subcategory $subcategory, array $data)
    {
        try {
            $subcategory->update($data);
            return $subcategory;
        } catch (QueryException $e) {
            \Log::error('Error updating subcategory: ' . $e->getMessage());
            throw new Exception('Failed to update subcategory.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function deleteSubcategory(Subcategory $subcategory)
    {
        try {
            $subcategory->delete();
        } catch (QueryException $e) {
            \Log::error('Error deleting subcategory: ' . $e->getMessage());
            throw new Exception('Failed to delete subcategory.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function getAllCategories()
    {
        try {
            return Category::all();
        } catch (QueryException $e) {
            \Log::error('Error fetching all categories: ' . $e->getMessage());
            throw new Exception('Failed to fetch categories.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }
}