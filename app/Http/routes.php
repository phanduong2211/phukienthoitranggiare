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
Route::get('/',"ViewController@index");
Route::get('shop-gird.html', function () {
    return view('shop-gird');
});

Route::get('products/{id}/{name}.html','ViewController@productDetail');

Route::get("news/{id}/{name}.html",'ViewController@detailnews');
Route::get("tin-tuc",'ViewController@news');

Route::get("san-pham/gird/{category}",'ViewController@productsgird');
Route::get("san-pham/list/{category}",'ViewController@productslist');
Route::post("add-cart","ViewController@addcart");
Route::post("delete-cart","ViewController@deletecart");



Route::get('contact-us.html', function () {
    return view('contact-us');
});

Route::get('about-us.html', function () {
    return view('about-us');
});

Route::get('cart.html',"ViewController@cart");

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

Route::get('my-account.html',"ViewController@myacount");
Route::get('registration.html','ViewController@registration');

Route::get('shop-list.html', function () {
    return view('shop-list');
});



Route::get('wishlist.html',"ViewController@wishlist");
Route::get('wishlist',"ViewController@postwishlist");
Route::post('deletewishlist',"ViewController@deletewishlist");

Route::get('my-cart-step-2-info.html', function () {
    return view('my-cart-step-2-info');
});

Route::post('signinCreate',"UserController@login");

Route::post('',"UserController@login");
Route::post('AccountCreate',"UserController@register");

Route::get("test","ViewController@test");

/*Route::get("test1",function(){
    return Session::get("name_test");
});*/


//Admin
Route::get("admin/login","Admin\LoginAdminController@index");
Route::post("admin/login","Admin\LoginAdminController@login");

Route::get("admin/logout","Admin\LoginAdminController@logout");

Route::group(["middleware"=>'checklogin','prefix'=>'admin'],function(){
    Route::get("/","Admin\IndexController@index");


    Route::get("website/menu","Admin\WebsiteController@menu");
    Route::get("website/menu/add","Admin\WebsiteController@addmenu");
    Route::post("website/menu/add","Admin\WebsiteController@savemenu");
});

//Admin//