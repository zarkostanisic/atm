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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\\LoginController@login');
Route::post('/logout', 'Auth\\LoginController@logout')->name('logout');

// admin
Route::resource('users', 'UsersController')->middleware('auth');

// user
Route::middleware(['auth'])->group(function () {
    Route::get('/user', 'UserController@index');
	Route::get('/user/change_pin', 'UserController@change_pin');
	Route::post('/user/update_pin', 'UserController@update_pin');
	Route::get('/transactions', 'TransactionsController@index');
	Route::get('/transactions/withdraw', 'TransactionsController@withdraw');
	Route::post('/transactions/store', 'TransactionsController@store');
});
