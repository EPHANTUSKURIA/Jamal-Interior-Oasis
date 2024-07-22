<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    /**
     * Handle the search request and show results.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the request

        // Fetch products that match the search query
        $products = Product::where('name', 'like', "%{$query}%")->get();

        return view('search', ['products' => $products, 'query' => $query]);
    }
}
