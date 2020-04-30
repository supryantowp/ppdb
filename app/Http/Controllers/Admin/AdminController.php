<?php

namespace App\Http\Controllers\Admin;

use App\AccessMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $role = 1;

    public function index()
    {
        $menu = AccessMenu::where('role_id', $this->role)->orderBy('id', 'DESC')->get();
        return view('admin.index', compact('menu'));
    }
}
