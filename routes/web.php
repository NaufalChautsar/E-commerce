<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'FrontHomeController@index');
Route::get('/Produk', 'FrontShopController@index');
Route::get('/Kontak', 'FrontContactController@index');
Route::get('/home', 'HomeController@index');

//Admin
Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::middleware('auth')->group(function () {
        Route::get('/Profile', 'ProfileController@index');
        Route::post('/Profile/{id}', 'ProfileController@update');
        Route::get('/Pesan/{id}', 'PesanController@index');
        Route::post('/Pesan/{id}', 'PesanController@pesan');
        Route::get('/Check-Out', 'PesanController@checkout');
        Route::delete('/Check-Out/{id}', 'PesanController@delete');
        Route::get('/Konfirmasi-Check-Out', 'PesanController@konfirmasi');
        Route::get('/History', 'HistoryController@index');
        Route::get('/History/{id}', 'HistoryController@detail');
    });
});
Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::middleware('auth:admin')->group(function () {
        Route::get('/Dashboards', 'DashboardController@index')->name('Dahsboards');
        Route::get('/TransaksiDetail', 'TransaksiDetailController@index')->name('TransaksiDetail');
        Route::resource('Produks', 'ProdukController');
        Route::resource('Transaksis', 'TransaksiController');
    });
});
