<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use File;

class SliderController extends Controller
{
    public function show()
    {
        $slider = Slider::all();
        return view('admin.slider.index',compact('slider'));
    }
    public function addnew()
    {
        return view('admin.slider.addnew');
    }

    public function changestatus(Request $request)
    {
        $slider = Slider::find($request->id_slider);
        $slider->status = $request->status;
        $slider->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy($id)
    {
       $slider = Slider::find($id);
       $slider->delete();
       $path_image = 'images/slider/'.$slider->image;
       File::delete($path_image);
       return redirect()->back()->with('status','Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update($id,Request $request)
    {
        $slider = Slider::find($id);
        $slider->update($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('images/slider/',$request->file('image')->getClientOriginalName());
            $slider->image = $request->file('image')->getClientOriginalName();
            $slider->save();
        }
        return redirect('/slider/all')->with('message','Data Berhasil Diubah!');
    }


    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $request->file('image')->move('images/slider/',$request->file('image')->getClientOriginalName());

        $slider = new Slider();
        $slider->nama = $request->nama;
        $slider->deskripsi = $request->deskripsi;
        $slider->link = $request->link;
        $slider->image = $request->file('image')->getClientOriginalName();
        $slider->status = $request->status;
        $slider->save();
        
        $notification = array(
            'message' => 'Sukses Menambahkan Data!', 
            'alert-type' => 'success'
        );
        
        return redirect('/slider/all')->with($notification);
    }
}
