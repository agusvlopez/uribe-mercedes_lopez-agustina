<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    public function index()
    {
        return view('admin.contenido.index');
    }
}
