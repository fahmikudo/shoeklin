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

    public function reportTransaksi(Request $req)
    {
        $tanggal_awal = $req['tanggal_awal'];
        $tanggal_akhir = $req['tanggal_akhir'];
        $sort_by = 'asc';
        $transaksi = Transaksi::GetAllForLaporan($tanggal_awal, $tanggal_akhir, $sort_by);
        $pdf = PDF::loadView('report.transaksi', compact('transaksi'))->setPaper('a4', 'landscape');
        return $pdf->download('penjualan.pdf');
        // return $pdf->stream();
    }
}
