<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MenuPengunjung extends Model
{
    protected $table = 'menupengunjung';
    
    public function submenupengunjung()
    {
        return $this->hasMany('App\SubMenuPengunjung','id_menu','id');
    }
}
