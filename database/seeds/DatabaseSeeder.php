<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        
        $this->runAndShowPassportKeys();
    }
    
    private function runAndShowPassportKeys()
    {
        Artisan::call('passport:install');
        $keys = \Illuminate\Support\Facades\DB::table('oauth_clients')->get();
        $output = new Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>Laravel passport Keys</info>");
        foreach ($keys as $key) {
            $output->writeln("<question>Client Name:</question> " . $key->name);
            $output->writeln("<comment>Client ID:</comment> " . $key->id);
            $output->writeln("<comment>Client Secret:</comment> " . $key->secret);
        }
    }
}
