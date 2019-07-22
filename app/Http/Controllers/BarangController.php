<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanBaku;

class BarangController extends Controller
{

    public function index()
    {
        $data = BahanBaku::paginate(5);
        return view('barang.index', [
            'bahanbaku' => $data
        ]);
    }

    public function byId($idBahanBaku)
    {
        $data = BahanBaku::getById($idBahanBaku);
        return json_encode($data);
    }

    public function store(Request $request)
    {
        $nama_bahan_baku = $request['nama_bahan_baku'];
        $jumlah_bahan_baku = $request['jumlah_bahan_baku'];
        $jenis_bahan_baku = $request['jenis_bahan_baku'];
        $satuan = $request['satuan'];

        $rest = BahanBaku::Add([
            'nama_bahan_baku' => $nama_bahan_baku,
            'jumlah_bahan_baku' => $jumlah_bahan_baku,
            'jenis_bahan_baku' => $jenis_bahan_baku,
            'satuan' => $satuan
        ]);
        
        if($rest)
        {
            return redirect(route('barang-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }
        
    }

    public function update(Request $request)
    {
        $idBahanBaku = $request['id-bahan-baku'];
        $nama_bahan_baku = $request['nama_bahan_baku'];
        $jumlah_bahan_baku = $request['jumlah_bahan_baku'];
        $jenis_bahan_baku = $request['jenis_bahan_baku'];
        $satuan = $request['satuan'];

        $data = [
            'nama_bahan_baku' => $nama_bahan_baku,
            'jumlah_bahan_baku' => $jumlah_bahan_baku,
            'jenis_bahan_baku' => $jenis_bahan_baku,
            'satuan' => $satuan
        ];

        $rest = BahanBaku::Edit($data, $idBahanBaku);
        if($rest)
        {
            return redirect(route('barang-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }

    }

    public function remove(Request $request)
    {
        $idBahanBaku = $request['id-bahan-baku'];
        $rest = BahanBaku::Delete($idBahanBaku);
        if($rest)
        {
            return redirect(route('barang-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }
    }

    public function removeAjax(Request $request)
    {
        // $idBahanBaku = $request['id-bahan-baku'];
        return json_encode([
            'status' => 'success',
            'message' => 'ahuy'
        ]);
        // $rest = BahanBaku::Delete($idBahanBaku);
        // if($rest)
        // {
        //     return redirect(route('barang-index'));
        // }
        // else
        // {
        //     return redirect(route('errors/404'));
        // }
    }

    public function search()
    {
        $keyword = $_GET['keyword'];
        $data = BahanBaku::Search($keyword, 5);
        return view('barang.index', [
            'bahanbaku' => $data
        ]);
    }






    //
    // public function index()
    // {
    //     $barang = BahanBaku::all();
    //     return view('barang.index', compact('barang'));
    // }

    // public function store(Request $request) {
    //     $data = $request->except('_token');
        
    //     $bahanbaku = new BahanBaku;
    //     $bahanbaku->nama_bahan_baku = $data['nama_barang'];
    //     $bahanbaku->jumlah_bahan_baku = $data['jumlah_barang'];
    //     $bahanbaku->jenis_bahan_baku = $data['jenis_barang'];
    //     $bahanbaku->satuan = $data['satuan'];
    //     $bahanbaku->save();
    //     return redirect('barang');
    // }
}
