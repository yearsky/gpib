<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use File;

class BeritaController extends Controller
{
    public function show()
    {
        $berita = Berita::all();
        return view('admin.berita.index',compact('berita'));
    }

    public function addnew()
    {
        return view('admin.berita.addnew');
    }

   

    public function store(Request $request)
    {
        request()->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $request->file('image')->move('images/berita/',$request->file('image')->getClientOriginalName());

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->image = $request->file('image')->getClientOriginalName();
        $berita->author = $request->author;
        $berita->save();
        
        $notification = array(
            'message' => 'Sukses Menambahkan Data!', 
            'alert-type' => 'success'
        );
        
        return redirect('/berita/all')->with($notification);
    }

    public function update($id,Request $request)
    {
        $berita = Berita::find($id);
        $berita->update($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('images/berita/',$request->file('image')->getClientOriginalName());
            $berita->image = $request->file('image')->getClientOriginalName();
            $berita->save();
        }
        return redirect('/berita/all')->with('message','Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        $path_image = 'images/berita/'.$berita->image;
         File::delete($path_image);
        return redirect()->back()->with('status','Data Berhasil Dihapus');
    }
}
