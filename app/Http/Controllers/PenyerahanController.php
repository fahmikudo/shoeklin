<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\JenisPelayanan;
use App\Pelanggan;
// use App\Pegawai;

use Auth;

class PenyerahanController extends Controller
{
    //
    public function index()
    {
        # code...
        $jenis_pelayanan = JenisPelayanan::Get();
        $pilih_pelanggan = Pelanggan::Get();
        $pilih_pegawai = [];
        return view(
        	'transaksi.index',
        	[
        		'jenis_pelayanan' => $jenis_pelayanan,
        		'pilih_pelanggan' => $pilih_pelanggan,
        		'pilih_pegawai' => $pilih_pegawai
        	]
        );
    }

    // penyerahan
    public function push(Request $req)
    {
    	$pilih_pelanggan = $req['pilih_pelanggan'];
    	$no_transaksi = $req['no_transaksi'];
    	$tanggal_masuk = $req['tanggal_masuk'];
    	$tanggal_keluar = $req['tanggal_keluar'];
    	$jenis_pelayanan = $req['jenis_pelayanan'];
    	$tipe_sepatu = $req['tipe_sepatu'];
    	$jumlah_sepatu = $req['jumlah_sepatu'];
    	$sub_total = $req['sub_total'];
    	$total_harga = $req['total_harga'];
    	// $pilih_pegawai = $req['pilih_pegawai'];

    	$data = [
    		'no_transaksi' => $no_transaksi,
    		'tanggal_masuk' => $tanggal_masuk,
    		'tanggal_selesai' => $tanggal_keluar,
    		'tipe_sepatu' => $tipe_sepatu,
    		'jumlah_sepatu' => $jumlah_sepatu,
    		'sub_total' => $sub_total,
    		'harga_total' => $total_harga,
    		'id_pelanggan' => $pilih_pelanggan,
    		'id_pelayanan' => $jenis_pelayanan,
    		'id_pegawai' => Auth::id()
    	];

    	// return json_encode($data);

    	$pushTransaksi = Transaksi::Simpan($data);
    	// $pushJenispelayanan = JenisPelayanan::Add($data);

    	if ($pushTransaksi)
    	{
    		return json_encode([
    			'status' => 'success',
    			'message' => 'transaksi berhasil disimpan'
    		]);
    	}
    	else 
    	{
    		return json_encode([
    			'status' => 'error',
    			'message' => 'transaksi gagal disimpan'
    		]);
    	}

    }

    public function get()
    {
    	$data = Transaksi::GetAll();
    	return json_encode($data);
    }
}
