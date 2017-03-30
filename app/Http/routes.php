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

//navs
Route::get('/','StaticPagesController@home')->name('home');
Route::get('painter','StaticPagesController@painter')->name('painter');
Route::get('writer','StaticPagesController@writer')->name('writer');
Route::get('works','StaticPagesController@works')->name('works');
Route::get('kuolie','StaticPagesController@kuolie')->name('kuolie');

//users
Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

//session
Route::get('signin', 'SessionController@create')->name('signin');
Route::post('signin','SessionController@store')->name('signin');
Route::delete('signout','SessionController@destroy')->name('signout');
