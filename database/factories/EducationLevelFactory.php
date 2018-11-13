<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\EducationLevel\Models\EducationLevel::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => str_slug($name,'-', 'nl'),
    ];
});
