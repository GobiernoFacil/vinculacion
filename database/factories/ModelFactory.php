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

// Base user
//
//
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(str_random(10)),
        'enabled'        => 0,
        'remember_token' => str_random(10),
    ];
});

// chamber
//
//
/*
 chamber_rfc                | varchar(255)     | NO   | UNI | NULL    |                |
| chamber_comercial_name     | varchar(255)     | YES  |     | NULL    |                |
| chamber_social_reason      | varchar(255)     | YES  |     | NULL    |                |
| chamber_comercial_activity | varchar(255)     | YES  |     | NULL    |                |
| chamber_activity_sector    | varchar(255)     | YES  |     | NULL    |                |
| chamber_sector             | varchar(255)     | YES  |     | NULL    |                |
| chamber_description        | text             | YES  |     | NULL    |                |
| chamber_ceo                | varchar(255)     | YES  |     | NULL    |                |
| chamber_street             | varchar(255)     | YES  |     | NULL    |                |
| chamber_ext_number         | int(11)          | YES  |     | NULL    |                |
| chamber_int_number         | varchar(255)     | YES  |     | NULL    |                |
| chamber_zip                | int(11)          | YES  |     | NULL    |                |
| chamber_colony             | varchar(255)     | YES  |     | NULL    |                |
| chamber_state              | varchar(255)     | YES  |     | NULL    |                |
| chamber_city               | varchar(255)     | YES  |     | NULL    |                |
| chamber_web                | varchar(255)     | YES  |     | NULL    |                |
| chamber_contact_name       | varchar(255)     | YES  |     | NULL    |                |
| chamber_contact_position   | varchar(255)     | YES  |     | NULL    |                |
| chamber_contact_email      | varchar(255)     | YES  |     | NULL    |                |
| chamber_contact_phone      | int(11)          | YES  |     | NULL    |                |
| chamber_contact_mobile     | int(11)          | YES  |     | NULL    |                |
*/
$factory->define(App\models\Chamber::class, function ($faker) use ($factory) {
    return [
        'chamber_rfc'              => $faker->unique()->swiftBicNumber,
        'chamber_comercial_name'   => $faker->unique()->company,
        'chamber_social_reason'    => $faker->optional()->name,
        'chamber_description'      => $faker->optional()->text,
        'chamber_street'           => $faker->optional()->streetName,
        'chamber_ext_number'       => $faker->optional()->randomDigitNotNull,
        'chamber_zip'              => $faker->optional()->postcode,
        'chamber_state'            => $faker->optional()->state,
        'chamber_city'             => $faker->optional()->city,
        'chamber_web'              => $faker->optional()->url,
        'chamber_contact_name'     => $faker->optional()->name,
        'chamber_contact_position' => $faker->optional()->jobTitle,
        'chamber_contact_email'    => $faker->unique()->safeEmail,
        'chamber_contact_phone'    => $faker->optional()->numerify("##########"),
        'chamber_contact_mobile'   => $faker->optional()->numerify("##########"),
    ];
});

/*
// Admin
//
//
$factory->defineAs(App\User::class, 'admin', function ($faker) use ($factory) {
    $user = $factory->raw(App\User::class);
    return array_merge($user, ['type' => "admin"]);
});

// chamber
//
//
$factory->defineAs(App\User::class, 'chamber', function ($faker) use ($factory) {
    $user = $factory->raw(App\User::class);
    return array_merge($user, ['type' => "chamber"]);
});


// company
//
//
$factory->defineAs(App\User::class, 'company', function ($faker) use ($factory) {
    $user = $factory->raw(App\User::class);
    return array_merge($user, ['type' => "company"]);
});


// opd
//
//
$factory->defineAs(App\User::class, 'opd', function ($faker) use ($factory) {
    $user = $factory->raw(App\User::class);
    return array_merge($user, ['type' => "opd"]);
});


// student
//
//
$factory->defineAs(App\User::class, 'student', function ($faker) use ($factory) {
    $user = $factory->raw(App\User::class);
    return array_merge($user, ['type' => "student"]);
});
*/


