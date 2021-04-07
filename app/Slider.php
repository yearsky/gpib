<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $primaryKey = 'id_slider';
    protected $fillable = ['nama','deskripsi','link','image','status'];

    public function getImage()
    {
        return asset('images/slider/'.$this->image);
    }
}
