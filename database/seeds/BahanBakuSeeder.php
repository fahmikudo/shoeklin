<?php

use Illuminate\Database\Seeder;
use App\BahanBaku;

class BahanBakuSeeder extends Seeder
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
                'nama_bahan_baku' => 'Sabun',
                'jumlah_bahan_baku' => 10,
                'jenis_bahan_baku' => 'Pembersih',
                'satuan' => 'Liter'
            ],
            [
                'nama_bahan_baku' => 'Parfum',
                'jumlah_bahan_baku' => 10,
                'jenis_bahan_baku' => 'Pewangi',
                'satuan' => 'Liter'
            ]
        ];
        foreach ($arr as $value) {
            BahanBaku::create($value);
        }
    }
}
