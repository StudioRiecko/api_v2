<?php

use Illuminate\Database\Seeder;
use \App\Modules\Province\Models\Province;

/**
 * Class ProvinceTableSeeder
 */
class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Province::class, 1)->create();
    }
}
