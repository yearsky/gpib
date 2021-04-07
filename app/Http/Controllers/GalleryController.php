<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Gallery;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function show()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index',compact('gallery'));
    }
    public function addnew()
    {
        return view('admin.gallery.addnew');
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit',compact('gallery'));
    }

    public function update($id,Request $request)
    {
        $gallery = Gallery::findorfail($id);
        $gallery->update($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('images/gallery/',$request->file('image')->getClientOriginalName());
            $gallery->image = $request->file('image')->getClientOriginalName();
            $gallery->save();
        }
        return redirect('/gallery/all')->with('message','Data Berhasil Diubah!');
    }

    public function store(Request $request)
    {

        $rules = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($rules->fails())
        {
            $notification = array(
                'message' => 'File tidak sesuai', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        $request->file('image')->move('images/gallery/',$request->file('image')->getClientOriginalName());

        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->image = $request->file('image')->getClientOriginalName();
        $gallery->save();
        
        $notification = array(
            'message' => 'Sukses Menambahkan Data!', 
            'alert-type' => 'success'
        );
        
        return redirect('/gallery/all')->with($notification);
    }

    public function destroy($id)
    {
       $gallery = Gallery::find($id);
       $gallery->delete();
       $path_image = 'images/gallery/'.$gallery->image;
       File::delete($path_image);
       return redirect()->back()->with('status','Data Berhasil Dihapus');
    }
}
