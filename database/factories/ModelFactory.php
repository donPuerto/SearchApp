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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'imageUrl' => 'http://placekitten.com/160/150',
        'company' => $faker->company,
        'job_title' => $faker->title,
        'emailadd' => $faker->email,
        'phone1' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'street_address1' => $faker->address,
        'street_address2' => $faker->address,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'country' => $faker->country,
    ];
});
