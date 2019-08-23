<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TipeSepatuSeeder::class);
        $this->call(JenisPelayananSeeder::class);
        $this->call(BahanBakuSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
