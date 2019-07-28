<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\JenisPelayanan;
use App\Pelanggan;
use App\TipeSepatu;
use Carbon;
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
		$tipe_sepatu = TipeSepatu::all();
        $pilih_pegawai = [];
        return view(
        	'transaksi.index',
        	[
        		'jenis_pelayanan' => $jenis_pelayanan,
        		'pilih_pelanggan' => $pilih_pelanggan,
				'pilih_pegawai' => $pilih_pegawai,
				'tipe_sepatu' => $tipe_sepatu
        	]
        );
    }

    // penyerahan
    public function push(Request $req)
    {
		$id = 0;
		// buat pelanggan baru
		if ($req['input_pelanggan']['nama'] != null) {
			try {
				$pelanggan = Pelanggan::create([
					'nama_pelanggan' => $req['input_pelanggan']['nama'],
					'alamat_pelanggan' => $req['input_pelanggan']['alamat'],
					'no_telepon' => $req['input_pelanggan']['no_telepon']
				]);
				$id = $pelanggan->id;
			} catch(Exception $e) {
				throw $e;
			}
		}
		$pelanggan = $id > 0 ? $id : $req['pilih_pelanggan'];
		$no_transaksi = $pelanggan . '-' . date('mdY') . '-' . time();

		$cekJumlahTransaksi = Transaksi::where('id_pelanggan', $pelanggan)->groupBy('no_transaksi')->get();
		$cekStatusMemberPelanggan = Pelanggan::find($pelanggan);
		$cekStatusMemberPelanggan = $cekStatusMemberPelanggan->status_member;
		$cekJumlahTransaksi = count($cekJumlahTransaksi);

		foreach ($req['jenis_pelayanan'] as $index => $data) {
			$pilih_pelanggan = $pelanggan;
			$tanggal_masuk = Carbon::now();
			$tanggal_keluar = Carbon::createFromFormat('m-d-Y', $req["tanggal_keluar"]);
			$jenis_pelayanan = $req['jenis_pelayanan'][$index];
			$tipe_sepatu = $req['tipe_sepatu'][$index];
			$jumlah_sepatu = $req['jumlah_sepatu'][$index];
			// $sub_total = $req['sub_total'];
			$total_harga = $cekJumlahTransaksi == 10 && $cekStatusMemberPelanggan == "MEMBER" ? 0 : $req['total_harga'];

			$data = [
				'no_transaksi' => $no_transaksi,
				'tanggal_masuk' => $tanggal_masuk,
				'tanggal_selesai' => $tanggal_keluar,
				'tipe_sepatu' => $tipe_sepatu,
				'jumlah_sepatu' => $jumlah_sepatu,
				'harga_total' => $total_harga,
				'id_pelanggan' => $pilih_pelanggan,
				'id_pelayanan' => $jenis_pelayanan,
				'id_pegawai' => Auth::id()
			];
			try {
				Transaksi::create($data);
			} catch (Exception $e) {
				throw $e;
			}
		}
		return json_encode([
			'status' => 'success',
			'message' => 'transaksi berhasil disimpan'
		]);
    }

    public function get()
    {
    	$data = Transaksi::GetAll();
    	return json_encode($data);
    }
}
