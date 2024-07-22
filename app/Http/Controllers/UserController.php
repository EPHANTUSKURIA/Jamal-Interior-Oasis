<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    /**
     * Show the user's profile page.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('account', ['user' => $user]);
    }

    /**
     * Show the user's order history.
     *
     * @return \Illuminate\View\View
     */
    public function orderHistory()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $orders = Order::where('user_id', $user->id)->get(); // Fetch orders associated with the user
        return view('order_history', ['orders' => $orders]);
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

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed', // If password change is included
            // Add other validation rules as needed
        ]);

        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // Update password if it is provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
