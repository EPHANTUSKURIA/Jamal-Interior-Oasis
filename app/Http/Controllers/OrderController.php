<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Show the order confirmation page.
     *
     * @return \Illuminate\View\View
     */
    public function confirm()
{
    // Fetch the latest order for the authenticated user and eager load items
    $order = Order::with('items')->where('user_id', auth()->id())->latest()->firstOrFail();

    // Ensure items is not null and initialize to an empty collection if necessary
    $items = $order->items ?: collect();

    // Calculate subtotal
    $order->subtotal = $items->sum(function ($item) {
        return $item->quantity * $item->price;
    });

    // Determine shipping cost based on delivery option
    $order->shipping_cost = $order->delivery_option == 'delivery' ? 10 : 0;

    // Calculate total cost
    $order->total = $order->subtotal + $order->shipping_cost;

    // Log order details
    Log::info('Order Details:', ['order' => $order]);

    // Pass the order to the view
    return view('orders.confirm', ['order' => $order]);
}



    /**
     * Handle the checkout process.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please log in to proceed with the checkout.');
    }

    $cart = Session::get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    $total = array_sum(array_column($cart, 'price'));

    $request->validate([
        'delivery_option' => 'required',
        'delivery_location' => 'required_if:delivery_option,delivery',
    ]);

    $order = new Order();
    $order->user_id = auth()->id(); // Ensure this returns a valid user ID
    $order->total_amount = $total;
    $order->delivery_option = $request->input('delivery_option');
    $order->delivery_location = $request->input('delivery_location');
    $order->order_date = now(); 
    $order->save();

    foreach ($cart as $productId => $item) {
        $order->items()->create([
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    Session::forget('cart');

    return redirect()->route('order.confirm');
}

    /**
     * Store a newly created order in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $totalPrice = array_sum(array_column($cart, 'price'));

        $request->validate([
            'delivery_option' => 'required',
            'delivery_address' => 'required_if:delivery_option,delivery',
        ]);

        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_amount = $totalPrice;
        $order->delivery_option = $request->input('delivery_option');
        $order->delivery_address = $request->input('delivery_option') == 'delivery' ? $request->input('delivery_address') : null;
        $order->save();

        foreach ($cart as $productId => $item) {
            $order->items()->create([
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('order.confirm');
    }

    /**
     * Display a listing of orders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    $orders = Order::with('orderItems.product', 'user')->get();

    return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Display the specified order.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showOrder($id)
{
    $order = Order::with('items')->find($id);

    if (!$order) {
        abort(404, 'Order not found');
    }

    // Debug to check if items is null or empty
    dd($order->items);

    $items = $order->items ? $order->items : collect();
    $order->subtotal = $items->sum(function ($item) {
        return $item->quantity * $item->price;
    });

    return view('orders.show', compact('order'));
}

}
