<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function showForm()
    {
        return view('age.form');
    }

    // Este método nunca devolverá algo porque el middleware
    // siempre redirige antes de llegar aquí.
    public function process(Request $request)
    {
        return redirect()->route('age.form');
    }
}
