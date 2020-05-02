<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuotaJurusan extends Model
{
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }

    public function kuota_jurusan()
    {
        return $datPpdb = DataPpdb::where('jurusan_pertama', $this->id)->count('jurusan_pertama');
    }
}
