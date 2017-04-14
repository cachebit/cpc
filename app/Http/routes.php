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

//users
Route::get('signup', 'UsersController@create')->name('signup');
Route::get('users/{id}/works', 'UsersController@works')->name('users.works');
Route::resource('users', 'UsersController');
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//session
Route::get('signin', 'SessionController@create')->name('signin');
Route::post('signin','SessionController@store')->name('signin');
Route::delete('signout','SessionController@destroy')->name('signout');


//password reset
Route::get('password/email', 'Auth\PasswordController@getEmail')->name('password.reset');
Route::post('password/email', 'Auth\PasswordController@postEmail')->name('password.reset');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('password.edit');
Route::post('password/reset', 'Auth\PasswordController@postReset')->name('password.update');

//works
Route::get('works/start', 'WorksController@start')->name('works.start');
Route::post('works/distribute', 'WorksController@distribute')->name('works.distribute');
Route::resource('opuscules', 'OpusculesController');
Route::resource('novellas', 'NovellasController');
Route::resource('novels', 'NovelsController');
Route::resource('posters', 'PostersController');
Route::resource('sketches', 'SketchesController');
Route::resource('drafts', 'DraftsController');
Route::resource('settings', 'SettingsController');
Route::resource('webtoons', 'WebtoonsController');
Route::post('webtoons','WebtoonsController@upload')->name('webtoons.upload');
Route::resource('single_frames', 'SingleFramesController');
Route::post('single_frames','SingleFramesController@upload')->name('single_frames.upload');
Route::resource('multiple_frames', 'MultipleFramesController');
Route::post('multiple_frames','MultipleFramesController@upload')->name('multiple_frames.upload');
Route::resource('scenarios', 'ScenariosController');
