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

// Product Search Page
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// Product Category Page
Route::get('/products/category/{category}', [ProductController::class, 'category'])->name('products.category');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Cart Routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/confirm', [CartController::class, 'confirm'])->name('cart.confirm');
    Route::delete('/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::delete('/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
});

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

// User Account Routes
Route::get('/order-history', [UserController::class, 'orderHistory'])->name('account.orderHistory');
Route::get('/account', [AccountController::class, 'profile'])->name('account.profile');
Route::put('/account/update', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
Route::post('/account/logout', [AccountController::class, 'logout'])->name('account.logout');

// Orders Routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');
Route::get('/order-confirmation', [OrderController::class, 'index'])->name('order.confirmation');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Product Routes
    Route::prefix('products')->group(function () {
        Route::get('/', [AdminController::class, 'products'])->name('products.index');
        Route::get('/create', [AdminController::class, 'createProduct'])->name('products.create');
        Route::post('/', [AdminController::class, 'storeProduct'])->name('products.store');
        Route::get('/{id}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
        Route::put('/{id}', [AdminController::class, 'updateProduct'])->name('products.update');
        Route::delete('/{id}', [AdminController::class, 'deleteProduct'])->name('products.destroy');
    });

    // Admin Orders Routes
    Route::prefix('orders')->group(function () {
        Route::get('/', [AdminController::class, 'orders'])->name('orders.index');
        Route::get('/pending', [AdminController::class, 'pendingOrders'])->name('orders.pending');
        Route::get('/completed', [AdminController::class, 'completedOrders'])->name('orders.completed');
        Route::get('/{id}', [AdminController::class, 'showOrder'])->name('orders.show');
    });

    // Admin Users Routes
    Route::prefix('users')->group(function () {
        Route::get('/', [AdminController::class, 'users'])->name('users.index');
        Route::get('/create', [AdminController::class, 'createUser'])->name('users.create');
        Route::post('/', [AdminController::class, 'storeUser'])->name('users.store');
        Route::get('/{id}', [AdminController::class, 'showUser'])->name('users.show');
    });

    // Admin Reports Routes
    Route::prefix('reports')->group(function () {
        Route::get('/sales', [AdminController::class, 'salesReports'])->name('reports.sales');
        Route::get('/users', [AdminController::class, 'userReports'])->name('reports.users');
        Route::get('/products', [AdminController::class, 'productReports'])->name('reports.products');
    });

    // Admin Logout
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Static Pages Routes
Route::get('/about', [ContentController::class, 'about'])->name('about');
Route::get('/contact', [ContentController::class, 'contact'])->name('contact');

// Search Routes
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/results', [SearchController::class, 'search'])->name('search.results');

// Wishlist Routes
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

// Ensure authentication middleware is used in routes
Route::middleware('auth')->group(function () {
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
});

