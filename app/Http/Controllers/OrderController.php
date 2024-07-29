<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Order;
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
        $order = Order::where('user_id', auth()->id())->latest()->firstOrFail();
        $order->items = $order->items;

        $order->subtotal = $order->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $order->shipping_cost = $order->delivery_option == 'delivery' ? 10 : 0;
        $order->total = $order->subtotal + $order->shipping_cost;

        Log::info('Order Details:', ['order' => $order]);

        return view('order_confirmation', ['order' => $order]);
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
        $total = array_sum(array_column($cart, 'price'));

        $request->validate([
            'delivery_option' => 'required',
            'delivery_location' => 'required_if:delivery_option,delivery',
        ]);

        $order = new Order();
        $order->user_id = auth()->id();
        $order->total = $total;
        $order->delivery_option = $request->input('delivery_option');
        $order->delivery_location = $request->input('delivery_location');
        $order->save();

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
        $orders = Order::all();

        return view('orders.index', ['orders' => $orders]);
    }
}
