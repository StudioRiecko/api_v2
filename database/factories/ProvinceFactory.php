<?php

use Faker\Generator as Faker;
use \App\Modules\Province\Models\Province;
use \App\Modules\Country\Models\Country;

/** @var $factory */
$factory->define(Province::class, function (Faker $faker) {
    return [
        'name' => 'Noord-Holland',
        'country_id' => function () {
            return factory(Country::class)->create()->first()->getKey();
        },
    ];
});
