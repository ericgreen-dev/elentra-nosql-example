<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modules\MariaDB\Models\Data;
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

$factory->define(Data::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'data' => [
            'primary_contact' => [
                'primary_email' => $faker->email,
                'primary_phone' => $faker->phoneNumber
            ],
            'emergency_contact' => [
                'primary_email' => $faker->email,
                'primary_phone' => $faker->phoneNumber
            ],
            'primary_address' => [
                'street_number' => $faker->buildingNumber,
                'street_name' => $faker->streetName,
                'postal_code' => $faker->postcode
            ]
        ]
    ];
});
