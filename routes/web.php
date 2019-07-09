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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {

    Route::prefix('barang')->group(function () {
        //tampilan
        Route::get('/', 'BarangController@index')->name('barang-index');
    });


});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/barang', 'BarangController@index')->name('barang-index');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
