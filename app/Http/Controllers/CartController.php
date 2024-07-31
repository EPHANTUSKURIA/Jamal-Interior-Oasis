<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Support\Facades\Log;


class CartController extends Controller
{
    /**
     * Show cart items.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        Log::info('Cart index method called');
        $cart = $this->getCartItems();
        $total = $this->calculateTotal($cart);
        return view('cart.cart', ['cart' => $cart, 'total' => $total]);
    }

    /**
     * Add an item to the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = $this->getCartItems();

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

        $this->updateCart($cart);

        return redirect()->route('cart.index')->with('success', 'Item added to cart');
    }

    /**
     * Remove an item from the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request, $id)
    {
        $cart = $this->getCartItems();

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $this->updateCart($cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }

    /**
     * Update item quantities in the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $cart = $this->getCartItems();
        $quantities = $request->input('quantity', []);

        foreach ($quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = max(1, (int)$quantity);
            }
        }

        $this->updateCart($cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated');
    }

    /**
     * Checkout cart items.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to proceed with the checkout.');
    }

    $request->validate([
        'delivery_option' => 'required|string',
    ]);

    $order = new Order();
    $order->user_id = Auth::id(); // Ensure this returns a valid user ID
    $order->total = $this->calculateTotal($this->getCartItems());
    $order->status = 'pending';
    $order->delivery_option = $request->input('delivery_option');
    $order->delivery_location = $request->input('delivery_location', null);
    $order->save();

    foreach ($this->getCartItems() as $id => $cartItem) {
        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $id;
        $orderItem->quantity = $cartItem['quantity'];
        $orderItem->price = $cartItem['price'];
        $orderItem->save();
    }

    $this->clearCart();

    return redirect()->route('orders.index')->with('success', 'Your order has been placed successfully.');
}


    /**
     * Confirm order.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm(Request $request)
    {
        $cart = $this->getCartItems();
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $this->clearCart();

        return redirect()->route('order-confirmation')->with('success', 'Order confirmed');
    }

    /**
     * Calculate total price of items in the cart.
     *
     * @param array $cart
     * @return float
     */
    
     public function destroy($productId)
{
    $cart = Session::get('cart', []);
    
    // Log the cart before removal
    Log::info('Cart before removal:', $cart);

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        Session::put('cart', $cart);
    }

    // Log the cart after removal
    Log::info('Cart after removal:', Session::get('cart'));

    return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
}
     private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    /**
     * Retrieve cart items from the session.
     *
     * @return array
     */
    private function getCartItems()
    {
        return Session::get('cart', []);
    }

    /**
     * Update the cart in the session.
     *
     * @param array $cart
     * @return void
     */
    private function updateCart($cart)
    {
        Session::put('cart', $cart);
    }

    /**
     * Clear the cart from the session.
     *
     * @return void
     */
    private function clearCart()
    {
        Session::forget('cart');
    }
}

