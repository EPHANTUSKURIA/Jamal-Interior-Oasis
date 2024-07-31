<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Import the Log facade
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // Show the checkout page
    public function index()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        // Calculate total price
        $totalPrice = $this->calculateTotalPrice($cart);

        return view('cart.checkout', [
            'cart' => $cart,
            'total' => $totalPrice,
        ]);
    }

    // Process the checkout
    public function process(Request $request)
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'delivery_option' => 'required|in:pickup,delivery',
            'delivery_address' => 'nullable|string|max:255',
        ]);

        $deliveryOption = $validated['delivery_option'];
        $deliveryAddress = $deliveryOption === 'delivery' ? $validated['delivery_address'] : null;
        $totalPrice = $this->calculateTotalPrice($cart);

        // Get the user ID and log it
        $userId = auth()->id();
        
        // Log the user ID and a warning message if it's null
        if (!$userId) {
            Log::warning('User ID is null in CheckoutController@process', [
                'ip' => $request->ip(),
                'session_id' => session()->getId(),
            ]);
            return redirect()->route('login')->with('error', 'Please log in to proceed with checkout.');
        }

        // Create the order
        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'delivery_option' => $deliveryOption,
            'delivery_address' => $deliveryAddress,
        ]);

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

        return redirect()->route('orders.confirm')->with('success', 'Order placed successfully');
    }public function __construct()
    {
        $this->middleware('auth');
    }
    


    // Calculate the total price of the cart
    private function calculateTotalPrice(array $cart): float
    {
        return array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    }
}
