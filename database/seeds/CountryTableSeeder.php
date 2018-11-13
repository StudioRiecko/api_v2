<?php

use Illuminate\Database\Seeder;
use App\Modules\Country\Models\Country;

/**
 * Class CountryTableSeeder
 */
class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Country::class, 1)->create();
    }
}
