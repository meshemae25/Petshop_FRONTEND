<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Static Pages
Route::view('/', 'welcome');
Route::view('/home', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/faq', 'faq')->name('faq');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/account', 'account')->name('account');
Route::view('/navbar', 'navbar')->name('navbar');
Route::view('/dashboard', 'dashboard')->name('dashboard');

// Shop Pages
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product-detail');
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Favorites / Wishlist
Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites');
Route::get('/favorites/search', [ProductController::class, 'searchFavorites'])->name('favorites.search');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Loyalty
Route::get('/loyalty', [LoyaltyController::class, 'index'])->name('loyalty');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Categories
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category');

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/promocodes', [PromoCodeController::class, 'index'])->name('promocodes.index');
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    Route::post('/orders/send-notification', [OrderController::class, 'sendNotification'])->name('orders.send-notification');
    Route::post('/orders/refund', [OrderController::class, 'refund'])->name('orders.refund');

    // Inventory
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::resource('inventory', InventoryController::class);
});

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::post('/promocodes', [PromoCodeController::class, 'store'])->name('promocodes.store');
