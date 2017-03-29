<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','StaticPagesController@home')->name('home');
Route::get('/painter','StaticPagesController@painter')->name('painter');
Route::get('/writer','StaticPagesController@writer')->name('writer');
Route::get('/works','StaticPagesController@works')->name('works');
Route::get('/kuolie','StaticPagesController@kuolie')->name('kuolie');
