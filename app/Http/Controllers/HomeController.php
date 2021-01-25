<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = "Home";
        $data['nama'] = "Deva";
        return view('index', $data);
    }

    public function student()
    {
        return view('student');
    }

    public function about()
    {
        $data['title'] = "Home";
        $data['nama'] = "Deva";
        return view('about', $data);
    }
}
