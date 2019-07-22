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
    Route::prefix('pegawai')->group(function () {
        //tampilan
        Route::get('/', 'PegawaiController@index')->name('pegawai-index');
        Route::get('/search','PegawaiController@search')->name('pegawai-search');
        Route::get('/{idPegawai}', 'PegawaiController@byId')->name('pegawai-by-id');

        //crud
        Route::post('/create', 'PegawaiController@store')->name('pegawai-create');
        Route::post('/put', 'PegawaiController@put')->name('pegawai-put');
        Route::post('/remove', 'PegawaiController@remove')->name('pegawai-remove');
    });
    Route::prefix('barang')->group(function () {
        //tampilan
        Route::get('/', 'BarangController@index')->name('barang-index');
        Route::post('/create', 'BarangController@store')->name('barang-create');
        Route::get('/search','BarangController@search')->name('barang-search');
        Route::get('/{idBahanBaku}', 'BarangController@byId')->name('barang-by-id');
        Route::post('/put', 'BarangController@update')->name('barang-update');
        Route::post('/remove', 'BarangController@removeAjax')->name('barang-delete');
    });

    Route::prefix('jenispelayanan')->group(function () {
        //tampilan
        Route::get('/', 'JenisPelayananController@index')->name('jenispelayanan-index');
        Route::post('/create', 'JenisPelayananController@store')->name('jenis-pelayanan-create');
        Route::get('/search','JenisPelayananController@search')->name('jenis-pelayanan-search');
        Route::get('/{idJenisPelayanan}', 'JenisPelayananController@byId')->name('jenis-pelayanan-by-id');
        Route::post('/put', 'JenisPelayananController@update')->name('jenis-pelayanan-update');
    });

    Route::prefix('pelanggan')->group(function () {
        //tampilan
        Route::get('/', 'PelangganController@index')->name('pelanggan-index');
        Route::post('/create', 'PelangganController@store')->name('pelanggan-create');
        Route::get('/search', 'PelangganController@search')->name('pelanggan-search');
        Route::get('/{idPelanggan}','PelangganController@byId')->name('pelanggan-by-id');
        Route::post('/put', 'PelangganController@update')->name('pelanggan-update');
    });

    // Route::prefix('pegawai')->group(function () {
    //     //tampilan
    //     Route::get('/', 'PegawaiController@index')->name('pegawai-index');
    // });

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
