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
        $user = factory(\App\Modules\User\Models\User::class)->create(['email' => 'gebruiker@studioriecko.nl']);
        factory(\App\Modules\User\Models\UserProfile::class)->create(['user_id' => $user->id]);
    }
    
    
    
    
}
