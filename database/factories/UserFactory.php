<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Bookmark::class, function (Faker\Generator $faker) {
    
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'book_id' => App\Models\Book::all()->random()->id,
        'status' => $faker->boolean,
    ];
});

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'introduction' => $faker->paragraph,
        'content' => $faker->paragraph,
        'publish_date' => $faker->dateTime($max = 'now'),
        'author' => $faker->name,
        'picture' => config('setting.picture'),
        'total_page' => $faker->numberBetween(10, 100),
        'average_rating' => $faker->numberBetween(1.5, 5),
        'counter_view' => $faker->numberBetween(0, 55),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'parent_id' => $faker->numberBetween(1, 10),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'review_id' => App\Models\Review::all()->random()->id,
        'content' => $faker->paragraph,
    ];
});

$factory->define(App\Models\Favorite::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\Models\User::all()->random()->id,
        'book_id' => App\Models\Book::all()->random()->id,
    ];
});

$factory->define(App\Models\Follow::class, function (Faker\Generator $faker) {

    return [
        'follower_id' => App\Models\User::all()->random()->id,
        'followed_id' => App\Models\User::all()->random()->id,
        'status' => $faker->boolean,
    ];
});

$factory->define(App\Models\LikeActivity::class, function (Faker\Generator $faker) {
    
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'review_id' => App\Models\Review::all()->random()->id,
        'is_like' => $faker->boolean,
    ];
});

$factory->define(App\Models\Request::class, function (Faker\Generator $faker) {
    
    return [
        'title' => $faker->name,
        'user_id' => App\Models\User::all()->random()->id,
        'category_id' => App\Models\Category::all()->random()->id,
    ];
});

$factory->define(App\Models\Review::class, function (Faker\Generator $faker) {
    
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'book_id' => App\Models\Book::all()->random()->id,
        'content' => $faker->paragraph,
        'rating' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '654321',
        'remember_token' => str_random(10),
        'verified' => $faker->boolean,
    ];
});
