<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class PengembalianController extends Controller
{
    //
    public function index(Request $req)
    {
        if ($req['keyword']) {
            $data = Transaksi::where('no_transaksi',$req['keyword'])->get();
        } else {
            $data = [];
        }
        return view('transaksi.pengembalian', [
            'transaksi' => $data
        ]);
    }
}
