<?php

namespace App\Http\Controllers\CalonSiswa;

use App\AccessMenu;
use App\Bank;
use App\HargaPpdb;
use App\HistoryTransaksiPpdb;
use App\Http\Controllers\Controller;
use App\TransaksiPpdb;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    protected $role = 3; // role calon siswa
    public $menu = '';

    public function __construct()
    {
        $this->menu = AccessMenu::where('role_id', $this->role)->get();
    }

    public function pembayaran()
    {
        $menu = $this->menu;
        $banks = Bank::all();
        $historis = HistoryTransaksiPpdb::where('user_id', auth()->user()->id)->get();

        return view('calon-siswa.pembayaran', compact('menu', 'banks', 'historis'));
    }

    public function konfirmasi()
    {
        $menu = $this->menu;
        $banks = Bank::all();
        $hargaPpdb = HargaPpdb::first();

        $harga = $hargaPpdb->harga;
        $transaksiUser = TransaksiPpdb::where('user_id', auth()->user()->id)->sum('jumlah_bayar');

        $sisa_yang_harus_dibayar =  $harga - $transaksiUser;

        return view('calon-siswa.pembayaran-konfirmasi', compact('menu', 'banks', 'hargaPpdb', 'sisa_yang_harus_dibayar'));
    }

    public function detailPembayaran($id)
    {
        $menu = $this->menu;
        $histori = HistoryTransaksiPpdb::whereId($id)->first();

        return view('calon-siswa.pembayaran-detail', compact('menu', 'histori'));
    }

    public function cetak($id)
    {
        $histori = HistoryTransaksiPpdb::whereId($id)->first();
        $pdf = PDF::loadview('calon-siswa.cetak-pembayaran', ['histori' => $histori]);
        return $pdf->download('laporan-pdf transaksi ' . $histori->no_transaksi);
    }

    public function cetakSemua()
    {
        $historis = HistoryTransaksiPpdb::where('user_id', auth()->user()->id)->get();
        $pdf = PDF::loadview('calon-siswa.cetak-pembayaran-all', ['historis' => $historis]);
        return $pdf->download('laporan-pdf transaksi semua');
    }

    public function storePembayaran(TransaksiPpdbRequest $request)
    {
        $TransaksiPpdb = TransaksiPpdb::orderBy('created_at', 'DESC')->first();
        $id = !$TransaksiPpdb ? 0 : $TransaksiPpdb->id;
        $no_transaksi = '#' . str_pad($id + 1, 4, "0", STR_PAD_LEFT);

        $file = $request->file('bukti_pembayaran');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'data/images/bukti-pembayaran';
        $file->move($tujuan_upload, $nama_file);

        TransaksiPpdb::create([
            'no_transaksi'          => $no_transaksi,
            'user_id'               => auth()->user()->id,
            'nama'                  => $request->nama,
            'jumlah_bayar'          => $request->jumlah_bayar,
            'yang_harus_dibayar'    => $request->yang_harus_dibayar,
            'bank_id'               => $request->bank_id,
            'bukti_pembayaran'      => $nama_file
        ]);

        $sisa_bayar = $request->yang_harus_dibayar - $request->jumlah_bayar;
        $sisa_bayar = $sisa_bayar < 0 ? 0 : $sisa_bayar;
        $status = $sisa_bayar == 0 || $sisa_bayar < 0 ? 'lunas' : 'belum lunas';

        HistoryTransaksiPpdb::create([
            'no_transaksi'  => $no_transaksi,
            'user_id'       => auth()->user()->id,
            'sisa_bayar'    => $sisa_bayar,
            'status'        => $status
        ]);

        session()->flash('success', 'Sukses melakuka pembayaran');
        return redirect()->route('pendaftaran.pembayaran');
    }
}
