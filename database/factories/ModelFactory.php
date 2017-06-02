<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'title' => $faker->name,
        'group' => $faker->name,
        'portrait' => '/img/portrait/user.gif',
        'aesthetic' => (float)rand(70,150),
        'passion' => 100.00,
        'coins' => 0,
        'experience' => 0,
        'practice' => 0,
        'activated' => true,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(App\Story::class, function (Faker\Generator $faker) {
    return [
        'title' => '一个title名称，一个很长很长的名称，要你相信',
        'description' => '故事改编自吉川英治的小说《宫本武藏》。自1998年起在讲谈社《周刊Morning》杂志连载。日本国内总发行量至33卷时已突破6000万本。本作品曾获得2000年第24届讲谈社漫画赏一般部门奖、2000年第4届文化厅媒体艺术祭漫画部门奖以及2002年第6届手冢治虫文化奖漫画大奖。',
        'score' => 0,
        'up' => 0,
        'type' => '',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(App\Cover::class, function (Faker\Generator $faker) {
    $path = '/img/site/covers/'.rand(1,100).'.jpg';
    return [
        'cover' => $path,
        'cover_m' => $path,
        'cover_s' => $path,
        'imageable_type' => 'App\Story',
        'imageable_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(App\Poster::class, function (Faker\Generator $faker) {
    $path = '/img/site/covers/'.rand(1,100).'.jpg';
    return [
      'story_id' => 1,
      'title' => $faker->name,
      'description' => $faker->sentence,
      'score' => 0,
      'up' => 0,
      'path' => $path,
      'path_s' => $path,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
});

$factory->define(App\Setting::class, function (Faker\Generator $faker) {
    $path = '/img/site/covers/'.rand(1,100).'.jpg';
    return [
      'story_id' => 1,
      'title' => $faker->name,
      'description' => $faker->sentence,
      'score' => 0,
      'up' => 0,
      'path' => $path,
      'path_s' => $path,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
});

$factory->define(App\Sketch::class, function (Faker\Generator $faker) {
    $path = '/img/site/covers/'.rand(1,100).'.jpg';
    return [
      'story_id' => 1,
      'title' => $faker->name,
      'description' => $faker->sentence,
      'score' => 0,
      'up' => 0,
      'path' => $path,
      'path_s' => $path,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
});

$factory->define(App\Gallery::class, function (Faker\Generator $faker) {
    return [
      'user_id' => 1,
      'imageable_id' => 1,
      'imageable_type' => '',
      'scorable' => true,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
});



$factory->define(App\Score::class, function (Faker\Generator $faker) {
    return [
      'user_id' => 1,
      'gallery_id' => 1,
      'score' => (float)rand(70,150),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
});
