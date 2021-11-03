<?php

use App\Http\Controllers\AcountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/shop',[HomeController::class,'shop'])->name('home.shop');


Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/store',[LoginController::class,'store'])->name('store');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/acount/create',[AcountController::class,'create'])->name('acount.create');
Route::post('/acount/store',[AcountController::class,'store'])->name('acount.store');

// Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/','AdminController@dashboard')->name('admin.dashboard');
        Route::get('/file','AdminController@file')->name('admin.file');
        //Route category
        Route::get('/category','CategoryController@index')->name('category.index');
        Route::get('/category/create','CategoryController@create')->name('category.create');
        Route::post('/category/store','CategoryController@store')->name('category.store');
        Route::delete('/category/destroy/{id}','CategoryController@destroy')->name('category.destroy');
        Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
        Route::put('/category/update/{id}','CategoryController@update')->name('category.update');
        //Route brand
        Route::get('/brand','BrandController@index')->name('brand.index');
        Route::get('/brand/create','BrandController@create')->name('brand.create');
        Route::post('/brand/store','BrandController@store')->name('brand.store');
        Route::delete('/brand/destroy/{id}','BrandController@destroy')->name('brand.destroy');
        Route::get('/brand/edit/{id}','BrandController@edit')->name('brand.edit');
        Route::put('/brand/update/{id}','BrandController@update')->name('brand.update');
        // Route-product
        Route::get('/product','ProductController@index')->name('product.index');
        Route::get('/product/create','ProductController@create')->name('product.create');
        Route::post('/product/store','ProductController@store')->name('product.store');
        Route::delete('/product/destroy/{id}','ProductController@destroy')->name('product.destroy');
        Route::get('/product/edit/{id}','ProductController@edit')->name('product.edit');
        Route::put('/product/update/{id}','ProductController@update')->name('product.update');
        //Route manager-order
        // all order (tất cả đơn hàng)
        Route::get('/order','OrderController@index')->name('order.index');
        // order wait (đơn đang chờ xử lý)
        Route::get('/order/wait','OrderController@wait')->name('order.wait');
        // order doing (đơn hàng đang giao)
        Route::get('/order/doing','OrderController@doing')->name('order.doing');
        // order success (đơn thành công)
        Route::get('/order/success','OrderController@success')->name('order.success');

        Route::delete('/order/destroy/{id}','OrderController@destroy')->name('order.destroy');
        Route::get('/order/edit/{id}','OrderController@edit')->name('order.edit');
        Route::put('/order/update/{id}','OrderController@update')->name('order.update');
    
        Route::resources([
        'Product' =>  'ProductController' ,
        'Customer' => 'CustomerController',
        'Order'=>    'OrderController',
        'Acount'=>   'AcountController',
        'Brand'=> 'BrandController',
        'Category'=>'CategoryController'
        ]);  
    });
// });
