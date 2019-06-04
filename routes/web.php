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

// GET
Route::get('/home', 'HomeController@index')->name('home');


//=> JSON file

Route::get('/products', 'ProductController@show');

Route::get('/produit/{id}', [
    'uses' => 'ProductController@single',
    'as' => 'product.single'
]);

Route::get('/user/account', [
    'uses' => 'UserController@index',
    'as' => 'user.account'
]);

// return JSON file
Route::get('/', 'ProductController@index')->name('products');

Route::get('/checkout', 'CartController@checkout')->name('checkout');

Route::get('/cart', 'CartController@index')->name('cart');

// POST
Route::post('/user/account/update', [
    'uses' => 'UserController@update',
    'as' => 'user.account.update'
]);

Route::post('/check', 'OrderController@store')->name('check');

Route::post('/add', 'CartItemController@store')->name('add');

// Pages Routes

Route::get('/nos-primeurs', function() {
    return view('pages.nos-primeurs');
})->name('nos-primeurs');

Route::get('/nos-vins', function() {
    $data = App::call('App\Http\Controllers\ProductController@index');
    return view('pages.nos-vins')->with('products', $data);
})->name('nos-vins');

Route::get('/nouveautes', function() {
    return view('pages.nouveautes');
})->name('nouveautes');

Route::get('/offres-speciales', function() {
    return view('pages.offres-speciales');
})->name('offres-speciales');

Route::get('/promotions', function() {
    return view('pages.promotions');
})->name('promotions');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

    Route::resource('produits', 'ProductAdminController');

});