<?php

namespace App\Http\Controllers;

use App\Models\Entrada_Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //Usamos el modelo para traer todos los datos de la tabla
        $entradas_blog = Entrada_Blog::all();

         //pasaje de variables a las vistas
    return view('blog.index', [
        'entradas_blog' => $entradas_blog,
    ]);
    }
}
