<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    // Profile Page
    public function index()
    {
        $user = Auth::user();

        return view('User.profile', compact('user'));
    }

    // Profile Update
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::find(Auth::id());

        // Image Upload
        if ($request->hasFile('image')) {

            // Delete Old Image
            if ($user->image && File::exists(public_path('uploads/profile/'.$user->image))) {
                File::delete(public_path('uploads/profile/'.$user->image));
            }

            $image = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads/profile'), $image);

            $user->image = $image;
        }

        // Update Data
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }
}
