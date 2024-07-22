<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Show the list of all products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the details of a specific product.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id); // Fetch product by ID
        return view('products.show', ['product' => $product]);
    }

    /**
     * Add a product to the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id); // Fetch product by ID

        // Retrieve or initialize cart from session
        $cart = Session::get('cart', []);

        // Check if product is already in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1; // Increment quantity if exists
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ]; // Add new product to cart
        }

        // Save cart back to session
        Session::put('cart', $cart);

        return redirect()->route('cart'); // Redirect to cart page
    }
}
