<?php

namespace App\Http\Controllers\Admin;

use App\Models\AccessMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PpdbController extends Controller
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
        return view('admin.ppdb.index', compact('menu'));
    }
}
