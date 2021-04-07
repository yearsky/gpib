<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warta;
use File;
use Illuminate\Support\Facades\Validator;

class WartaController extends Controller
{
    public function show()
    {
        $warta = Warta::all();
        return view('admin.warta.index',compact('warta'));
    }
    public function store(Request $request)
    {
        // request()->validate([
        //     'title' => 'required',
        //     'ffile' => 'required|mimes:pdf,docx,doc'
        // ]);

        $rules = Validator::make($request->all(), [
            'title' => 'required',
            'ffile' => 'required|mimes:pdf,docx,doc',
        ]);

        if ($rules->fails())
        {
            $notification = array(
                'message' => 'File tidak sesuai', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $request->file('ffile')->move('warta/',$request->file('ffile')->getClientOriginalName());

        $warta = new Warta();
        $warta->title = $request->title;
        $warta->image = 'Default';
        $warta->file = $request->file('ffile')->getClientOriginalName();
        $warta->save();
        
        $notification = array(
            'message' => 'Sukses Menambahkan Data!', 
            'alert-type' => 'success'
        );
        
        return redirect('/warta/all')->with($notification);
    }
    public function destroy($id)
    {
        $warta = Warta::find($id);
        $warta->delete();
       
    }
}
