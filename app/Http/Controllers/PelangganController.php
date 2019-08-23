<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::paginate(5);
        return view('pelanggan.index', [
            'pelanggan' => $data
        ]);
    }

    public function byId($idPelanggan)
    {
        $data = Pelanggan::getById($idPelanggan);
        return json_encode($data);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $nama_pelanggan = $request['nama_pelanggan'];
        $nomor_telepon = $request['no_telepon'];
        $status = $request['status_member'];
        $alamat = $request['alamat_pelanggan'];
        $jumlah_pencucian = $request['jumlah_pencucian'];

        $rest = Pelanggan::Add([
            'nama_pelanggan' => $nama_pelanggan,
            'no_telepon' => $nomor_telepon,
            'status_member' => $status,
            'alamat_pelanggan' => $alamat,
            'jumlah_pencucian' => $jumlah_pencucian
        ]);

        if($rest)
        {
            return redirect(route('pelanggan-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }
    }

    public function update(Request $request)
    {
        $idPelanggan = $request['id-pelanggan'];
        $nama_pelanggan = $request['nama_pelanggan'];
        $nomor_telepon = $request['no_telepon'];
        $status = $request['status_member'];
        $alamat = $request['alamat_pelanggan'];
        $jumlah_pencucian = $request['jumlah_pencucian'];

        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'no_telepon' => $nomor_telepon,
            'status_member' => $status,
            'alamat_pelanggan' => $alamat,
            'jumlah_pencucian' => $jumlah_pencucian
        ];

        $rest = Pelanggan::Edit($data, $idPelanggan);

        if($rest)
        {
            return redirect(route('pelanggan-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }

    }

    public function removeAjax(Request $request)
    {
        $idPelanggan = $request['id-pelanggan'];
        $rest = Pelanggan::find($idPelanggan);
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

    public function remove(Request $request)
    {
        $idPelanggan = $request['id-pelanggan'];
        $rest = Pelanggan::Delete($idPelanggan);

        if($rest)
        {
            return redirect(route('pelanggan-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }
    }

    public function search()
    {
        $keyword = $_GET['keyword'];
        $data = Pelanggan::Search($keyword, 5);
        return view('pelanggan.index', [
            'pelanggan' => $data
        ]);
    }
}
