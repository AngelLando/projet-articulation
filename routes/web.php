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
Route::get('/', function () {
    $data = App::call('App\Http\Controllers\ProductController@index', [$id = 'Recommandations']);
    return view('homepage')->with('products', $data);
})->name('products');

Route::get('/checkout', function () {
    $data = App::call('App\Http\Controllers\CartController@index', [$require = 'address']);
    return view('checkout')->with('cart', $data);
})->name('checkout');

Route::get('/cart', function () {
    $data = App::call('App\Http\Controllers\CartController@index', [$require = null]);
    return view('cart')->with('cart', $data);
})->name('cart');

Route::get('/cart-nav', function () {
    $data = App::call('App\Http\Controllers\CartController@index', [$require = null]);
    return $data;
})->name('cart-nav');

Route::get('/search', function () {
    $data = App::call('App\Http\Controllers\ProductController@searchProduct');
    return view ('search')->with('products', $data);
})->name('search');


// POST
/* Route::post('/user/account/update', [
    'uses' => 'UserController@update',
    'as' => 'user.account.update'
]); */

Route::post('/user/account/update', 'UserController@update')->name('updateUser');

Route::post('/check', 'OrderController@store')->name('check');

Route::post('/add', 'CartItemController@store')->name('add');

Route::post('/update/{id}', 'CartItemController@update')->name('update');

Route::post('/user/account/delete/{id}', 'UserController@destroy')->name('deleteUser');



//Route::delete('/del', 'CartItemController@destroy')->name('del');

Route::delete('/cartItem/{id}', [
    'uses' => 'CartItemController@destroy'
])->name('delCartItem');

// Pages Routes

Route::get('/nos-primeurs', function() {
    $data = App::call('App\Http\Controllers\ProductController@index', [$id = 'Primeur']);
    return view('pages.nos-primeurs')->with('products', $data);
})->name('nos-primeurs');

Route::get('/nos-vins', function() {
    $data = App::call('App\Http\Controllers\ProductController@index', [$id = null]);
    return view('pages.nos-vins')->with('products', $data);
})->name('nos-vins');

Route::get('/nouveautes', function() {
    $data = App::call('App\Http\Controllers\ProductController@index', [$id = 'Nouveautés']);
    return view('pages.nouveautes')->with('products', $data);
})->name('nouveautes');

Route::get('/offres-speciales', function() {
    $data = App::call('App\Http\Controllers\ProductController@index', [$id = 'Offre spéciale']);
    return view('pages.offres-speciales')->with('products', $data);
})->name('offres-speciales');

Route::get('/promotions', function() {
    $data = App::call('App\Http\Controllers\ProductController@index', [$id = 'Offre du mois']);
    return view('pages.promotions')->with('products', $data);
})->name('promotions');

Route::get('/a-propos', function () {
    return view ('pages.a-propos');
})->name('a-propos');

Route::get('/conditions-generales-de-vente', function () {
    return view ('pages.cgv');
})->name('conditions-generales-de-vente');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

    Route::resource('produits', 'ProductAdminController');
    Route::resource('formats', 'FormatAdminController');
    Route::resource('types', 'TypeAdminController');
    Route::resource('fournisseurs', 'SupplierAdminController');
    Route::resource('promotions', 'PromotionAdminController');
    Route::resource('tags', 'TagAdminController');
    Route::resource('appellations', 'AppellationAdminController');
    Route::resource('conditionnements', 'PackagingAdminController');

});

Route::get('/confirmation', function () {
    return view ('confirmation');
})->name('confirmation');
