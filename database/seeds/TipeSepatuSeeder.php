<?php

use Illuminate\Database\Seeder;
use App\TipeSepatu;

class TipeSepatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Canvas', 'Suede', 'Kulit', 'Karet', 'Denim'];
        foreach ($arr as $value) {
            $user = TipeSepatu::create([
                'tipe_sepatu' => $value
            ]);
        }
    }
}
