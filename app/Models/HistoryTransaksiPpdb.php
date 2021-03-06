<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryTransaksiPpdb extends Model
{
    protected $fillable = ['user_id', 'no_transaksi', 'sisa_bayar', 'status', 'bulan', 'tahun', 'keterangan'];

    public function transaksi_ppdb()
    {
        return $this->belongsTo(TransaksiPpdb::class, 'no_transaksi', 'no_transaksi');
    }

    public function fmtSisaBayar()
    {
        return 'Rp. ' . number_format($this->sisa_bayar);
    }

    public function total()
    {
        return 'Rp. ' . $this->transaksi_ppdb->jumlah_bayar;
    }
}
