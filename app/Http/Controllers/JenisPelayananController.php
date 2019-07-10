<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisPelayananController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('jenispelayanan.index');
    }
}
