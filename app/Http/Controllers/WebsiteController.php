<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WebsiteController extends Controller
{
    public function index()
    {
        $website = Website::all()->first();
         
        return view('admin.website.index' ,compact('website'));
    }
    public function update($id,Request $request)
    {
        $website = Website::find($id);
        $website->hari_kerja = $request->jam;
        $website->update($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('images/website/',$request->file('image')->getClientOriginalName());
            $website->image = $request->file('image')->getClientOriginalName();
            $website->save();
        }
        return redirect('/website')->with('message','Data Berhasil Diubah!');
    }
    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'nohp' => 'required',
            'alamat' => 'required',
            'hari_kerja' => 'required',
            'jam_kerja' => 'required'
        ]);
       
        $request->file('image')->move('images/website/',$request->file('image')->getClientOriginalName());

        $website = new Website();
        $website->nama = 'GPIB Benowo';
        $website->email = $request->email;
        $website->nohp = $request->nohp;
        $website->alamat = $request->alamat;
        $website->hari_kerja = $request->hari_kerja;
        $website->jam_kerja = $request->jam_kerja;
        $website->image = $request->file('image')->getClientOriginalName();
        $website->save();

        return redirect('/website')->with('status','Sukses !'); 
    }
}
