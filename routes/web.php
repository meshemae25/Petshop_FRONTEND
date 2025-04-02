<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoritesController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('/contact', function () {
    return view('contact'); 
})->name('contact');

Route::get('/shop', function () {
    return view('shop'); 
})->name('shop');

Route::get('/search', function () {
    return view('search'); 
})->name('search');


// cart
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

//account
Route::get('/account', function () {
    return view('account');
})->name('account');

//loyalty
Route::get('/loyalty', function () {
    return view('loyalty');
})->name('loyalty');

Route::get('/loyalty', [LoyaltyController::class, 'index'])->name('loyalty');

//wishlist
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

//newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

//faq
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

//categories
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category');

//terms
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

//privacy
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

//search
Route::get('/search', [ProductController::class, 'search'])->name('search');

//products
Route::get('/products', [ProductController::class, 'index']);


Route::get('/', [ProductController::class, 'index'])->name('shop');
Route::get('/favorites', [ProductController::class, 'favorites'])->name('favorites');
Route::get('/search', [ProductController::class, 'search'])->name('search');

//favorites
Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites');

Route::controller(FavoritesController::class)->group(function () {
    Route::get('/favorites', 'index');
});

Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites');

//
Route::get('/', [ProductController::class, 'index'])->name('shop');
Route::get('/favorites', [ProductController::class, 'favorites'])->name('favorites');
Route::get('/favorites/search', [ProductController::class, 'searchFavorites'])->name('favorites.search');
Route::get('/search', [ProductController::class, 'search'])->name('search');

//product-detail
Route::get('/product-detail', function () {
    return view('product-detail');
})->name('product-detail');

Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product-detail');