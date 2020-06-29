<?php

namespace App\Http\Controllers\Admin;

use App\Models\AccessMenu;
use App\Models\DataPpdb;
use App\Http\Controllers\Controller;
use App\Models\PengumumanPpdb;
use Illuminate\Http\Request;

class PpdbPendaftaranController extends Controller
{
    public $role = 1;
    public $menu = '';

    public function __construct()
    {
        $this->menu = AccessMenu::where('role_id', $this->role)->orderBy('menu_id', 'ASC')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = $this->menu;
        $ppdbs = PengumumanPpdb::where('status', 'belum di verifikasi')->paginate(10);
        return view('admin.ppdb.pendaftaran.index', compact('menu', 'ppdbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = $this->menu;
        $ppdb = DataPpdb::whereId($id)->first();
        return view('admin.ppdb.pendaftaran.detail', compact('menu', 'ppdb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ppdb = PengumumanPpdb::where('no_ppdb', $id)->first();
        $ppdb->status = $request->status;
        $ppdb->save();

        if ($request->status == 'diterima') {
            session()->flash('success', 'Berhasil menerima siswa');
        } else if ($request->status == 'tidak diterima') {
            session()->flash('success', 'Berhasil tidak menerim siswa');
        }
        return redirect()->route('konfirmasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
