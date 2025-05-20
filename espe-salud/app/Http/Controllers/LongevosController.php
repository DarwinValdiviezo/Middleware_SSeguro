<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LongevosController extends Controller
{
    public function index()
    {
        return view('longevos.index');
    }
}
