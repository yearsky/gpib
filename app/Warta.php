<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
    protected $table = 'warta';
    protected $fillable = ['title','image','file'];

    public function getFile()
    {
        return asset('public/warta/'.$this->file);
    }
    public function getImage()
    {
        if($this->image == 'Default')
        {
            return asset('images/Warta.png');
        }
 
    	//return asset('images/'.$this->image);
    }
}
