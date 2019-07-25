<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class PengembalianController extends Controller
{
    //
    public function index()
    {
        $data = Transaksi::paginate(5);
        return view('transaksi.pengembalian', [
            'transaksi' => $data
        ]);
    }
}
