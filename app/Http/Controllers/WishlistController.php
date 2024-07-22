<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    /**
     * Show the user's wishlist.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $wishlistItems = Wishlist::where('user_id', $user->id)->get(); // Fetch wishlist items for the user

        return view('wishlist', ['wishlistItems' => $wishlistItems]);
    }

    /**
     * Add a product to the user's wishlist.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user
        $productId = $request->input('product_id'); // Product ID to add to wishlist

        // Check if the product is already in the user's wishlist
        if (!Wishlist::where('user_id', $user->id)->where('product_id', $productId)->exists()) {
            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to wishlist!');
    }

    /**
     * Remove a product from the user's wishlist.
     *
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($productId)
    {
        $user = Auth::user(); // Get the currently authenticated user

        // Find and delete the wishlist item
        Wishlist::where('user_id', $user->id)->where('product_id', $productId)->delete();

        return redirect()->back()->with('success', 'Product removed from wishlist!');
    }
}
