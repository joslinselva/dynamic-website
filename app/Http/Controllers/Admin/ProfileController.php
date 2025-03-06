<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if ($request->hasFile('photo')) {
            if ($user->photo_path) {
                Storage::delete($user->photo_path);
            }

            $path = $request->file('photo')->store('profile_photos', 'public');
            if (!Storage::exists('public/profile_photos')) {
                \Log::info('Directory public/profile_photos does not exist before store.');
            } else {
                \Log::info('Directory public/profile_photos exists before store.');
            }
            $user->photo_path = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }
}