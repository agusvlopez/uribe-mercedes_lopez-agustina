<?php

namespace App\Http\Controllers;

use App\Models\Recetario;
use Illuminate\Http\Request;

class RecetarioController extends Controller
{
    public function index()
    {
        //Usamos el modelo para traer todos los datos de la tabla
        $recetarios = Recetario::all();

        //pasaje de variables a las vistas
        return view('recetario.index', [
        'recetarios' => $recetarios,
    ]);

    }
}
