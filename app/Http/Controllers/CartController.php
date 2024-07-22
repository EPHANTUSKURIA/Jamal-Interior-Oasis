<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart items
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart', ['cart' => $cart]);
    }

    // Add item to cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = Session::get('cart', []);

        // Add or update the item in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->input('quantity', 1);
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->input('quantity', 1),
                'image' => $product->image,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Item added to cart');
    }

    // Remove item from cart
    public function remove($id)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }

    // Checkout cart items
    public function checkout()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        // Logic for checkout process, e.g., calculate total price, etc.
        // You might want to pass data to the checkout view here
        return view('checkout', ['cart' => $cart]);
    }

    // Confirm order
    public function confirm(Request $request)
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        // Process order (e.g., save order to database, handle payment, etc.)

        // Clear cart
        Session::forget('cart');

        return redirect()->route('order-confirmation')->with('success', 'Order confirmed');
    }
}
