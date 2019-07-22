<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class PegawaiController extends Controller
{
    //
    public function index()
    {
        $data = User::paginate(5);
        return view('pegawai.index', [
            'user' => $data
        ]);
    }

    public function byId($idPegawai)
    {
        $data = User::where('id', $idPegawai)->get();
        return json_encode($data);
    }

    public function store(Request $request)
    {
        $rest = User::insert([
            'name' => $request['nama-lengkap'],
            'email' => $request['email'],
            'no_telepon' => $request['no_telepon'],
            'jabatan' => $request['jabatan'],
            'alamat' => $request['alamat'],
            'password' => Hash::make($request['password'])
        ]);

        if ($rest)
        {
            return redirect(route('pegawai-index'));
        }
        else
        {
           return redirect(route('errors/404'));
        }
    }

    public function put(Request $request)
    {
        $idPegawai = $request['idPegawai'];
        $data = [
            'name' => $request['nama-lengkap'],
            'email' => $request['email'],
            'no_telepon' => $request['no_telepon'],
            'jabatan' => $request['jabatan'],
            'alamat' => $request['alamat'],
            'password' => Hash::make($request['password'])
        ];
        $rest = User::where('id', $idPegawai)->update($data);
        if ($rest)
        {
            return redirect(route('pegawai-index'));
        }
        else
        {
           return redirect(route('errors/404'));
        }
    }

    public function remove(Request $request)
    {
        $id = $request['id-pegawai-remove'];
        $rest = User::Remove($id);
        if ($rest)
        {
            return redirect(route('pegawai-index'));
        }
        else
        {
           return redirect(route('errors/404'));
        }
    }

    public function search()
    {
        $keyword = $_GET['keyword'];
        $data = User::Search($keyword, 5);
        return view('pegawai.index', [
            'user' => $data
        ]);
    }
}
