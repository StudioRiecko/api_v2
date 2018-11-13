<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\User\Models\UserProfile::class, function (Faker $faker) {
    return [
        'nickname' => $faker->firstName,
        'phone_number' => $faker->phoneNumber,
        'user_id' => \App\Modules\User\Models\User::inRandomOrder()->first()->id,
        'education_level_id' => \App\Modules\EducationLevel\Models\EducationLevel::inRandomOrder()->first()->id,
        'city_id' => \App\Modules\City\Models\City::inRandomOrder()->first()->id,
    ];
});
