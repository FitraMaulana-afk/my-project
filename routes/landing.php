<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('landing.home');
Route::resource('destination', 'DestinationController');
Route::get('province/{province}/{id}', 'ProvinceController')->name('landing.province');
Route::get('contact-me', 'ContactController@index')->name('landing.contact-me.index');
Route::post('contact-me', 'ContactController@sendEmail')->name('landing.contact-me.send');
Route::get('search', 'HomeController@search')->name('landing.search');
