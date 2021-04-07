<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['judul','deskripsi','image','lokasi','waktu','tgl_events'];

    public function getImage()
    {
        return asset('images/events/'.$this->image);
    }

    public function tglEvent()
    {
        $tglv = Carbon::parse($this->tgl_events);
        setlocale(LC_TIME, 'IND');
        return $tglv->formatLocalized('%A, %e %B %Y').'  '.$this->waktu;
    }
    public function testDate()
    {
        $tgl = Carbon::parse($this->tgl_events);
        setlocale(LC_TIME, 'IND');
        return $tgl->formatLocalized('%A,%e %B %Y');
    }
    public function tglFormat()
    {
       $tgl = Carbon::createFromFormat('Y-m-d',$this->tgl_events)->format('m/d/Y');
       return $tgl;
    }
}
