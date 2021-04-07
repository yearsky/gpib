<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = ['judul','deskripsi','author','image'];

    public function getImage()
    {
        return asset('images/berita/'.$this->image);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function testDate()
    {
        $tgl = Carbon::parse($this->created_at);
        setlocale(LC_TIME, 'IND');
        return $tgl->formatLocalized('%A, %e %B %Y');
    }
    public function date()
    {
        $tgl = Carbon::parse($this->created_at);
        setlocale(LC_TIME, 'IND');
        return $tgl->formatLocalized('%A, %e %B %Y');
    }
}
