<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    // Show the About Us page
    public function about()
    {
        return view('about');
    }

    // Show the Contact Us page
    public function contact()
    {
        return view('contact');
    }

    // Show the Search Results page
    public function search()
    {
        return view('search');
    }

    // Show the Wishlist page
    public function wishlist()
    {
        return view('wishlist');
    }
}
