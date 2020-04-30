<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengumumanPpdb extends Model
{
    protected $table = 'pengumuman_ppdb';
    protected $fillable = ['no_ppdb', 'status'];

    public function data_ppdb()
    {
        return $this->hasOne('App\DataPpdb', 'no_ppdb', 'no_ppdb');
    }
}
