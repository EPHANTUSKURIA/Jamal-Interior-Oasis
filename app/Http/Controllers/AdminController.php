<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show admin dashboard
    public function index()
    {
        // Fetch summary data for the dashboard
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'totalUsers'));
    }

    // Show list of products
    public function showProducts()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show form to create a new product
    public function createProduct()
    {
        return view('admin.products.create');
    }

    // Store a new product
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            // Add other validation rules as needed
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
    }

    // Show form to edit a product
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update a product
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            // Add other validation rules as needed
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    // Delete a product
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    // Show list of orders
    public function showOrders()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    // Show order details
    public function showOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Show list of users
    public function showUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Show user details
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }
}
