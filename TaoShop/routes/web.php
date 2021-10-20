<?php

use App\Http\Controllers\HomeController;
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