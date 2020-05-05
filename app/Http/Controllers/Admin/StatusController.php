<?php

namespace App\Http\Controllers\Admin;

use App\AccessMenu;
use App\Charts\Dashboard;
use App\Http\Controllers\Controller;
use App\PengumumanPpdb;
use Illuminate\Http\Request;

class StatusController extends Controller
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
        $status = PengumumanPpdb::paginate(10);

        $diterima = PengumumanPpdb::where('status', 'diterima')->count();
        $tidak_diterima = PengumumanPpdb::where('status', 'tidak diterima')->count();
        $belum = PengumumanPpdb::where('status', 'belum di verifikasi')->count();
        $ppdb = [$diterima, $tidak_diterima, $belum];

        $chart = new Dashboard;
        $chart->labels(['diterima', 'tidak diterima', 'belum di verifikasi']);
        $chart->dataset('Diterima', 'doughnut', $ppdb)->color('white')
            ->backgroundcolor(["#40bad5", "#fcbf1e", "#120136"]);

        return view('admin.ppdb.status', compact('menu', 'status', 'chart'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
