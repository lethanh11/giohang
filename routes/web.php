<?php

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

Route::get('/', function () {
    return view('welcome');
});


//Show sản phẩm
Route::get('products','ProductController@index');

//Addtocart
Route::get('products/addtocart/{id}','ProductController@addTocart')->name('addTocart');
Route::get('products/showcart','ProductController@showCart')->name('showCart');
Route::get('products/updatecart','ProductController@updateCart')->name('updateCart');
Route::get('products/deletecart','ProductController@deleteCart')->name('deleteCart');
