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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products','ProductController@index')->name('products');
Route::get('/products/detail/{item}','OrderController@index')->name('order.detail');
Route::post('/products/detail/checkout{id}','OrderController@store')->name('order.create');


Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/home/products','ProductController@create')->name('admin.products');
    Route::post('/home/products/create','ProductController@store')->name('admin.products.create');
});

Route::group(['middleware' => ['auth','user']], function () {
    Route::get('/myorder','OrderController@index')->name('order.user');
    
});

Auth::routes();

