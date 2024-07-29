<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home Page
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Product Listings Page
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Product Detail Page
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Product Category Page
Route::get('/products/category/{category}', [ProductController::class, 'category'])->name('products.category');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/checkout/confirm', [CartController::class, 'confirm'])->name('cart.confirm');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/checkout.process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::delete('/cart/remove/{productId}', [CartController::class, 'destroy'])->name('cart.destroy');
// Checkout Page
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

// User Account Page
Route::get('/order-history', [UserController::class, 'orderHistory'])->name('account.orderHistory');

// Orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');


// Account routes
Route::get('/account', [AccountController::class, 'profile'])->name('account.profile');
Route::put('/account/update', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
Route::post('/account/logout', [AccountController::class, 'logout'])->name('account.logout');



// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Admin routes for Orders
Route::prefix('admin/orders')->group(function () {
    Route::get('/', [AdminController::class, 'orders'])->name('admin.orders.index');
    Route::get('/pending', [AdminController::class, 'pendingOrders'])->name('admin.orders.pending');
    Route::get('/completed', [AdminController::class, 'completedOrders'])->name('admin.orders.completed');
    Route::get('/{id}', [AdminController::class, 'showOrder'])->name('admin.orders.show');
});

// Admin routes for Users
Route::prefix('admin/users')->group(function () {
    Route::get('/', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
});

// Admin routes for Products
Route::prefix('admin/products')->group(function () {
    Route::get('/', [AdminController::class, 'products'])->name('admin.products.index');
    Route::get('/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.destroy');
});

// Admin routes for Reports
Route::prefix('admin/reports')->group(function () {
    Route::get('/sales', [AdminController::class, 'salesReports'])->name('admin.reports.sales');
    Route::get('/users', [AdminController::class, 'userReports'])->name('admin.reports.users');
    Route::get('/products', [AdminController::class, 'productReports'])->name('admin.reports.products');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Static pages
Route::get('/about', [ContentController::class, 'about'])->name('about');
Route::get('/contact', [ContentController::class, 'contact'])->name('contact');

// Search Routes
Route::get('/search', [SearchController::class, 'index'])->name('search.form');
Route::post('/search/results', [SearchController::class, 'search'])->name('search.results');

// Wishlist route
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

// Order Confirmation Page
Route::get('/order-confirmation', [OrderController::class, 'index'])->name('order.confirmation');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');