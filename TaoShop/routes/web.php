<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/trangchu',[HomeController::class,'index'])->name('home.index');
Route::get('/trangchu/add-to-cart/{id}',[ProductController::class,'addToCart'])->name('addToCart');
Route::get('/shop',[HomeController::class,'shop'])->name('home.shop');
Route::get('/detail/{id}',[ProductController::class,'detail'])->name('home.detail');
Route::get('/trangchu/showcart',[ProductController::class,'showcart'])->name('showcart');
Route::get('/trangchu/updatecart',[ProductController::class,'updatecart'])->name('updatecart');
Route::get('/trangchu/thanhtoan',[ProductController::class,'thanhtoan'])->name('thanhtoan');

Route::prefix('admin')->group(function () {
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/category','CategoryController@index')->name('category.index');
    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::post('/category/store','CategoryController@store')->name('category.store');
    Route::resources([
    'Product' =>  'ProductController' ,
    'Customer' => 'CustomerController',
    'Order'=>    'OrderController',
    'Acount'=>   'AcountController',
    'Brand'=> 'BrandController',
    'Category'=>'CategoryController'
    ]);  
});
// Route::get('detail/{id}',['as'=>'detail', 'uses'=>'HomeController@getchitiet']);