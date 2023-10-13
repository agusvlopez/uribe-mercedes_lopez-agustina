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

        $recetario = Recetario::findOrFail($id);


        return view('admin.recetarios.view', [
            'recetario' => $recetario
        ]);
    }

    public function viewEntradaBlog(int $id) {


        return view('admin.entradas.view', [
            'entrada_blog' => Entrada_Blog::findOrFail($id),
        ]);
    }

    public function formCreateRecetario()
    {
        return view('admin.recetarios.create');
    }

    public function formCreateEntrada()
    {
        return view('admin.entradas.create');
    }

    /*
    recibo datos del formulario
    */
    public function processCreateRecetario(Request $request)
    {
        // dd($request);
        $request->validate(Recetario::$rules, Recetario::$errorMessages);

        $data = $request->except(['_token']);

        Recetario::create($data);

        return redirect('/admin/recetarios')
            ->with('status.message', 'El recetario <b>' . e($data['title']) . '</b> se publicó con éxito.');
    }


    public function processCreateEntrada(Request $request)
    {

        $request->validate(Entrada_Blog::$rules, Entrada_Blog::$errorMessages);

        $data = $request->except(['_token']);

        Entrada_Blog::create($data);

        return redirect('/admin/entradas-blog')
            ->with('status.message', 'El blog <b>' . e($data['title']) . '</b> se publicó con éxito.');
    }

    public function processDeleteEntradas(int $id)
    {
        $entradas_blog = Entrada_Blog::findOrFail($id);

        $entradas_blog->delete();

        return redirect('/admin/entradas-blog')
            ->with('status.message', 'El blog <b>' . e('$entradas_blog->title') . '</b> fue eliminada con éxito.');

    }


}
