<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenuPengunjung extends Model
{
    protected $table = 'submenu';

    public function menupengunjung()
    {
        return $this->hasOne('App\MenuPengunjung','id','id_menu');
    }
}
