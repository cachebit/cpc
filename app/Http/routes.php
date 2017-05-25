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

//gallery
Route::get('galleries/{galleries}', 'GalleriesController@show')->name('galleries.show');
Route::post('galleries/{galleries}', 'GalleriesController@score')->name('galleries.score');

//story
Route::get('users/{users}/stories', 'StoriesController@user_stories')->name('user.stories');
Route::get('tags/{tags}/stories', 'StoriesController@tag_stories')->name('tag.stories');
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
Route::get('sections/{sections}/add_content', 'SectionsController@add_content')->name('sections.add_content');
Route::get('stories/{stories}/sections', 'SectionsController@index')->name('sections.index');
Route::get('stories/{stories}/sections/create', 'SectionsController@create')->name('sections.create');
Route::post('stories/{stories}/volums/sections/create', 'SectionsController@store_in_volum')->name('sections.store_in_volum');
Route::post('stories/{stories}/sections/create', 'SectionsController@store')->name('sections.store');
Route::get('stories/{stories}/sections/{sections}', 'SectionsController@show')->name('sections.show');
Route::get('stories/{stories}/sections/{sections}/edit', 'SectionsController@edit')->name('sections.edit');
Route::patch('stories/{stories}/sections/{sections}', 'SectionsController@update')->name('sections.update');
Route::delete('stories/{stories}/sections/{sections}', 'SectionsController@destroy')->name('sections.destroy');

//volum
Route::get('stories/{stories}/volums', 'VolumsController@index')->name('volums.index');
Route::get('stories/{stories}/volums/create', 'VolumsController@create')->name('volums.create');
Route::get('stories/{stories}/volums/{volums}', 'VolumsController@show')->name('volums.show');
Route::post('stories/{stories}/volums/create', 'VolumsController@store')->name('volums.store');
Route::get('volums/{volums}/edit', 'VolumsController@edit')->name('volums.edit');
Route::patch('volums/{volums}', 'VolumsController@update')->name('volums.update');
Route::delete('volums/{volums}', 'VolumsController@destroy')->name('volums.destroy');

//poster
Route::post('posters/{posters}', 'PostersController@gallery')->name('posters.gallery');
Route::get('users/{users}/posters', 'PostersController@user_posters')->name('posters.user_posters');
Route::get('tags/{tags}/posters', 'PostersController@tag_posters')->name('posters.tag_posters');
Route::get('stories/{stories}/posters', 'PostersController@story_posters')->name('posters.story_posters');
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
Route::get('users/{users}/sketches', 'SketchesController@user_sketches')->name('sketches.user_sketches');
Route::get('tags/{tags}/sketches', 'SketchesController@tag_sketches')->name('sketches.tag_sketches');
Route::get('stories/{stories}/sketches', 'SketchesController@story_sketches')->name('sketches.story_sketches');
Route::get('sketches', 'SketchesController@index')->name('sketches.index');
Route::get('stories/{stories}/sketches/create', 'SketchesController@create_in_story')->name('sketches.create_in_story');
Route::get('sketches/create', 'SketchesController@create')->name('sketches.create');
Route::get('sketches/{sketches}', 'SketchesController@show')->name('sketches.show');
Route::post('sketches', 'SketchesController@store')->name('sketches.store');
Route::post('stories/{stories}/sketches', 'SketchesController@store_in_story')->name('sketches.store_in_story');
Route::get('sketches/{sketches}/edit', 'SketchesController@edit')->name('sketches.edit');
Route::patch('sketches/{sketches}', 'SketchesController@update')->name('sketches.update');
Route::delete('sketches/{sketches}', 'SketchesController@destroy')->name('sketches.destroy');

//settings
Route::get('users/{users}/settings', 'SettingsController@user_settings')->name('settings.user_settings');
Route::get('tags/{tags}/settings', 'SettingsController@tag_settings')->name('settings.tag_settings');
Route::get('stories/{stories}/settings', 'SettingsController@story_settings')->name('settings.story_settings');
Route::get('settings', 'SettingsController@index')->name('settings.index');
Route::get('stories/{stories}/settings/create', 'SettingsController@create_in_story')->name('settings.create_in_story');
Route::get('settings/create', 'SettingsController@create')->name('settings.create');
Route::get('settings/{settings}', 'SettingsController@show')->name('settings.show');
Route::post('settings', 'SettingsController@store')->name('settings.store');
Route::post('stories/{stories}/settings', 'SettingsController@store_in_story')->name('settings.store_in_story');
Route::get('settings/{settings}/edit', 'SettingsController@edit')->name('settings.edit');
Route::patch('settings/{settings}', 'SettingsController@update')->name('settings.update');
Route::delete('settings/{settings}', 'SettingsController@destroy')->name('settings.destroy');

//drafts
Route::get('users/{users}/drafts', 'DraftsController@user_drafts')->name('drafts.user_drafts');
Route::get('tags/{tags}/drafts', 'DraftsController@tag_drafts')->name('drafts.tag_drafts');
Route::get('stories/{stories}/drafts', 'DraftsController@story_drafts')->name('drafts.story_drafts');
Route::get('drafts', 'DraftsController@index')->name('drafts.index');
Route::get('stories/{stories}/drafts/create', 'DraftsController@create_in_story')->name('drafts.create_in_story');
Route::get('drafts/create', 'DraftsController@create')->name('drafts.create');
Route::get('drafts/{drafts}', 'DraftsController@show')->name('drafts.show');
Route::post('drafts', 'DraftsController@store')->name('drafts.store');
Route::post('stories/{stories}/drafts', 'DraftsController@store_in_story')->name('drafts.store_in_story');
Route::get('drafts/{drafts}/edit', 'DraftsController@edit')->name('drafts.edit');
Route::patch('drafts/{drafts}', 'DraftsController@update')->name('drafts.update');
Route::delete('drafts/{drafts}', 'DraftsController@destroy')->name('drafts.destroy');

//webtoons
Route::get('sections/{sections}/webtoons/create', 'WebtoonsController@create_in_section')->name('webtoons.create_in_section');
Route::get('webtoons/create', 'WebtoonsController@create')->name('webtoons.create');
Route::post('webtoons', 'WebtoonsController@store')->name('webtoons.store');
Route::post('sections/{sections}/webtoons', 'WebtoonsController@store_in_section')->name('webtoons.store_in_section');
Route::get('webtoons/{webtoons}/edit', 'WebtoonsController@edit')->name('webtoons.edit');
Route::patch('webtoons/{webtoons}', 'WebtoonsController@update')->name('webtoons.update');
Route::delete('webtoons/{webtoons}', 'WebtoonsController@destroy')->name('webtoons.destroy');

//multiple_frames
Route::get('sections/{sections}/multiple_frames/create', 'MultipleFramesController@create_in_section')->name('multiple_frames.create_in_section');
Route::get('multiple_frames/create', 'MultipleFramesController@create')->name('multiple_frames.create');
Route::post('multiple_frames', 'MultipleFramesController@store')->name('multiple_frames.store');
Route::post('sections/{sections}/multiple_frames', 'MultipleFramesController@store_in_section')->name('multiple_frames.store_in_section');
Route::get('multiple_frames/{multiple_frames}/edit', 'MultipleFramesController@edit')->name('multiple_frames.edit');
Route::patch('multiple_frames/{multiple_frames}', 'MultipleFramesController@update')->name('multiple_frames.update');
Route::delete('multiple_frames/{multiple_frames}', 'MultipleFramesController@destroy')->name('multiple_frames.destroy');

//texts
Route::get('sections/{sections}/texts/create', 'TextsController@create_in_section')->name('texts.create_in_section');
Route::get('texts/create', 'TextsController@create')->name('texts.create');
Route::post('texts', 'TextsController@store')->name('texts.store');
Route::post('sections/{sections}/texts', 'TextsController@store_in_section')->name('texts.store_in_section');
Route::get('texts/{texts}/edit', 'TextsController@edit')->name('texts.edit');
Route::patch('texts/{texts}', 'TextsController@update')->name('texts.update');
Route::delete('texts/{texts}', 'TextsController@destroy')->name('texts.destroy');
