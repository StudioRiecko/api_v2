<?php

use Illuminate\Database\Seeder;
use App\Modules\City\Models\City;

/**
 * Class CountryTableSeeder
 */
class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(City::class, 5)->create();
    }
}
