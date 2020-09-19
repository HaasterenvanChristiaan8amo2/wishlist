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

Route::get('/', 'PageController@index');
Route::get('/error', 'PageController@error')->name('error');

Route::get('/login', 'AuthController@loginView');
Route::post('/login', 'AuthController@loginUser');
Route::get('/register', 'AuthController@registerView');
Route::post('/register', 'AuthController@registerUser');
Route::get('/logout', 'AuthController@logout');

Route::get('/wishlist', 'WishlistController@index');

Route::group(['middleware' => 'checkLogin'], function () {
    Route::get('/wishCreate', 'BeheerController@index');
    Route::post('/wishCreate', 'BeheerController@createListItem');
    Route::get('/wishEdit/{id}', 'WishlistController@showListItem');
    Route::post('/wishEdit/{id}', 'WishlistController@editListItem');
    Route::get('/wishDelete/{id}', 'WishlistController@deleteListItem');
});




