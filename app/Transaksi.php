<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function pelanggan() {
        return $this->hasMany('App\Pelanggan','id','id_pelangan');
    }

    public function pegawai() {
        return $this->hasMany('App\User','id','id_pegawai');
    }
}
