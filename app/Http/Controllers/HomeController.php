<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Make sure this line is included
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Location;

class HomeController extends Controller
{
    /**
     * Show the home page with products, testimonials, and locations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // Fetch all products for the homepage
            $products = Product::all();

            // Fetch dynamic data for the footer
            $testimonials = Testimonial::all();
            $locations = Location::all();

            return view('home', [
                'products' => $products,
                'testimonials' => $testimonials,
                'locations' => $locations
            ]);
        } catch (\Exception $e) {
            // Log the error and handle it as needed
            Log::error('Error fetching data for home page: ' . $e->getMessage());
            return view('home')->with('error', 'Unable to fetch data.');
        }
    }

    /**
     * Handle the search functionality.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search products by name
        $products = Product::where('name', 'like', "%{$query}%")->get();

        return view('search', [
            'products' => $products,
            'query' => $query
        ]);
    }

    /**
     * Show the cart items.
     *
     * @return \Illuminate\View\View
     */
    public function cart()
    {
        $cart = Session::get('cart', []);
        
        // Calculate total price of cart items
        $total = array_sum(array_column($cart, 'price')); // Assuming 'price' is a key in cart items
        
        return view('cart', [
            'cart' => $cart,
            'total' => $total
        ]);
    }
}
