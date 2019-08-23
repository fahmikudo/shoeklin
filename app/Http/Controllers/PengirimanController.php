<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class PengirimanController extends Controller
{
    public function index()
    {
        $data = Transaksi::where('status_pengiriman','BELUM DIKIRIM')->where('tipe_pengambilan','diantar')->get();
    	return view('transaksi.pengiriman', [
            'transaksi' => $data
        ]);
    }
}
