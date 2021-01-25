<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        return view('template/beranda');
    }

    public function about()
    {
        return view('template/about');
    }
}
