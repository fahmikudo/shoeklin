<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahanbaku';
    
    public function scopeGet($query)
    {
        return $this->get();
    }

    public function scopeGetByid($query, $idBahanBaku)
    {
        return $this
                ->where('id', $idBahanBaku)
                ->get();
    }

    public function scopeAdd($query, $data)
    {
        return $this->insert($data);
    }

    public function scopeEdit($query, $data, $idBahanBaku)
    {
        return $this
                ->where('id', $idBahanBaku)
                ->update($data);
    }

    public function scopeDelete($query, $idBahanBaku)
    {
        return $this
                ->where('id', $idBahanBaku)
                ->delete();
    }

    public function scopeSearch($query, $keyword, $limit)
    {
        return $this
                ->where(
                    'nama_bahan_baku','like',"%$keyword%"
                )
                ->simplePaginate($limit);
    }
}
