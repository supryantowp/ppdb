<?php

use Illuminate\Support\Facades\Route;

// Front
Route::get('/', 'FrontController@index')->name('home');
Route::get('/materi', 'FrontController@materi')->name('materi');
Route::get('/guru', 'FrontController@guru')->name('guru');
Route::get('/blog', 'FrontController@blog')->name('blog');
Route::get('/contact', 'FrontController@contact')->name('contact');

// Authentikasi
Auth::routes();

// Calon Siswa

Route::middleware('auth')->group(function () {
    Route::group(['namespace' => 'CalonSiswa', 'prefix' => 'calon-siswa', 'middleware' => 'role:calon-siswa'], function () {
        Route::get('/', 'CalonSiswaController@index')->name('calon-siswa.index');
        Route::get('/pengumuman', 'CalonSiswaController@pengumuman')->name('pengumuman');

        Route::get('/list-pendaftar', 'PendaftaranController@listPendaftar')->name('calon-siswa.listPendaftar');
        Route::get('/pendaftaran', 'PendaftaranController@pendaftaran')->name('calon-siswa.pendaftaran');
        Route::get('/pendaftaran/berhasil', 'PendaftaranController@berhasil')->name('pendaftaran.berhasil');
        Route::get('/pendaftaran/step-2', 'PendaftaranController@pendaftaranStep2')->name('pendaftaran-step-2');
        Route::get('/pendaftaran/step-3', 'PendaftaranController@pendaftaranStep3')->name('pendaftaran-step-3');
        Route::post('/data-siswa-1', 'PendaftaranController@dataSiswa1')->name('pendaftaran.data-siswa-1');
        Route::post('/data-siswa-2', 'PendaftaranController@dataSiswa2')->name('pendaftaran.data-siswa-2');
        Route::post('/data-siswa-3', 'PendaftaranController@dataSiswa3')->name('pendaftaran.data-siswa-3');
        Route::post('/pendaftaran/store', 'PendaftaranController@store')->name('pendaftaran.store');
        Route::get('/pendaftaran/cetak', 'PendaftaranController@cetak')->name('pendaftaran.cetak');
        Route::get('/pendaftaran/cetak/kelulusan/{id}', 'PendaftaranController@cetakKelulusan')->name('pendaftaran.cetak-kelulusan');

        Route::get('/pembayaran', 'PembayaranController@pembayaran')->name('pendaftaran.pembayaran');
        Route::get('/pembayaran/konfirmasi', 'PembayaranController@konfirmasi')->name('pembayaran.konfirmasi');
        Route::get('/pembayaran/detail/{id}', 'PembayaranController@detailPembayaran')->name('pembayaran.detail');
        Route::post('/pembayaran/store', 'PembayaranController@storePembayaran')->name('pembayaran.store');
        Route::get('/pembayaran/cetak/{id}', 'PembayaranController@cetak')->name('pembayaran.cetak');
        Route::get('/pembayaran/cetak', 'PembayaranController@cetakSemua')->name('pembayaran.cetak.semua');
    });

    // Admin
    Route::namespace('Admin')->group(function () {
        Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
            Route::get('/', 'AdminController@index')->name('admin.index');

            Route::prefix('setting')->group(function () {

                Route::prefix('menu')->group(function () {
                    Route::namespace('Menu')->group(function () {
                        Route::resource('access-menu', 'AccessMenuController');
                        Route::resource('menu', 'MenuController');
                        Route::resource('sub-menu', 'SubMenuController');
                    });
                });
            });
        });
    });
});
