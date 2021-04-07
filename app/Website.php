<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'contact';
    protected $fillable = ['email','nohp','wa','deskripsi','alamat','hari_kerja','image'];

    public function getImage()
    {
        
        return asset('images/website/'.$this->image);
       
    }

    public function getName()
    {
        return $this->nama;
    }
   
}

