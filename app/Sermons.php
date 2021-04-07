<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Sermons extends Model
{
    protected $table = 'sermons';
    protected $fillable = ['judul','deskripsi','kategori','from_sermons','image','video_url','audio_url'];
    protected $primaryKey = 'id';

    public function getImage()
    {
        return asset('images/sermons/'.$this->image);
    }
    public function getTgl()
    {
        $tgl = Carbon::parse($this->created_at);
        setlocale(LC_TIME, 'IND');
        return $tgl->formatLocalized('%e').'  '.$this->waktu;
    }
    public function getBt()
    {
        $tgl = Carbon::parse($this->created_at);
        setlocale(LC_TIME, 'IND');
        return $tgl->formatLocalized('%b %Y').'  '.$this->waktu;
    }
    public function getDeskripsi()
    {
        return Str::words($this->deskripsi,30,'...');
    }
}
