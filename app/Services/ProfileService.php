<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\QueryException;
use Exception;

class ProfileService
{
    public function getAllUsers()
    {
        try {
            return User::all();
        } catch (QueryException $e) {
            \Log::error('Error fetching all users: ' . $e->getMessage());
            throw new Exception('Failed to fetch users.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function getUsersWithPhotos()
    {
        try {
            return User::whereNotNull('photo_path')->get();
        } catch (QueryException $e) {
            \Log::error('Error fetching users with photos: ' . $e->getMessage());
            throw new Exception('Failed to fetch users with photos.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function getUserById(int $userId)
    {
        try {
            return User::find($userId);
        } catch (QueryException $e) {
            \Log::error('Error fetching user by ID: ' . $e->getMessage());
            throw new Exception('Failed to fetch user.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function syncUserCategories(User $user, array $categories)
    {
        try {
            $user->categories()->sync($categories);
        } catch (QueryException $e) {
            \Log::error('Error syncing user categories: ' . $e->getMessage());
            throw new Exception('Failed to sync user categories.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }

    public function syncUserSubcategories(User $user, array $subcategories)
    {
        try {
            $user->subcategories()->sync($subcategories);
        } catch (QueryException $e) {
            \Log::error('Error syncing user subcategories: ' . $e->getMessage());
            throw new Exception('Failed to sync user subcategories.');
        } catch (Exception $e) {
            \Log::error('An unexpected error occurred: ' . $e->getMessage());
            throw new Exception('An unexpected error occurred.');
        }
    }
}