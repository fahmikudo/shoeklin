<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPelayanan extends Model
{
    protected $table = 'jenispelayanan';

    public function scopeGet($query)
    {
        return $this->get();
    }

    public function scopeGetByid($query, $idJenisPelayanan)
    {
        return $this
                ->where('id', $idJenisPelayanan)
                ->get();
    }

    public function scopeAdd($query, $data)
    {
        return $this->insert($data);
    }

    public function scopeEdit($query, $data, $idJenisPelayanan)
    {
        return $this
                ->where('id', $idJenisPelayanan)
                ->update($data);
    }

    public function scopeDelete($query, $idJenisPelayanan)
    {
        return $this
                ->where('id', $idJenisPelayanan)
                ->delete();
    }

    public function scopeSearch($query, $keyword, $limit)
    {
        return $this
                ->where(
                    'nama_pelayanan', 'like', "%$keyword%"
                )
                ->simplePaginate($limit);
    }

}
