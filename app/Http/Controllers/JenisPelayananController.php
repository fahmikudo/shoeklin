<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisPelayanan;

class JenisPelayananController extends Controller
{
    public function index()
    {        
        $data = JenisPelayanan::paginate(5);
        return view('jenispelayanan.index', [
            'jenispelayanan' => $data
        ]);
    }

    public function byId($idJenisPelayanan)
    {
        $data = JenisPelayanan::getById($idJenisPelayanan);
        return json_encode($data);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $nama_pelayanan = $data['nama_pelayanan'];
        $harga_pelayanan = $data['harga_pelayanan'];
        $rest = JenisPelayanan::Add([
            'nama_pelayanan' => $nama_pelayanan,
            'harga_pelayanan' => $harga_pelayanan
        ]);

        if($rest)
        {
            return redirect(route('jenispelayanan-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }

    }

    public function update(Request $request)
    {
        $idJenisPelayanan = $request['id-jenis-pelayanan'];
        $nama_pelayanan = $request['nama_pelayanan'];
        $harga_pelayanan = $request['harga_pelayanan'];

        $data = [
            'nama_pelayanan' => $nama_pelayanan,
            'harga_pelayanan' => $harga_pelayanan
        ];

        $rest = JenisPelayanan::Edit($data, $idJenisPelayanan);
        if($rest)
        {
            return redirect(route('jenispelayanan-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }
    }

    public function removeAjax(Request $request)
    {
        $idJenisPelayanan = $request['id-jenis-pelayanan'];
        $rest = JenisPelayanan::find($idJenisPelayanan);
        $rest = $rest->delete();
        if($rest)
        {
            return json_encode([
                'status' => 'success',
                'message' => 'Sukses Menghapus Data !'
            ]);
        }
        else
        {
            return json_encode([
                'status' => 'error',
                'message' => 'Gagal Menghapus Data !'
            ]);
        }
    }

}
