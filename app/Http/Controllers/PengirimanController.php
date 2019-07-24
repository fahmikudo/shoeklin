<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class PengirimanController extends Controller
{
    public function index()
    {
    	return view('transaksi.pengiriman');
    }

    public function dikirim()
    {
    	$data = Transaksi::GetAllByType('SUDAH DIKIRIM');
    	return json_encode($data);
    }
}
