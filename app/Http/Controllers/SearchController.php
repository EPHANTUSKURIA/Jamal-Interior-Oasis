<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class SearchController extends Controller
{
    /**
     * Show the search form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        Log::info('Search form accessed.');
        return view('search.index');
    }

    /**
     * Handle the search request and show results.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the request
        Log::info('Search method called with query: ' . $query);

        // Validate the search query
        $request->validate([
            'query' => 'required|string|min:3'
        ]);

        // Fetch products that match the search query
        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        Log::info('Number of products found: ' . $products->count());

        return view('search.results', ['products' => $products, 'query' => $query]);
    }
}


