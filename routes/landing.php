<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('landing.home');
Route::get('/about', function () {
    return 'fitra';
});