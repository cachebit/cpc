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
Route::get('opuscules/{id}/webtoons', 'OpusculesController@webtoons')->name('opuscules.webtoons');
Route::resource('novellas', 'NovellasController');
Route::resource('novels', 'NovelsController');
Route::resource('posters', 'PostersController');
Route::resource('sketches', 'SketchesController');
Route::resource('drafts', 'DraftsController');
Route::resource('settings', 'SettingsController');
Route::resource('webtoons', 'webtoonsController');
Route::resource('single_frames', 'SingleFramesController');
Route::resource('multiple_frames', 'MultipleFramesController');
Route::resource('scenarios', 'ScenariosController');
