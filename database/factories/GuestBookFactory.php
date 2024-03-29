<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\GuestMessage;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$guestMsg = $factory->define(GuestMessage::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'text' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'homepage' => $faker->url,
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'tags' => $faker->words($nb = 3, $asText = false),
    ];
});
