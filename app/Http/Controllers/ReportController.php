<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function nota(Request $req) {
        $data = Transaksi::where('no_transaksi', $req['id'])->get();
        return view('report.nota',[
            'transaksi' => $data->first(),
            'arr' => $data
        ]);
    }

    public function reportTransaksi()
    {
        $transaksi = Transaksi::GetAll();
        $pdf = PDF::loadView('report.transaksi', compact('transaksi'));
        // return $pdf->download('penjualan.pdf');
        return $pdf->stream();
    }
}
