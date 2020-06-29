<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $fillable = ['menu'];

    public function sub_menu()
    {
        return $this->hasOne(SubMenu::class);
    }
}
