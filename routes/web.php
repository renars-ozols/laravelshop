<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/category/{slug}', 'FrontEndController@singleCategory')->name('category');
Route::get('/category/{cat_slug}/products/{prod_slug}', 'FrontEndController@singleProduct')->name('product');
Route::post('/cart/add', 'ShoppingController@add_to_cart')->name('cart.add');
Route::get('/cart/add/rapid/{id}', 'ShoppingController@add_to_cart_rapid')->name('cart.rapid.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');
Route::post('/cart/update/{id}', 'ShoppingController@cart_update')->name('cart.update');
Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');
Route::post('/cart/checkout', 'CheckoutController@pay')->name('cart.checkout');

Auth::routes();

Route::get('/dashboard', 'DashboardController')->name('dashboard');
    
Route::namespace('User')->prefix('user')->middleware('auth')->group(function()
{
    Route::get('dashboard', 'UserController@index')->name('user.dashboard');
    Route::get('dashboard/order/{id}', 'UserController@order')->name('user.order');
    Route::get('settings', 'UserController@settings')->name('user.settings');
});

Route::namespace('Admin')->prefix('admin')->middleware('auth', 'admin')->group(function()
{
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('settings', 'AdminController@settings')->name('admin.settings');
    Route::resource('products', 'ProductsController')->except('show');
    Route::get('orders', 'OrdersController@index')->name('orders.index');
    Route::get('orders/{id}', 'OrdersController@show')->name('orders.show');
    Route::get('orders/status/{id}', 'OrdersController@status')->name('orders.status');
});
