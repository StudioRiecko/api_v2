<?php

use Faker\Generator as Faker;
use App\Modules\City\Models\City;

/** @var $factory */
$factory->define(City::class, function (Faker $faker) {
    $name = $faker->city;
    return [
        'name' => $name,
        'slug' => str_slug($name,'-', 'nl'),
        'province_id' => 1,
    ];
});
