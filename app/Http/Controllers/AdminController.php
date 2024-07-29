<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
    public function products()
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null;
        }

        // Create new product
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image
        ]);

        $product = Product::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image;
        }

        // Update product
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    // Delete a product
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        // Delete image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    // Show list of orders
    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    // Show details of a single order
    public function showOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Show product reports
    public function productReports()
    {
        // Fetch product data for the report
        $products = Product::all(); // Modify this query as needed for your report requirements

        return view('admin.reports.products', compact('products'));
    }

    // Show list of pending orders
    public function pendingOrders()
    {
        $orders = Order::where('status', 'pending')->get();
        return view('admin.orders.pending', compact('orders'));
    }

    // Show user reports
    public function userReports()
    {
        // Fetch user data for the report
        $users = User::all(); // Modify this query as needed to suit your report requirements

        return view('admin.reports.users', compact('users'));
    }
    
    // Show sales reports
    public function salesReports()
    {
        // Logic to fetch and display sales reports
        $orders = Order::all(); // Example logic
        return view('admin.reports.sales', compact('orders'));
    }

    // Show list of completed orders
    public function completedOrders()
    {
        $orders = Order::where('status', 'completed')->get();
        return view('admin.orders.completed', compact('orders'));
    }

    // Show list of users
    public function users()
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

    // Show form to create a new user
    public function createUser()
    {
        return view('admin.users.create');
    }

    // Store a new user
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // Add more validation rules as needed
        ]);

        // Create new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User added successfully');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login'); // Redirect to admin login page after logout
    }
}
