<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\Location;

class OrderController extends Controller
{
    /**
     * Show the order confirmation page.
     *
     * @return \Illuminate\View\View
     */
    public function confirm()
    {
        // Fetch necessary data for the order confirmation
        $cart = Session::get('cart', []);
        $total = array_sum(array_column($cart, 'price')); // Assuming 'price' is a key in cart items

        return view('order_confirmation', [
            'cart' => $cart,
            'total' => $total
        ]);
    }

    /**
     * Handle the checkout process.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {
        $cart = Session::get('cart', []);
        $total = array_sum(array_column($cart, 'price')); // Assuming 'price' is a key in cart items
        
        // Validate the request
        $request->validate([
            'delivery_option' => 'required',
            'delivery_location' => 'required_if:delivery_option,delivery',
        ]);

        // Handle the checkout based on delivery option
        $order = new Order();
        $order->user_id = auth()->id(); // Assuming user is authenticated
        $order->total = $total;
        $order->delivery_option = $request->input('delivery_option');
        $order->delivery_location = $request->input('delivery_location');
        $order->save();

        // Clear the cart session
        Session::forget('cart');

        // Redirect to order confirmation page
        return redirect()->route('order.confirm');
    }
}
