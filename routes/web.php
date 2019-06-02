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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductController@index')->name('products');

//=> JSON file
Route::get('/products', 'ProductController@show');

Route::get('/produit/{id}', [
    'uses' => 'ProductController@single',
    'as' => 'product.single'
]);

Route::get('/checkout', 'CartController@checkout')->name('checkout');

Route::post('/check', 'OrderController@store')->name('check');

/*
Route::get('/{any}', function () {
    //return view('welcome');

    return File::get(public_path().'/dist/index.html');
})->where('any', '.*');*/


