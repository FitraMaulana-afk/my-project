<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::resource('province', 'ProvinceController');
});
