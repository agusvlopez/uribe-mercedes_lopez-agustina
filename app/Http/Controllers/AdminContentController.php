<?php

namespace App\Http\Controllers;

use App\Models\Entrada_Blog;
use App\Models\Recetario;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    public function index()
    {
        return view('admin.contenido.index');
    }

    public function entradasBlog()
    {
        {
        //Usamos el modelo para traer todos los datos de la tabla
            $entradas_blog = Entrada_Blog::all();

        //pasaje de variables a las vistas
            return view('admin.entradas.index', [
                    'entradas_blog' => $entradas_blog,
                ]);

        }
    }

    public function recetarios()
    {
        //Usamos el modelo para traer todos los datos de la tabla
        $recetarios = Recetario::all();

        //pasaje de variables a las vistas
        return view('admin.recetarios.index', [
                'recetarios' => $recetarios,
            ]);


    }

    public function viewRecetario(int $id) {

        $recetario = Recetario::find($id);


        return view('admin.recetarios.view', [
            'recetario' => $recetario
        ]);
    }

    public function viewEntradaBlog(int $id) {


        return view('admin.entradas.view', [
            'entrada_blog' => Entrada_Blog::find($id),
        ]);
    }
}
