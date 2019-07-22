<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    public function scopeGet($query)
    {
        return $this->get();
    }

    public function scopeGetByid($query, $idPelanggan)
    {
        return $this
                ->where('id', $idPelanggan)
                ->get();
    }

    public function scopeAdd($query, $data)
    {
        return $this->insert($data);
    }

    public function scopeEdit($query, $data, $idPelanggan)
    {
        return $this
                ->where('id', $idPelanggan)
                ->update($data);
    }

    public function scopeDelete($query, $idPelanggan)
    {
        return $this
                ->where('id', $idPelanggan)
                ->delete();
    }

    public function scopeSearch($query, $keyword, $limit)
    {
        return $this
                ->where(
                    'nama_pelanggan','like',"%keyword%"
                )
                ->simplePaginate($limit);
    }


}
