<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{



public function index()
    {
        return view('profile', ['title' => 'Your Profile']);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:5',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->update($request->only('name', 'email'));

        return back()->with('status_profile', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status_password', 'Password updated successfully!');
    }
}
