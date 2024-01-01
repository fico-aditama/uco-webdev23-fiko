<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('home.index', [
            'name'=> 'Fiko Aditama',
            'tanggal'=> date('Y-m-d')
        ]);
    }
}
