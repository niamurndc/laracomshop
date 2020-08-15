<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

// route for frontend cusotomer
Route::get('/', 'HomePageController@index');
Route::get('/shop', 'HomePageController@shop');
Route::get('/category', 'HomePageController@category');
Route::get('/cart', 'HomePageController@cart');
Route::get('/checkout', 'HomePageController@checkout')->middleware('auth');
Route::get('/view/{id}', 'HomePageController@view');
Route::get('/payment', 'HomePageController@payment')->middleware('auth');

// category route
Route::get('/category/{slug}', 'CategoryController@view');

// brand route
Route::get('/brand/{slug}', 'BrandController@view');

//user route
Route::get('/user/dashboard', 'HomePageController@dashboard')->middleware('auth');
Route::get('/user/profile', 'HomePageController@profile')->middleware('auth');
Route::get('/user/order', 'HomePageController@order')->middleware('auth');
Route::post('/user/profile/update', 'HomePageController@update')->middleware('auth');

// cart route
Route::post('/cart/create', 'CartController@store');
Route::post('/cart/update/{id}', 'CartController@update');
Route::get('/cart/delete/{id}', 'CartController@destroy');

// order route
Route::get('/order/view/{id}', 'OrderController@view')->middleware('auth');
Route::post('/order/create', 'OrderController@store')->middleware('auth');
Route::post('/order/complete', 'OrderController@complete')->middleware('auth');

/*
|--------------------------------------------------------------------------
|Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', 'AdminPageController@showDashboard')->middleware('admin');

// Product route
Route::get('/admin/product', 'AdminPageController@showProduct');
Route::get('/admin/product/create', 'AdminPageController@createProduct');
Route::get('/admin/product/{id}', 'ProductController@show');
Route::post('/admin/product/create', 'ProductController@store');
Route::get('/admin/product/delete/{id}', 'ProductController@destroy');
Route::get('/admin/product/edit/{id}', 'ProductController@edit');
Route::post('/admin/product/update/{id}', 'ProductController@update');

// category route
Route::get('/admin/category', 'AdminPageController@showCategory');
Route::get('/admin/category/delete/{id}', 'CategoryController@destroy')->middleware('admin');
Route::post('/admin/category/create', 'CategoryController@store')->middleware('admin');

// Brand route
Route::get('/admin/brand', 'AdminPageController@showBrand');
Route::get('/admin/brand/delete/{id}', 'BrandController@destroy')->middleware('admin');
Route::post('/admin/brand/create', 'BrandController@store')->middleware('admin');

// Order Route
Route::get('/admin/order', 'AdminPageController@showOrder');
Route::get('/admin/order/{id}', 'AdminPageController@viewOrder')->middleware('admin');

// user toute
Route::get('/admin/users', 'AdminPageController@showUser');

// auth route
Auth::routes();
