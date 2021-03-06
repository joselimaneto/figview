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

$factory->define(Figview\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Figview\Entities\Orion::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'url' => $faker->url,
        'port' => $faker->randomNumber(),
        'X_Auth_Token' => $faker->word,
        'user_id' => rand(1, 10),
    ];
});

$factory->define(Figview\Entities\Idas::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'url' => $faker->url,
        'adminport' => $faker->randomNumber(),
        'ul20port' => $faker->randomNumber(),
        'user_id' => rand(1, 10),
    ];
});

$factory->define(Figview\Entities\IotEnv::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'Fiware_Service' => $faker->word,
        'content_type' => $faker->word,
        'Fiware_ServicePath' => $faker->word,
        'X_Auth_Token' => $faker->word,
        'orion_id' => rand(1, 10),
        'idas_id' => rand(1, 10),
        'user_id' => rand(1, 10),
    ];
});

$factory->define(Figview\Entities\ContextTreePath::class, function (Faker\Generator $faker) {
    return [
        'ancestor' => rand(1, 10),
        'descendant' => rand(1, 10),
    ];
});

$factory->define(Figview\Entities\DeviceModel::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'model' => $faker->latitude,
        'iotenv_id' => rand(1, 10),
    ];
});

$factory->define(Figview\Entities\IoTEnvMember::class, function (Faker\Generator $faker) {
    return [
        'iotenv_id' => rand(1, 10),
        'member_id' => rand(1, 10),
    ];
});