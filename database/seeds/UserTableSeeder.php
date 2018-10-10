<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory->define(User::class, function (Faker\Generator $faker) {
            return [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt(str_random(10)),
                'remember_token' => str_random(10),
            ];
        });
    }
    
    
    
    
}
