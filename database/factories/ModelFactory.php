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


// opd
//
//
$factory->define(App\models\Opd::class, function ($faker) use ($factory) {
    return [
        'opd_name'             => $faker->unique()->company,
        'opd_chancellor'       => $faker->optional()->name,
        'opd_description'      => $faker->optional()->text,
        'opd_street'           => $faker->optional()->streetName,
        'opd_ext_number'       => $faker->optional()->randomDigitNotNull,
        'opd_zip'              => $faker->optional()->postcode,
        'opd_state'            => $faker->optional()->state,
        'opd_city'             => $faker->optional()->city,
        'opd_web'              => $faker->optional()->url,
        'opd_contact_name'     => $faker->optional()->name,
        'opd_contact_position' => $faker->optional()->jobTitle,
        'opd_contact_email'    => $faker->unique()->safeEmail,
        'opd_contact_phone'    => $faker->optional()->numerify("##########"),
        'opd_contact_mobile'   => $faker->optional()->numerify("##########"),
    ];
});


// student
//
//
$factory->define(App\models\Student::class, function ($faker) use ($factory) {
    return [
        'student_registration_id'   => $faker->numerify("##########"),
        'student_name'              => $faker->optional()->firstName,
        'student_primary_last_name' => $faker->optional()->lastName,
        'student_second_last_name'  => $faker->optional()->lastName,
        'student_phone'             => $faker->optional()->numerify("##########"),
        'student_mobile'            => $faker->optional()->numerify("##########"),
    ];
});


