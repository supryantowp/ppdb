<?php

namespace App\Http\Controllers;

use App\Models\AccessMenu;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public $role = 6; // role home
    public $menu = '';

    public function __construct()
    {
        $this->menu = AccessMenu::where('role_id', $this->role)->get();
    }

    public function index()
    {
        $menu = $this->menu;
        return view('front.index', compact('menu'));
    }

    public function materi()
    {
        $menu = $this->menu;
        return view('front.materi', compact('menu'));
    }

    public function guru()
    {
        $menu = $this->menu;
        return view('front.guru', compact('menu'));
    }

    public function blog()
    {
        return 'blog';
    }

    public function contact()
    {
        return 'contact';
    }

    public function ppdb()
    {
        $menu = $this->menu;
        $tahunAjaran = TahunAjaran::where('status', 'dibuka')->get();
        return view('front.ppdb', compact('menu', 'tahunAjaran'));
    }
}
