<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use PDF;
use Carbon;
use App\JenisPelayanan;

class ReportController extends Controller
{
    public function index()
    {
        $jenpel = JenisPelayanan::all();
        $selectJenpel = [
            "all" => "Semua" 
        ];
        foreach ($jenpel as $data) {
            $selectJenpel[$data->id] = $data->nama_pelayanan;
        }
        return view('report.index',[
            'jenpel' => $selectJenpel
        ]);
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
        $anotherWhere = $req['jenis_pelayanan'] == "all" ? "" : $req['jenis_pelayanan'];
        $transaksi = Transaksi::GetAllForLaporan($tanggal_awal, $tanggal_akhir, $sort_by, $anotherWhere);
        $pdf = PDF::loadView('report.transaksi', compact('transaksi'))->setPaper('a4', 'landscape');
        $title = 'Shoeklin_Report_' . strtotime(Carbon::now()) . '.pdf';
        
        return $pdf->download($title);
        // return $pdf->stream();
    }

    public function reportPreview(Request $req)
    {
        $tanggal_awal = $req['tanggal_awal'];
        $tanggal_akhir = $req['tanggal_akhir'];
        $sort_by = 'asc';
        $anotherWhere = $req['jenis_pelayanan'] == "all" ? "" : $req['jenis_pelayanan'];
        $transaksi = Transaksi::GetAllForLaporan($tanggal_awal, $tanggal_akhir, $sort_by, $anotherWhere);
        $pdf = PDF::loadView('report.transaksi', compact('transaksi'))->setPaper('a4', 'landscape');
        // return $pdf->download('penjualan.pdf');
        return $pdf->stream();
    }
}
