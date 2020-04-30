<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessMenu extends Model
{
    protected $fillable = ['role_id', 'menu_id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function sub_menu()
    {
        return $this->hasMany(SubMenu::class, 'menu_id', 'menu_id');
    }
}
