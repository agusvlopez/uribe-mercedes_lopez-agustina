<?php

namespace App\Http\Controllers;

use App\Models\Clasification;
use App\Models\Entrada_Blog;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class BlogController extends Controller
{
    public function index()
    {
        //Usamos el modelo para traer todos los datos de la tabla
        $entradas_blog = Entrada_Blog::all();
        $clasifications = Clasification::all();
         //pasaje de variables a las vistas
        return view('blog.index', [
            'entradas_blog' => $entradas_blog,
            'clasifications' => $clasifications,
        ]);
    }

    public function viewEntradaBlog(int $id)
    {
        return view('blog.view', [
            'entrada_blog' => Entrada_Blog::findOrFail($id),
        ]);
    }

    public function viewBlogClasification(int $id)
    {
        $entradas_blog =  Entrada_Blog::all();
        $clasification =  Clasification::findOrFail($id);

        foreach ($entradas_blog as $blog){
            $entrada_blog = $blog;
        }
        return view('blog.clasification.view', [
            'entrada_blog' =>  $entrada_blog,
            'entradas_blog' =>  $entradas_blog,
            'clasification' =>  $clasification,
        ]);
    }

}
