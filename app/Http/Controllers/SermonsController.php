<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sermons;
use App\KategoriSermons;
use File;
use Carbon\Carbon;

class SermonsController extends Controller
{
    public function show()
    {
        $sermons = Sermons::all();
        return view('admin.sermons.index',compact('sermons'));
    }
    public function addnew()
    {
        $kategori = KategoriSermons::all();
        return view('admin.sermons.addnew',compact('kategori'));
    }

    public function edit($id)
    {
        $sermons = Sermons::find($id);
        $kategori = KategoriSermons::orderBy('nama','asc')->get();
        return view('admin.sermons.edit',compact('sermons','kategori'));
    }

    public function kategori()
    {
        $kategori = KategoriSermons::all();
        return view('admin.sermons.kategori',compact('kategori'));
    }

    public function editkategori($id,Request $request)
    {
       $kategori = KategoriSermons::find($id);
       $kategori->nama = $request->value;
       $kategori->update();
    }

    public function kategoridestroy($id)
    {
        $kategori = KategoriSermons::find($id);
        $kategori->delete();
    }

    public function storekategori(Request $request)
    {
        request()->validate([
            'nkategori' => 'required'
        ]);
        $kategori = new KategoriSermons();
        $kategori->nama = $request->nkategori;
        $kategori->save();

        $notification = array(
            'message' => 'Sukses Menambahkan Data!',
            'alert-type' => 'success'
        );
        return redirect('/sermons/kategori')->with($notification);
    }

    public function update($id, Request $request)
    {
        $sermons = sermons::find($id);
        $sermons->judul = $request->judul;
        $sermons->deskripsi = $request->deskripsi;
        $sermons->kategori = $request->kategori;
        $sermons->from_sermons = $request->pembicara;
        $sermons->video_url = $request->videourl;
        $sermons->audio_url = $request->audiourl;
        $sermons->update();
        if($request->hasFile('image')){
            $request->file('image')->move('images/sermons/',$request->file('image')->getClientOriginalName());
            $sermons->image = $request->file('image')->getClientOriginalName();
            $sermons->save();
        }
        return redirect('/sermons/all')->with('message','Data Berhasil Diubah!');
    }

    public function store(Request $request)
    {
        request()->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'pembicara' => 'required',
            'kategori' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $request->file('image')->move('images/sermons/',$request->file('image')->getClientOriginalName());

        $sermons = new Sermons();
        $sermons->judul = $request->judul;
        $sermons->deskripsi = $request->deskripsi;
        $sermons->kategori = $request->kategori;
        $sermons->image = $request->file('image')->getClientOriginalName();
        $sermons->from_sermons = $request->pembicara;
        $sermons->video_url = $request->videourl;
        $sermons->audio_url = $request->audiourl;
        $sermons->created_at = Carbon::now();
        $sermons->save();
        
        $notification = array(
            'message' => 'Sukses Menambahkan Data!', 
            'alert-type' => 'success'
        );
        
        return redirect('/sermons/all')->with($notification);
    }

    public function destroy($id)
    {
       $sermons = Sermons::find($id);
       $sermons->delete();
       $path_image = 'images/sermons/'.$sermons->image;
       File::delete($path_image);
       return redirect()->back()->with('status','Data Berhasil Dihapus');
    }
}
