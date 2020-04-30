<?php

namespace App\Http\Controllers\Admin\Menu;

use App\AccessMenu;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $role = 1;
    public $menu = '';

    public function __construct()
    {
        $this->menu = AccessMenu::where('role_id', $this->role)->orderBy('id', 'DESC')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $menu = $this->menu;
        $iMenu = Menu::where('menu', 'LIKE', "%$search%")->paginate(10);
        return view('admin.setting.menu.index', compact('menu', 'iMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = $this->menu;
        return view('admin.setting.menu.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required'
        ]);

        Menu::create([
            'menu' => $request->menu
        ]);

        session()->flash('success', 'Sukses menambah Menu ' . $request->menu);
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = $this->menu;

        $menuItem = Menu::whereId($id)->first();
        return view('admin.setting.menu.edit', compact('menu', 'menuItem'));
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
        $request->validate([
            'menu' => 'required'
        ]);

        $menu = Menu::findOrFail($id);
        $menu->menu = $request->menu;
        $menu->save();

        session()->flash('success', 'Sukses menghubah data ' . $request->menu);
        return redirect(route('menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acMenu = Menu::findOrFail($id);
        $acMenu->delete();

        session()->flash('success', 'Berhasil menghapus data ' . $acMenu->menu);
        return redirect()->route('menu.index');
    }
}
