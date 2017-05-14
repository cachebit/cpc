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
Route::get('/create','StaticPagesController@create')->name('create');

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

//story
Route::get('users/{users}/stories', 'StoriesController@stories')->name('users.stories');
Route::get('stories/{stories}/add', 'StoriesController@add')->name('stories.add');
Route::get('stories/{stories}/delete', 'StoriesController@go_delete')->name('stories.go_delete');
Route::get('stories/{stories}/add/section', 'StoriesController@add_section')->name('stories.add_section');
Route::post('stories/{stories}/add/section', 'StoriesController@save_section')->name('stories.save_section');
Route::resource('stories', 'StoriesController');

//section
Route::get('sections/{sections}/add/webtoons', 'SectionsController@webtoons')->name('sections.webtoons');
Route::get('sections/{sections}/add/multiple_frames', 'SectionsController@multiple_frames')->name('sections.multiple_frames');
Route::get('sections/{sections}/add/texts', 'SectionsController@texts')->name('sections.texts');
Route::post('sections/{sections}/add/webtoons', 'SectionsController@save_webtoons')->name('sections.save_webtoons');
Route::post('sections/{sections}/add/multiple_frames', 'SectionsController@save_multiple_frames')->name('sections.save_multiple_frames');
Route::post('sections/{sections}/add/texts', 'SectionsController@save_texts')->name('sections.save_texts');
Route::get('sections/{sections}/add', 'SectionsController@add')->name('sections.add');
Route::resource('sections', 'SectionsController');

//webtoons
Route::resource('webtoons', 'WebtoonsController');

//volum
Route::patch('sections/{sections}/change/volum', 'VolumsController@change')->name('change.volum');
Route::resource('volums', 'VolumsController');
