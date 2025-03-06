<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Exception;

class CategoryService
{
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

    public function createCategory(array $data)
    {
        try {
            return Category::create($data);
        } catch (QueryException $e) {
            \Log::error('Error creating category: ' . $e->getMessage());
            throw new Exception('Failed to create category.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function getCategoryById(int $categoryId)
    {
        try {
            return Category::find($categoryId);
        } catch (QueryException $e) {
            \Log::error('Error fetching category by ID: ' . $e->getMessage());
            throw new Exception('Failed to fetch category.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function updateCategory(Category $category, array $data)
    {
        try {
            $category->update($data);
            return $category;
        } catch (QueryException $e) {
            \Log::error('Error updating category: ' . $e->getMessage());
            throw new Exception('Failed to update category.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function deleteCategory(Category $category)
    {
        try {
            $category->delete();
        } catch (QueryException $e) {
            \Log::error('Error deleting category: ' . $e->getMessage());
            throw new Exception('Failed to delete category.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }
}