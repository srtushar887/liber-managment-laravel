<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'dob' => $faker->date,
        'gender' => rand(1,2),
        'address' => $faker->address,
        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
    ];
});

$factory->define(\App\taxi_category::class, function (Faker $faker) {
    return [
        'category_name' => "category".' '.rand(1,20),
    ];
});


$factory->define(\App\Rider::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'dob' => $faker->date,
        'gender' => rand(1,2),
        'address' => $faker->address,
        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
        'status' => rand(1,2),
    ];
});


$factory->define(\App\multivendor_food_item::class, function (Faker $faker) {
    return [
        'food_item_name' => $faker->name,
        'food_item_image' => "https://www.chanchao.com.tw/images/default.jpg",
    ];
});

$factory->define(\App\multivendor_restaurent::class, function (Faker $faker) {
    return [
        'restaurant_name' => $faker->name,
        'restaurant_email' => $faker->email,
        'restaurant_address' => $faker->address,
        'restaurant_phone_number' => $faker->phoneNumber,
        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
        'show_pass' => "12345678",
    ];
});

$factory->define(\App\multivendor_store::class, function (Faker $faker) {
    return [
        'store_name' => $faker->name,
        'store_email' => $faker->email,
        'store_address' => $faker->address,
        'store_phone_number' => $faker->phoneNumber,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
        'show_pass' => "12345678",
    ];
});


$factory->define(\App\multivendor_delivery_boy::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),

    ];
});


$factory->define(\App\truck_category::class, function (Faker $faker) {
    return [
        'category_name' => "Truck Category".' '.rand(1,20),
    ];
});
