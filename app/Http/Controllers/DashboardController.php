<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Website;

class DashboardController extends Controller
{
    public function index()
    {
        $website = Website::all()->first();
        return view('admin.dashboard.index',compact('website'));
    }
}
