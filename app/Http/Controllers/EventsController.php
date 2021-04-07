<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Event;
use File;

class EventsController extends Controller
{
    public function show()
    {
        $events = Event::all();
        return view('admin.events.index',compact('events'));
    }

    public function addnew()
    {
        return view('admin.events.addnew');
    }

    public function edit($id)
    {
        $events = Event::find($id);
        return view('admin.events.edit',compact('events'));
    }

    public function update($id,Request $request)
    {
        $events = Event::find($id);
        $events->judul = $request->judul;
        $events->deskripsi = $request->deskripsi;
        $events->lokasi = $request->lokasi;
        $events->waktu = $request->waktu;
        $events->tgl_events = Carbon::createFromFormat('m/d/Y',$request->tanggal)->format('Y-m-d');
        $events->update();
        if($request->hasFile('image')){
            $request->file('image')->move('images/events/',$request->file('image')->getClientOriginalName());
            $events->image = $request->file('image')->getClientOriginalName();
            $events->save();
        }
        return redirect('/events/all')->with('message','Data Berhasil Diubah!');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $request->file('image')->move('images/events/',$request->file('image')->getClientOriginalName());

        $events = new Event();
        $events->judul = $request->nama;
        $events->deskripsi = $request->deskripsi;
        $events->image = $request->file('image')->getClientOriginalName();
        $events->lokasi = $request->lokasi;
        $events->waktu = $request->waktu;
        $events->tgl_events = Carbon::createFromFormat('m/d/Y',$request->tanggal)->format('Y-m-d');
        $events->save();
        
        $notification = array(
            'message' => 'Sukses Menambahkan Data!', 
            'alert-type' => 'success'
        );
        
        return redirect('/events/all')->with($notification);
    }

    public function destroy($id)
    {
        $events = Event::find($id);
       $events->delete();
       $path_image = 'images/events/'.$events->image;
       File::delete($path_image);
       return redirect()->back()->with('status','Data Berhasil Dihapus');
    }
}
