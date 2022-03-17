<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show user profile with auth user
    public function index()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    // Update user profile with auth user
    public function update(Request $request)
    {
        $user = request()->user();
        // If it's "update-detail" form
        if ($request->has('update-detail')) {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users,email,' . $user->id,
            ]);
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                // Handle the image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/user'), $imageName);
                $user->image = $imageName;
            }
            $user->name = $request->name;
            $user->email = $request->email;
        }
        // If it's "update-password" form
        else if ($request->has('update-password')) {
            $request->validate([
                'old_password' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ]);
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
            }
            else {
                return redirect()->back()->withErrors(['old_password' => 'Wrong password']);
            }
        }
        else {
            return redirect()->back()->withErrors(['error' => 'Unknown form']);
        }

        // Try to save, if fails, return to profile edit page with error message and old input
        if (!$user->save()) {
            return redirect()
                ->route('user.profile')
                ->with('error', 'Failed to update user profile.')
                ->withInput();
        }

        // If success, return to profile page with success message
        return redirect()
            ->route('user.profile')
            ->with('success', 'User profile updated.');
    }
}
