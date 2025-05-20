<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MayoresController extends Controller
{
    public function index()
    {
        return view('mayores.index');
    }
}
