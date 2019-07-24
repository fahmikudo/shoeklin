<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function pelanggan() {
        return $this->hasMany('App\Pelanggan','id','id_pelangan');
    }

    public function pegawai() {
        return $this->hasMany('App\User','id','id_pegawai');
    }

    public function scopeGetAll($query) {
    	return DB::table($this->table)
    	->select(
    		'transaksi.id',
    		'transaksi.no_transaksi',
    		'transaksi.tanggal_masuk',
    		'transaksi.tanggal_selesai',
    		'transaksi.tipe_sepatu',
    		'transaksi.jumlah_sepatu',
    		'transaksi.sub_total',
    		'transaksi.harga_total',
    		'transaksi.status_pengiriman',
    		'transaksi.id_pelanggan',
    		'transaksi.id_pelayanan',
    		'transaksi.id_pegawai',
    		'jenispelayanan.nama_pelayanan',
    		'jenispelayanan.harga_pelayanan'
    	)
    	->join('jenispelayanan', 'jenispelayanan.id', '=', 'transaksi.id_pelayanan')
    	->orderBy('transaksi.id', 'desc')
    	->get();
    }

    public function scopeGetAllByType($query, $status) {
    	return DB::table($this->table)
    	->select(
    		'transaksi.id',
    		'transaksi.no_transaksi',
    		'transaksi.tanggal_masuk',
    		'transaksi.tanggal_selesai',
    		'transaksi.tipe_sepatu',
    		'transaksi.jumlah_sepatu',
    		'transaksi.sub_total',
    		'transaksi.harga_total',
    		'transaksi.status_pengiriman',
    		'transaksi.id_pelanggan',
    		'transaksi.id_pelayanan',
    		'transaksi.id_pegawai',
    		'jenispelayanan.nama_pelayanan',
    		'jenispelayanan.harga_pelayanan'
    	)
    	->join('jenispelayanan', 'jenispelayanan.id', '=', 'transaksi.id_pelayanan')
    	->where('transaksi.status_pengiriman', $status)
    	->orderBy('transaksi.id', 'desc')
    	->get();
    }

    public function scopeSimpan($query, $data) {
    	return DB::table($this->table)->insert($data);
    }
}
