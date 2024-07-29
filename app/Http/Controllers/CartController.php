<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Show cart items.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cart = Session::get('cart', []);
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
        $cart = Session::get('cart', []);

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

    /**
     * Remove an item from the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request, $id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
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
        $cart = Session::get('cart', []);
        $quantities = $request->input('quantity', []);

        foreach ($quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = max(1, (int)$quantity);
            }
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated');
    }

    /**
     * Checkout cart items.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function checkout()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $total = $this->calculateTotal($cart);
        return view('checkout', ['cart' => $cart, 'total' => $total]);
    }

    /**
     * Confirm order.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm(Request $request)
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        Session::forget('cart');

        return redirect()->route('order-confirmation')->with('success', 'Order confirmed');
    }

    /**
     * Calculate total price of items in the cart.
     *
     * @param array $cart
     * @return float
     */
    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}

