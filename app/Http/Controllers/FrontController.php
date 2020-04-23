<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function materi()
    {
        return view('front.materi');
    }

    public function guru()
    {
        return view('front.guru');
    }
}
