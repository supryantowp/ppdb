<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengumumanPpdb extends Model
{
    protected $table = 'pengumuman_ppdb';
    protected $fillable = ['no_ppdb', 'status', 'tahun_ajar_id'];

    public function data_ppdb()
    {
        return $this->hasOne('App\DataPpdb', 'no_ppdb', 'no_ppdb');
    }
}
