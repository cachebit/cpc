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
Route::get('create','StaticPagesController@create')->name('create');

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
Route::get('users/{users}/stories', 'StoriesController@user_stories')->name('user.stories');
Route::get('{tags}/stories', 'StoriesController@tag_stories')->name('tag.stories');
//待修改
Route::get('stories/{stories}/add', 'StoriesController@add')->name('stories.add');
Route::get('stories/{stories}/delete', 'StoriesController@go_delete')->name('stories.go_delete');
Route::post('stories/{stories}/add/section', 'StoriesController@save_section')->name('stories.save_section');
//资源路由器
Route::get('stories', 'StoriesController@index')->name('stories.index');
Route::get('stories/create', 'StoriesController@create')->name('stories.create');
Route::get('stories/{stories}', 'StoriesController@show')->name('stories.show');
Route::post('stories', 'StoriesController@store')->name('stories.store');
Route::get('stories/{stories}/edit', 'StoriesController@edit')->name('stories.edit');
Route::patch('stories/{stories}', 'StoriesController@update')->name('stories.update');
Route::delete('stories/{stories}', 'StoriesController@destroy')->name('stories.destroy');

//section
Route::get('sections/{sections}/add/webtoons', 'SectionsController@webtoons')->name('sections.webtoons');
Route::get('sections/{sections}/add/multiple_frames', 'SectionsController@multiple_frames')->name('sections.multiple_frames');
Route::get('sections/{sections}/add/texts', 'SectionsController@texts')->name('sections.texts');
Route::post('sections/{sections}/add/webtoons', 'SectionsController@save_webtoons')->name('sections.save_webtoons');
Route::post('sections/{sections}/add/multiple_frames', 'SectionsController@save_multiple_frames')->name('sections.save_multiple_frames');
Route::post('sections/{sections}/add/texts', 'SectionsController@save_texts')->name('sections.save_texts');
Route::get('sections/{sections}/add', 'SectionsController@add')->name('sections.add');
Route::resource('sections', 'SectionsController');
Route::get('sections', 'SectionsController@index')->name('sections.index');
Route::get('sections/{sections}', 'SectionsController@show')->name('sections.show');
Route::get('stories/{stories}/create/sections', 'SectionsController@create')->name('sections.create');
Route::post('stories/{stories}/create/sections', 'SectionsController@store')->name('sections.store');
Route::get('sections/{sections}/edit', 'SectionsController@edit')->name('sections.edit');
Route::patch('sections/{sections}', 'SectionsController@update')->name('sections.update');
Route::delete('sections/{sections}', 'SectionsController@destroy')->name('sections.destroy');

//webtoons
Route::get('webtoons', 'WebtoonsController@index')->name('webtoons.index');
Route::get('webtoons/{webtoons}', 'WebtoonsController@show')->name('webtoons.show');
Route::get('webtoons/create', 'WebtoonsController@create')->name('webtoons.create');
Route::post('webtoons', 'WebtoonsController@store')->name('webtoons.store');
Route::get('webtoons/{webtoons}/edit', 'WebtoonsController@edit')->name('webtoons.edit');
Route::patch('webtoons/{webtoons}', 'WebtoonsController@update')->name('webtoons.update');
Route::delete('webtoons/{webtoons}', 'WebtoonsController@destroy')->name('webtoons.destroy');

//volum
Route::patch('sections/{sections}/change/volum', 'VolumsController@change')->name('change.volum');
Route::get('volums', 'VolumsController@index')->name('volums.index');
Route::get('volums/{volums}', 'VolumsController@show')->name('volums.show');
Route::get('volums/create', 'VolumsController@create')->name('volums.create');
Route::post('volums', 'VolumsController@store')->name('volums.store');
Route::get('volums/{volums}/edit', 'VolumsController@edit')->name('volums.edit');
Route::patch('volums/{volums}', 'VolumsController@update')->name('volums.update');
Route::delete('volums/{volums}', 'VolumsController@destroy')->name('volums.destroy');

//poster
Route::get('posters', 'PostersController@index')->name('posters.index');
Route::get('posters/{posters}', 'PostersController@show')->name('posters.show');
Route::get('posters/create', 'PostersController@create')->name('posters.create');
Route::post('posters', 'PostersController@store')->name('posters.store');
Route::get('posters/{posters}/edit', 'PostersController@edit')->name('posters.edit');
Route::patch('posters/{posters}', 'PostersController@update')->name('posters.update');
Route::delete('posters/{posters}', 'PostersController@destroy')->name('posters.destroy');
