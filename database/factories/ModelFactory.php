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
| user_id                    | int(11)          | YES  |     | NULL    |                |
| creator_id                 | int(11)          | YES  |     | NULL    |                |
| company_rfc                | varchar(255)     | NO   | UNI | NULL    |                |
| company_comercial_name     | varchar(255)     | YES  |     | NULL    |                |
| company_social_reason      | varchar(255)     | YES  |     | NULL    |                |
| company_comercial_activity | varchar(255)     | YES  |     | NULL    |                |
| company_activity_sector    | varchar(255)     | YES  |     | NULL    |                |
| company_sector             | varchar(255)     | YES  |     | NULL    |                |
| company_description        | text             | YES  |     | NULL    |                |
| company_ceo                | varchar(255)     | YES  |     | NULL    |                |
| company_street             | varchar(255)     | YES  |     | NULL    |                |
| company_ext_number         | int(11)          | YES  |     | NULL    |                |
| company_int_number         | varchar(255)     | YES  |     | NULL    |                |
| company_zip                | int(11)          | YES  |     | NULL    |                |
| company_colony             | varchar(255)     | YES  |     | NULL    |                |
| company_state              | varchar(255)     | YES  |     | NULL    |                |
| company_city               | varchar(255)     | YES  |     | NULL    |                |
| company_web                | varchar(255)     | YES  |     | NULL    |                |
| company_contact_name       | varchar(255)     | YES  |     | NULL    |                |
| company_contact_position   | varchar(255)     | YES  |     | NULL    |                |
| company_contact_email      | varchar(255)     | YES  |     | NULL    |                |
| company_contact_phone      | int(11)          | YES  |     | NULL    |                |
| company_contact_mobile     | int(11)          | YES  |     | NULL    | 
*/

// company
//
//
$factory->define(App\models\Company::class, function ($faker) use ($factory) {
    return [
        'company_rfc'              => $faker->unique()->swiftBicNumber,
        'company_comercial_name'   => $faker->unique()->company,
        'company_social_reason'    => $faker->optional()->name,
        'company_description'      => $faker->optional()->text,
        'company_street'           => $faker->optional()->streetName,
        'company_ext_number'       => $faker->optional()->randomDigitNotNull,
        'company_zip'              => $faker->optional()->postcode,
        'company_state'            => $faker->optional()->state,
        'company_city'             => $faker->optional()->city,
        'company_web'              => $faker->optional()->url,
        'company_contact_name'     => $faker->optional()->name,
        'company_contact_position' => $faker->optional()->jobTitle,
        'company_contact_email'    => $faker->unique()->safeEmail,
        'company_contact_phone'    => $faker->optional()->numerify("##########"),
        'company_contact_mobile'   => $faker->optional()->numerify("##########"),
    ];
});

/*
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


