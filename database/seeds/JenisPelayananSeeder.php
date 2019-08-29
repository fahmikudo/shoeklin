<?php

use Illuminate\Database\Seeder;
use App\JenisPelayanan;

class JenisPelayananSeeder extends Seeder
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
                'nama_pelayanan' => 'Reguler',
                'durasi_pelayanan' => 3,
                'harga_pelayanan' => 1000
            ],
            [
                'nama_pelayanan' => 'Express',
                'durasi_pelayanan' => 1,
                'harga_pelayanan' => 5000
            ]
        ];
        foreach ($arr as $value) {
            $user = JenisPelayanan::create($value);
        }
    }
}
