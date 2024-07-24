<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class AccountController extends Controller
{
    /**
     * Show the user's profile page.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $user = Auth::user(); // Get the logged-in user

        if (!$user) {
            // If user is not authenticated, redirect to login
            return redirect()->route('login');
        }

        // Fetch orders associated with the user
        $orders = $user->orders;

        return view('profile', compact('user', 'orders')); // Pass the variables to the view
    }

    /**
     * Update the user's profile information.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        if (!$user) {
            // If user is not authenticated, redirect to login
            return redirect()->route('login');
        }

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed', // If password change is included
        ]);

        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // Update password if it is provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save(); // Save the updated user information

        return redirect()->route('account.profile')->with('success', 'Profile updated successfully!');
    }
}
