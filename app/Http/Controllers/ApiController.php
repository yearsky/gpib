<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editkategori(Request $request,$id)
    {
    	$kategori = \App\KategoriSermons::find($id);
        $kategori->nama = $request->nama;
        $kategori->update();
    }
}
