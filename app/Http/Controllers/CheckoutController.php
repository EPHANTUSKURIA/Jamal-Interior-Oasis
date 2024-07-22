<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Order;

class CheckoutController extends Controller
{
    // Show the checkout page
    public function index()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        return view('checkout', ['cart' => $cart]);
    }

    // Process the checkout
    public function process(Request $request)
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $deliveryOption = $request->input('delivery_option');
        $deliveryAddress = $request->input('delivery_address');
        $totalPrice = $this->calculateTotalPrice($cart);

        // Validate the delivery option
        if ($deliveryOption == 'delivery' && empty($deliveryAddress)) {
            return redirect()->route('checkout.index')->with('error', 'Please provide a delivery address');
        }

        // Create the order
        $order = new Order();
        $order->user_id = auth()->id(); // Assuming user is authenticated
        $order->total_price = $totalPrice;
        $order->delivery_option = $deliveryOption;
        $order->delivery_address = $deliveryOption == 'delivery' ? $deliveryAddress : null;
        $order->save();

        // Save order items
        foreach ($cart as $productId => $item) {
            $order->items()->create([
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear the cart
        Session::forget('cart');

        return redirect()->route('order-confirmation')->with('success', 'Order placed successfully');
    }

    // Calculate the total price of the cart
    private function calculateTotalPrice($cart)
    {
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }
}
