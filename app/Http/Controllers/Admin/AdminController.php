<?php

namespace App\Http\Controllers\Admin;

use App\AccessMenu;
use App\Bulan;
use App\Charts\Dashboard;
use App\HistoryTransaksiPpdb;
use App\Http\Controllers\Controller;
use App\TransaksiPpdb;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $role = 1;
    public $menu = '';

    public function __construct()
    {
        $this->menu = AccessMenu::where('role_id', $this->role)->orderBy('menu_id', 'ASC')->get();
    }


    public function index()
    {
        $menu = $this->menu;

        $tahun = 2020;

        if (isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        }


        $bulans = Bulan::all();
        $bulan = [];
        $ppdb = [];
        foreach ($bulans as $item) {
            $bulan[] = $item->nama;
            $ppds = TransaksiPpdb::where('bulan', $item->nama)->where('tahun', $tahun)->sum('jumlah_bayar');
            $ppdb[] =  $ppds;
        }

        $dashboard = new Dashboard;
        $dashboard->labels($bulan);
        $dashboard->dataset('Ppdb', 'bar',  $ppdb)
            ->color('rgb(255, 99, 123)')
            ->backgroundcolor("rgb(255, 99, 132)");
        $dashboard->dataset('Spp', 'bar',  $ppdb)
            ->color('rgb(000, 255, 123)')
            ->backgroundcolor("rgb(000, 255, 123)");

        return view('admin.index', compact('menu', 'ppdb', 'dashboard'));
    }
}
