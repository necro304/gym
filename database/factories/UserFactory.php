<?php

use Faker\Generator as Faker;
use App\User;

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
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'birthdate'=>$faker->date(),
        'height'=> random_int(150, 199),
        'type_document'=> $faker->randomElement(User::TYPE_DOCUMENT) ,
        'document'=> $faker->randomNumber(),
        'password' => bcrypt('secrect'), // secret
        'remember_token' => str_random(10),
        'verified' => $verificado = $faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
        'verified_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generateVerificationToken(),
        'admin' => $faker->randomElement([User::USARIO_ADMINISTRADOR, User::USARIO_REGULAR]),
    ];
});
