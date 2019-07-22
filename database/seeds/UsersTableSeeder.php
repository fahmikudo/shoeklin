<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'Fahmi Kudo',
            'email' => 'admin@fahmikudo.web.id',
            'password'  => bcrypt('kudo12'),
            'jabatan' => 'ADMIN',
            'no_telepon' => '085320300227',
            'alamat' => 'Jl. Sukasari II No. 290'
        ]);
    }
}
