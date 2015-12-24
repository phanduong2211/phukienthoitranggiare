<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('shop-gird.html', function () {
    return view('shop-gird');
});
Route::get('contact-us.html', function () {
    return view('contact-us');
});

Route::get('about-us.html', function () {
    return view('about-us');
});

Route::get('cart.html', function () {
    return view('cart');
});

Route::get('checkout-signin.html', function () {
    return view('checkout-signin');
});

Route::get('checkout-address.html', function () {
    return view('checkout-address');
});

Route::get('checkout-registration.html', function () {
    return view('checkout-registration');
});

Route::get('checkout-shipping.html', function () {
    return view('checkout-shipping');
});

Route::get('checkout.html', function () {
    return view('checkout');
});

Route::get('my-account.html', function () {
    return view('my-account');
});

Route::get('registration.html', function () {
    return view('registration');
});

Route::get('shop-list.html', function () {
    return view('shop-list');
});

Route::get('single-product.html', function () {
    return view('single-product');
});


Route::get('wishlist.html', function () {
    return view('wishlist');
});

Route::get('my-cart-step-2-info.html', function () {
    return view('my-cart-step-2-info');
});
