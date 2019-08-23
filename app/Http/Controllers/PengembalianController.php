<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class PengembalianController extends Controller
{
    //
    public function index(Request $req)
    {
        if ($req['id_delete']) {
            $data = Transaksi::find($req['id_delete']);
            $data->status_pengiriman = "SUDAH DIKIRIM";
            $data->save();
            return back();
        }
        if ($req['keyword']) {
            $data = Transaksi::where('no_transaksi',$req['keyword'])
            ->where('status_pengiriman','BELUM DIKIRIM')
            ->where('tipe_pengambilan','diambil')
            ->get();
        } else {
            $data = [];
        }
        return view('transaksi.pengembalian', [
            'transaksi' => $data
        ]);
    }
}
