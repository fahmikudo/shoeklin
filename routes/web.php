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

    Route::prefix('jenispelayanan')->group(function () {
        //tampilan
        Route::get('/', 'JenisPelayananController@index')->name('jenispelayanan-index');
    });

    Route::prefix('pelanggan')->group(function () {
        //tampilan
        Route::get('/', 'PelangganController@index')->name('pelanggan-index');
    });

    Route::prefix('pegawai')->group(function () {
        //tampilan
        Route::get('/', 'PegawaiController@index')->name('pegawai-index');
    });

    Route::prefix('transaksi')->group(function () {
        //tampilan
        Route::get('/penyerahan', 'PenyerahanController@index')->name('penyerahan-index');
        Route::get('/pengembalian', 'PengembalianController@index')->name('pengembalian-index');
    });

    Route::prefix('report')->group(function () {
        //tampilan
        Route::get('/', 'ReportController@index')->name('report-index');
    });


});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/barang', 'BarangController@index')->name('barang-index');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
