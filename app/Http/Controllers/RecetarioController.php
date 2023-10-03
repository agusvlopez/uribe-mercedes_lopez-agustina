<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetarioController extends Controller
{
    public function index()
    {
        return view('recetario/index');
    }
}
