<?php

use Illuminate\Database\Seeder;
use App\Modules\City\Models\City;

/**
 * Class EducationLevelTableSeeder
 */
class EducationLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(\App\Modules\EducationLevel\Models\EducationLevel::class)->create(['name' => 'MBO' , 'slug' => 'mbo']);
        factory(\App\Modules\EducationLevel\Models\EducationLevel::class)->create(['name' => 'HBO/WO' , 'slug' => 'hbo']);
    }
}
