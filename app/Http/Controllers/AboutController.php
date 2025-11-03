<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Aqui você pode passar dados dinâmicos se quiser
        return view('site.about');
    }
}
