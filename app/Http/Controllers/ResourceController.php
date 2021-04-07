<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuPengunjung;
use App\Website;
use App\Warta;

class ResourceController extends Controller
{
    public function pa()
    {
        $website = Website::all()->first();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        $warta = Warta::latest()->take(3)->get();
        return view('website.resources.pendalaman-alkitab.index',compact('website','menupengunjung','warta'));
    }
    public function show()
    {
        
    }
}
