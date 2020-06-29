<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPpdb extends Model
{
    protected $table = 'transaksi_ppdb';
    protected $fillable = [
        'no_transaksi', 'user_id', 'nama', 'jumlah_bayar', 'bank_id', 'bukti_pembayaran', 'yang_harus_dibayar', 'bulan', 'tahun'
    ];

    public function showBuktiPembayaran()
    {
        return asset('data/images/bukti-pembayaran' . '/' . $this->bukti_pembayaran);
    }

    public function tujuan()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function fmtJumlahBayar()
    {
        return 'Rp. ' . number_format($this->jumlah_bayar);
    }

    public function fmtYangHarusDibayar()
    {
        return 'Rp. ' . number_format($this->yang_harus_dibayar);
    }
}
