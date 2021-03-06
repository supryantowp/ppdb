<?php

namespace App\Http\Controllers\CalonSiswa;

use App\Models\AccessMenu;
use App\Models\DataPpdb;
use App\Http\Controllers\Controller;
use App\Models\KuotaJurusan;
use App\Models\DataPpdb as ModelsDataPpdb;
use App\Models\PengumumanPpdb;
use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{
    protected $role = 3; // role calon siswa
    public $menu = '';

    public function __construct()
    {
        $this->menu = AccessMenu::where('role_id', $this->role)->get();
    }

    public function index()
    {
        $menu = $this->menu;
        $hasDaftar = ModelsDataPpdb::where('user_id', auth()->user()->id)->count();
        return view('calon-siswa.index', compact('menu', 'hasDaftar'));
    }

    public function pengumuman()
    {
        $menu = $this->menu;
        $dataPpdb = DataPpdb::where('user_id', auth()->user()->id)->first();
        $status = $dataPpdb ? PengumumanPpdb::where('no_ppdb', $dataPpdb->no_ppdb)->first() : null;
        $kuotaJurusan = KuotaJurusan::all();
        return view('calon-siswa.pengumuman', compact('menu', 'status', 'kuotaJurusan'));
    }
}
