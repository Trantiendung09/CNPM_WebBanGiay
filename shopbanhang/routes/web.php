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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/trang-index','HomeController@index'); 
// can them   protected $namespace = 'App\http\Controllers'; 
//vao vao dg dan app/providers/routeService



//backend
Route::get('/login_admin','AdminController@index'); 
Route::post('/home_admin','AdminController@homeadmin');
// route di thang vao admin home ma ko can dang nhap
Route::get('/home','AdminController@home'); 


