<?php

namespace App\Http\Controllers\Admin\Menu;

use App\AccessMenu;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Role;
use Illuminate\Http\Request;

class AccessMenuController extends Controller
{

    protected $role = 1; // role admin
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
    public function index(Request $request)
    {
        $search = $request->search;
        $menu = $this->menu;
        $acMenu = AccessMenu::where('role_id', 'LIKE', "%$search%")->paginate(10);
        return view('admin.setting.access-menu.index', compact('menu', 'acMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = $this->menu;
        $role = Role::all();
        $itemMenu = Menu::all();
        return view('admin.setting.access-menu.create', compact('menu', 'role', 'itemMenu'));
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
            'role'  => 'required',
            'menu'  => 'required'
        ]);

        // menghilangkan duplikat
        $accessMenu = AccessMenu::where('role_id', $request->role)->get();
        foreach ($accessMenu as $item) {
            if ($item->menu_id == $request->menu) {
                session()->flash('error', 'Gagal menambah menu!');
                return redirect()->route('access-menu.index');
            }
        }

        AccessMenu::create([
            'role_id'   => $request->role,
            'menu_id'   => $request->menu
        ]);

        session()->flash('success', 'Sukses menambah Access Menu!');
        return redirect()->route('access-menu.index');
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
        $menu = $this->menu;

        $acMenu = AccessMenu::whereId($id)->first();
        $role = Role::all();
        $itemMenu = Menu::all();
        return view('admin.setting.access-menu.edit', compact('menu', 'acMenu', 'role', 'itemMenu'));
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
            'role'  => 'required',
            'menu'  => 'required'
        ]);

        // menghilangkan duplikat
        $accessMenu = AccessMenu::where('role_id', $request->role)->get();
        foreach ($accessMenu as $item) {
            if ($item->menu_id == $request->menu) {
                session()->flash('error', 'Menu sudah ada !');
                return redirect()->route('access-menu.index');
            }
        }

        $acMenu = AccessMenu::findOrFail($id);
        $acMenu->role_id = $request->role;
        $acMenu->menu_id = $request->menu;
        $acMenu->save();

        session()->flash('success', 'Sukses menghubah data!');
        return redirect(route('access-menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acMenu = AccessMenu::findOrFail($id);
        $acMenu->delete();

        session()->flash('success', 'Berhasil mengahpus data!');
        return redirect()->route('access-menu.index');
    }
}
