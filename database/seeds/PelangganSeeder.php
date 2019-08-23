<?php

use Illuminate\Database\Seeder;
use App\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'nama_pelanggan' => 'Adisty Zara',
                'alamat_pelanggan' => 'Jalan JKT48',
                'no_telepon' => '08814045',
                'status_member' => 'MEMBER',
                'jumlah_pencucian' => 0
            ],
            [
                'nama_pelanggan' => 'Nabilah Ratna Ayu Azalia',
                'alamat_pelanggan' => 'Jalan JKT48',
                'no_telepon' => '0224567896',
                'status_member' => 'NON MEMBER',
                'jumlah_pencucian' => 0
            ]
        ];
        foreach ($arr as $value) {
            Pelanggan::create($value);
        }
    }
}
