<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Listings Page
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Product Detail Page
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Shopping Cart Page
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout Page
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

// User Account Page
Route::get('/account', [UserController::class, 'profile'])->name('account.profile');
Route::get('/order-history', [UserController::class, 'orderHistory'])->name('account.orderHistory');
Route::post('/account/update', [UserController::class, 'updateProfile'])->name('account.updateProfile');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Login Page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Register Page
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// About Us Page
Route::get('/about', [ContentController::class, 'about'])->name('about');

// Contact Us Page
Route::get('/contact', [ContentController::class, 'contact'])->name('contact');

// Search Results Page
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Wishlist Page
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

// Order Confirmation Page
Route::get('/order-confirmation', [OrderController::class, 'index'])->name('order.confirmation');

// Custom Error Pages
Route::fallback(function () {
    return view('errors.404');
});
