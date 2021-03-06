<?php

use Illuminate\Support\Facades\Route;

// Front
Route::get('/', 'FrontController@index')->name('home');
Route::get('/home', 'FrontController@index')->name('home');
Route::get('/materi', 'FrontController@materi')->name('materi');
Route::get('/guru', 'FrontController@guru')->name('guru');
Route::get('/blog', 'FrontController@blog')->name('blog');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::get('/ppdb', 'FrontController@ppdb')->name('ppdb');

// Authentikasi
Auth::routes();

// Calon Siswa

Route::middleware('auth')->group(function () {
    Route::group(['namespace' => 'CalonSiswa', 'prefix' => 'calon-siswa', 'middleware' => ['role:calon-siswa']], function () {
        Route::get('/', 'CalonSiswaController@index')->name('calon-siswa.index');
        Route::get('/pengumuman', 'CalonSiswaController@pengumuman')->name('pengumuman');

        Route::get('/pendaftaran', 'PendaftaranController@pendaftaran')->name('calon-siswa.pendaftaran');
        Route::get('/pendaftaran/berhasil', 'PendaftaranController@berhasil')->name('pendaftaran.berhasil');
        Route::get('/pendaftaran/step-2', 'PendaftaranController@pendaftaranStep2')->name('pendaftaran-step-2');
        Route::get('/pendaftaran/step-3', 'PendaftaranController@pendaftaranStep3')->name('pendaftaran-step-3');
        Route::post('/pendaftaran/store', 'PendaftaranController@store')->name('pendaftaran.store');

        Route::get('/pendaftaran/cetak', 'PendaftaranController@cetak')->name('pendaftaran.cetak');
        Route::get('/pendaftaran/cetak/kelulusan/{id}', 'PendaftaranController@cetakKelulusan')->name('pendaftaran.cetak-kelulusan');

        Route::get('/list-pendaftar', 'PendaftaranController@listPendaftar')->name('calon-siswa.listPendaftar');

        Route::post('/data-siswa-1', 'PendaftaranController@dataSiswa1')->name('pendaftaran.data-siswa-1');
        Route::post('/data-siswa-2', 'PendaftaranController@dataSiswa2')->name('pendaftaran.data-siswa-2');
        Route::post('/data-siswa-3', 'PendaftaranController@dataSiswa3')->name('pendaftaran.data-siswa-3');


        Route::get('/pembayaran', 'PembayaranController@pembayaran')->name('pendaftaran.pembayaran');
        Route::get('/pembayaran/konfirmasi', 'PembayaranController@konfirmasi')->name('pembayaran.konfirmasi');
        Route::get('/pembayaran/detail/{id}', 'PembayaranController@detailPembayaran')->name('pembayaran.detail');
        Route::post('/pembayaran/store', 'PembayaranController@storePembayaran')->name('pembayaran.store-siswa');
        Route::get('/pembayaran/cetak/{id}', 'PembayaranController@cetak')->name('pembayaran.cetak');
        Route::get('/pembayaran/cetak', 'PembayaranController@cetakSemua')->name('pembayaran.cetak.semua');
    });

    // Admin

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('/', 'AdminController@index')->name('admin.index');

        Route::group(['prefix' => 'ppdb'], function () {
            Route::get('/', 'PpdbController@index');
            Route::resource('status', 'StatusController');
            Route::resource('konfirmasi', 'PpdbPendaftaranController');
            Route::resource('pembayaran', 'PpdbPembayaranController');
        });

        Route::group(['prefix' => 'setting/menu', 'namespace' => 'Menu'], function () {
            Route::resource('access-menu', 'AccessMenuController');
            Route::resource('menu', 'MenuController');
            Route::resource('sub-menu', 'SubMenuController');
        });
    });
});
