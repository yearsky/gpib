<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriSermons extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama'];
    protected $primaryKey = 'id_kategori';
}
