<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuPengunjung;
use App\Slider;
use App\Website;
use App\Sermons;
use App\SubMenuPengunjung;
use App\Event;
use Illuminate\Support\Facades\DB;
use App\Warta;
use App\Inbox;
use App\Berita;
use App\Gallery;

class MainController extends Controller
{
    public function home()
    {
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        $website = Website::all()->first();
        $slider = Slider::all()->where('status',1);
        $sermons = Sermons::all()->take(3);
        $events = Event::all()->take(3);
        $berita = Berita::latest()->take(3)->get();
        $warta = Warta::latest()->take(3)->get();
        return view('website.home.index',compact('menupengunjung','warta','sermons','events','berita','slider','website'));
    }

    public function gallery()
    {
        $website = Website::all()->first();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        $warta = Warta::latest()->take(3)->get();
        $gallery = Gallery::all();
        return view('website.gallery.index',compact('website','gallery','warta','menupengunjung'));
    }

    public function contact()
    {
        $website = Website::all()->first();
        $warta = Warta::latest()->take(3)->get();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        return view('website.contact.contact',compact('website','warta','menupengunjung'));
    }
    public function warta()
    {
        $warta = Warta::latest()->paginate(6);
        $website = Website::all()->first();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        return view('website.warta.warta',compact('warta','website','menupengunjung'));
    }
    public function khotbah()
    {
        $sermons = Sermons::paginate(2);
        $warta = Warta::latest()->take(3)->get();
        $website = Website::all()->first();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        return view('website.sermons.sermons',compact('sermons','warta','website','menupengunjung'));
    }
    public function sermonsdetail($id)
    {
        $sermons = Sermons::find($id);
        $random = Sermons::inRandomOrder()->take(3)->get();
        $warta = Warta::latest()->take(3)->get();
        $website = Website::all()->first();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        return view('website.sermons.detail',compact('sermons','warta','random','website','menupengunjung'));
    }
    public function blog()
    {
        $berita = Berita::latest()->paginate(4);
        $warta = Warta::latest()->take(3)->get();
        $website = Website::all()->first();
        $random = Berita::inRandomOrder()->take(5)->get();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        return view('website.blog.blog',compact('berita','warta','random','website','menupengunjung'));
    }
    public function blogdetail($id)
    {
        $berita = Berita::find($id);
        $warta = Warta::latest()->take(3)->get();
        $website = Website::all()->first();
        $random = Berita::inRandomOrder()->take(3)->get();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        return view('website.blog.detail',compact('berita','warta','random','website','menupengunjung'));
    }

    public function resources()
    {
        $website = Website::all()->first();
        $warta = Warta::latest()->take(3)->get();
        $menupengunjung = MenuPengunjung::orderBy('urutan','asc')->get();
        return view('website.resources.index',compact('website','warta','menupengunjung'));
    }

    public function sendmessage(Request $request)
    {
        $inbox = new Inbox();
        $inbox->pengirim = $request->nama;
        $inbox->email = $request->email;
        $inbox->nohp = $request->nohp;
        $inbox->pesan = $request->message;
        $inbox->save();

        $notification = array(
            'message' => 'Pesan Terikirim!', 
            'alert-type' => 'success'
        );
        return redirect('/Contact-Us')->with($notification);
    }
}
