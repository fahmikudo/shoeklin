<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'key' => 'promo',
            'value'=> 10
        ]);
    }
}
