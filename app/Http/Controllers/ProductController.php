<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
     * Show the products by category.
     *
     * @param string $category
     * @return \Illuminate\View\View
     */
    public function category($category)
    {
    // Fetch products by category
    $products = Product::where('category_id', $category)->get();
    $categoryName = ucwords(str_replace('-', ' ', $category));

    // Check if category has products
    if ($products->isEmpty()) {
            return view('products.no-items', ['categoryName' => $category]);
    }
    
    return view('products.category', [
        'products' => $products,
        'categoryName' => $category,
    ]);
    }

     public function showCategory($category)
    {
        $products = Product::where('category_id', $category)->get();
        return view('products.category', compact('products', 'category'));
    }

    /**
     * Add a product to the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
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

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image_url = $path;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }
}
