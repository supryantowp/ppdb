<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $table = 'sub_menus';
    protected $fillable = ['role_id', 'menu_id', 'parent_id', 'title', 'url', 'icon'];


    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function parent()
    {
        return $this->belongsTo(SubMenu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(SubMenu::class, 'parent_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
