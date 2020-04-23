<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'FrontController@index');
Route::get('/materi', 'FrontController@materi')->name('materi');
Route::get('/guru', 'FrontController@guru')->name('guru');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
