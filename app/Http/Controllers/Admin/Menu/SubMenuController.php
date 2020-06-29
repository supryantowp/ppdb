<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Models\AccessMenu;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Role;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
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
        $iMenu = SubMenu::where('title', 'LIKE', "%$search%")->paginate(10);

        return view('admin.setting.sub-menu.index', compact('menu', 'iMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = $this->menu;
        $menuItem = Menu::all();
        $parentItem = SubMenu::all();
        $roles = Role::all();
        return view('admin.setting.sub-menu.create', compact('menu', 'menuItem', 'parentItem', 'roles'));
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
            'role_id'   => 'required',
            'menu'      => 'required',
            'parent'    => 'required',
            'title'     => 'required',
            'url'       => 'required',
            'icon'      => 'required'
        ]);

        SubMenu::create([
            'role_id'   => $request->role_id,
            'menu_id'   => $request->menu,
            'parent_id' => $request->parent,
            'title'     => $request->title,
            'url'       => $request->url,
            'icon'      => $request->icon
        ]);

        session()->flash('success', 'Sukses menambah sub menu ');
        return redirect()->route('sub-menu.index');
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
        $menuItem = Menu::all();
        $submenu = SubMenu::whereId($id)->first();
        $parentItem = SubMenu::all();
        $roles = Role::all();
        return view('admin.setting.sub-menu.edit', compact('menu', 'menuItem', 'submenu', 'parentItem', 'roles'));
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
            'role_id'   => 'required',
            'menu'      => 'required',
            'title'     => 'required',
            'url'       => 'required',
            'icon'      => 'required'
        ]);

        $submenu = SubMenu::findOrFail($id);
        $submenu->role_id = $request->role_id;
        $submenu->menu_id = $request->menu;
        $submenu->parent_id = $request->parent;
        $submenu->title = $request->title;
        $submenu->url = $request->url;
        $submenu->icon = $request->icon;
        $submenu->save();

        session()->flash('success', 'Sukses menghubah data ' . $request->title);
        return redirect(route('sub-menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submenu = SubMenu::findOrFail($id);
        $submenu->delete();

        session()->flash('success', 'Sukses mengahpus data ' . $submenu->title);
        return redirect(route('sub-menu.index'));
    }
}
