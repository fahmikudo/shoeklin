<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
	protected $table = 'transaksi';
	protected $fillable = ['no_transaksi', 'tanggal_masuk', 'tanggal_selesai', 'tipe_sepatu', 'jumlah_sepatu', 'harga_total', 'id_pelanggan', 'id_pelayanan', 'id_pegawai', 'tipe_pengambilan', 'jarak_pengiriman'];

    public function pelanggan() {
        return $this->hasMany('App\Pelanggan','id','id_pelanggan');
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
    		'tipe_sepatu.tipe_sepatu',
    		'transaksi.jumlah_sepatu',
    		'transaksi.harga_total',
    		'transaksi.status_pengiriman',
    		'transaksi.id_pelanggan',
    		'transaksi.id_pelayanan',
    		'transaksi.id_pegawai',
    		'jenispelayanan.nama_pelayanan',
    		'jenispelayanan.harga_pelayanan'
    	)
		->join('jenispelayanan', 'jenispelayanan.id', '=', 'transaksi.id_pelayanan')
		->join('tipe_sepatu', 'tipe_sepatu.id', '=', 'transaksi.tipe_sepatu')
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
	
	public function pelayanan() {
		return $this->hasOne('App\JenisPelayanan','id','id_pelayanan');
	}

	public function tipesepatu() {
		return $this->hasOne('App\TipeSepatu','id','tipe_sepatu');
	}
}
