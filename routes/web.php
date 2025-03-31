<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoyaltyController;


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

Route::get('/petshops', function () {
    return view('petshops');
});

// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/loyalty', function () {
    return view('loyalty');
})->name('loyalty');

Route::get('/loyalty', [LoyaltyController::class, 'index'])->name('loyalty');

Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');
