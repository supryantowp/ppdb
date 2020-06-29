<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPpdb extends Model
{
    protected $table = 'data_ppdb';
    protected $fillable = [
        'no_ppdb', 'user_id', 'tahun_ajar_id',
        'nisn', 'no_kk', 'nik_siswa', 'nama_siswa', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat_siswa', 'no_telepon_siswa', 'anak_ke', 'jumlah_saudara', 'hobi', 'cita_cita', 'foto_siswa', 'agama', 'nik_ayah', 'nama_ayah', 'pekerjaan_ayah', 'pendidikan_ayah', 'penghasilan_ayah', 'no_telepon_ayah',
        'nik_ibu', 'nama_ibu', 'pekerjaan_ibu', 'pendidikan_ibu', 'penghasilan_ibu', 'no_telepon_ibu',
        'nik_wali', 'nama_wali', 'pekerjaan_wali', 'pendidikan_wali', 'penghasilan_wali', 'no_telepon_wali',
        'npsn_sekolah', 'asal_sekolah', 'alamat_sekolah', 'no_skhun', 'tinggal_dengan', 'jurusan_pertama', 'jurusan_kedua'
    ];

    public function pengumuman_ppdb()
    {
        return $this->hasOne('App\PesngumumanPpdb', 'no_ppdb');
    }

    public function tahun_ajar()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class, 'id', 'jurusan_pertama');
    }

    public function jurusan2()
    {
        return $this->hasOne(Jurusan::class, 'id', 'jurusan_kedua');
    }

    public function fotoSiswa()
    {
        return asset('data/images/calon_siswa' . '/' . $this->foto_siswa);
    }
}
