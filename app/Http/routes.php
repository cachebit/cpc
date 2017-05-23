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
//资源路由器
Route::get('stories', 'StoriesController@index')->name('stories.index');
Route::get('stories/create', 'StoriesController@create')->name('stories.create');
Route::get('stories/{stories}', 'StoriesController@show')->name('stories.show');
Route::post('stories', 'StoriesController@store')->name('stories.store');
Route::get('stories/{stories}/edit', 'StoriesController@edit')->name('stories.edit');
Route::patch('stories/{stories}', 'StoriesController@update')->name('stories.update');
Route::delete('stories/{stories}', 'StoriesController@destroy')->name('stories.destroy');

//section
Route::get('stories/{stories}/sections', 'SectionsController@index')->name('sections.index');
Route::get('stories/{stories}/sections/create', 'SectionsController@create')->name('sections.create');
Route::post('stories/{stories}/volums/sections/create', 'SectionsController@store_in_volum')->name('sections.store_in_volum');
Route::post('stories/{stories}/sections/create', 'SectionsController@store')->name('sections.store');
Route::get('stories/{stories}/sections/{sections}', 'SectionsController@show')->name('sections.show');
Route::get('stories/{stories}/sections/{sections}/edit', 'SectionsController@edit')->name('sections.edit');
Route::patch('stories/{stories}/sections/{sections}', 'SectionsController@update')->name('sections.update');
Route::delete('stories/{stories}/sections/{sections}', 'SectionsController@destroy')->name('sections.destroy');

//webtoons
Route::get('webtoons', 'WebtoonsController@index')->name('webtoons.index');
Route::get('webtoons/{webtoons}', 'WebtoonsController@show')->name('webtoons.show');
Route::get('webtoons/create', 'WebtoonsController@create')->name('webtoons.create');
Route::post('webtoons', 'WebtoonsController@store')->name('webtoons.store');
Route::get('webtoons/{webtoons}/edit', 'WebtoonsController@edit')->name('webtoons.edit');
Route::patch('webtoons/{webtoons}', 'WebtoonsController@update')->name('webtoons.update');
Route::delete('webtoons/{webtoons}', 'WebtoonsController@destroy')->name('webtoons.destroy');

//volum
Route::get('stories/{stories}/volums', 'VolumsController@index')->name('volums.index');
Route::get('stories/{stories}/volums/create', 'VolumsController@create')->name('volums.create');
Route::get('stories/{stories}/volums/{volums}', 'VolumsController@show')->name('volums.show');
Route::post('stories/{stories}/volums/create', 'VolumsController@store')->name('volums.store');
Route::get('volums/{volums}/edit', 'VolumsController@edit')->name('volums.edit');
Route::patch('volums/{volums}', 'VolumsController@update')->name('volums.update');
Route::delete('volums/{volums}', 'VolumsController@destroy')->name('volums.destroy');

//poster
Route::get('users/{users}/posters', 'PostersController@user_posters')->name('user.posters');
Route::get('{tags}/posters', 'PostersController@tag_posters')->name('tag.posters');
Route::get('posters', 'PostersController@index')->name('posters.index');
Route::get('stories/{stories}/posters/create', 'PostersController@create_in_story')->name('posters.create_in_story');
Route::get('posters/create', 'PostersController@create')->name('posters.create');
Route::get('posters/{posters}', 'PostersController@show')->name('posters.show');
Route::post('posters', 'PostersController@store')->name('posters.store');
Route::post('stories/{stories}/posters', 'PostersController@store_in_story')->name('posters.store_in_story');
Route::get('posters/{posters}/edit', 'PostersController@edit')->name('posters.edit');
Route::patch('posters/{posters}', 'PostersController@update')->name('posters.update');
Route::delete('posters/{posters}', 'PostersController@destroy')->name('posters.destroy');

//sketches
Route::get('users/{users}/sketches', 'SketchesController@user_sketches')->name('user.sketches');
Route::get('{tags}/sketches', 'SketchesController@tag_sketches')->name('tag.sketches');
Route::get('sketches', 'SketchesController@index')->name('sketches.index');
Route::get('stories/{stories}/sketches/create', 'SketchesController@create_in_story')->name('sketches.create_in_story');
Route::get('sketches/create', 'SketchesController@create')->name('sketches.create');
Route::get('sketches/{sketches}', 'SketchesController@show')->name('sketches.show');
Route::post('sketches', 'SketchesController@store')->name('sketches.store');
Route::post('stories/{stories}/sketches', 'SketchesController@store_in_story')->name('sketches.store_in_story');
Route::get('sketches/{sketches}/edit', 'SketchesController@edit')->name('sketches.edit');
Route::patch('sketches/{sketches}', 'SketchesController@update')->name('sketches.update');
Route::delete('sketches/{sketches}', 'SketchesController@destroy')->name('sketches.destroy');
