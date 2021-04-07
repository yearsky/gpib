<?php
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Berita;
use App\Sermons;

function tgl()
{
    $ds = \DB::table('berita')->where('created_at',date('Y-m-d'))->get();
    $dt = Carbon::createFromFormat('Y-m-d',$ds);
	setlocale(LC_TIME, 'IND');
		
	return $dt->formatLocalized('%A, %e %B %Y');
}
function limit($value, $limit = 50, $end = '...')
{
    if (mb_strwidth($value, 'UTF-8') <= $limit) {
        return $value;
    }

    return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
}
function randSermons()
{
    Sermons::inRandomOrder()->first();
}