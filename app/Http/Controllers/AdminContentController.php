<?php

namespace App\Http\Controllers;

use App\Models\Consejo;
use App\Models\Clasification;
use App\Models\Entrada_Blog;
use App\Models\Recetario;
use Database\Seeders\ConsejoSeeder;
use Database\Seeders\Entradas_BlogsSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            // $entradas_blog = Entrada_Blog::all();

        //Como agregamos la tabla clasifications asociada con la tabla entradas_blog no debemos usar el metodo all() como hicimos arriba, sino que queremos que cargue los datos de esa relación:
            $entradas_blog = Entrada_Blog::with(['clasification', 'consejos'])->paginate(4);

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

    public function viewRecetario(int $id)
    {
        $recetario = Recetario::findOrFail($id);

        return view('admin.recetarios.view', [
            'recetario' => $recetario
        ]);
    }

    public function viewEntradaBlog(int $id)
    {
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
        return view('admin.entradas.create', [
            'clasifications' => Clasification::all(),
            'consejos' => Consejo::orderBy('name')->get(),
        ]);
    }

    /*
    recibo datos del formulario
    */
    public function processCreateRecetario(Request $request)
    {
        // dd($request);
        $request->validate(Recetario::$rules, Recetario::$errorMessages);

        $data = $request->except(['_token']);

        if($request->hasFile('cover'))
        {
            $data['cover'] = $request->file('cover')->store('coversRecetario');
        }

        Recetario::create($data);

        return redirect()
            ->route('admin.recetarios')
            ->with('status.message', 'El recetario <b>' . e($data['title']) . '</b> se publicó con éxito.');
    }

    public function processCreateEntrada(Request $request)
    {
        try
        {
            $request->validate(Entrada_Blog::$rules, Entrada_Blog::$errorMessages);

            $data = $request->except(['_token']);

            if($request->hasFile('cover'))
            {
                $data['cover'] = $request->file('cover')->store('coversEntrada');
            }

            DB::transaction(function() use($data)
            {
                /** @var Entrada_Blog */
                $entrada_blog = Entrada_Blog::create($data);

                $entrada_blog->consejos()->attach($data['consejos'] ?? []);
            });

            return redirect()
                ->route('admin.blog')
                ->with('status.message', 'El blog <b>' . e($data['title']) . '</b> se publicó con éxito.');
        }
        catch(\Exception $e)
        {
            return redirect()
            ->back()
            ->with('status.message', 'Error al crear el blog')
            ->with('status.type', 'danger')
            ->withInput();
        }
    }


    public function formEditRecetario(int $id)
    {
        return view('admin.recetarios.edit', [
            'recetario' =>  Recetario::findOrFail($id),
    ]);
    }


    public function processEditRecetario(int $id, Request $request)
    {
        /** @var Recetario */
        $recetario = Recetario::findOrFail($id);

        $request->validate(Recetario::$rules, Recetario::$errorMessages);

        $data = $request->except(['_token']);

        if($request->hasFile('cover'))
        {
            $data['cover'] = $request->file('cover')->store('coversRecetario');
            $oldCover = $recetario->cover;
        }

        $recetario->update($data);

        if($oldCover && Storage::has($oldCover))
        {
            Storage::delete($oldCover);
        }
        return redirect()
            ->route('admin.recetarios')
            ->with('status.message', 'El recetario <b>' . e($request->input('title')) . '</b> se editó con éxito');
    }

    public function formDeleteRecetario(int $id)
    {
        return view('admin.recetarios.delete', [
            'recetario' =>  Recetario::findOrFail($id),
    ]);
    }

    public function processDeleteRecetario(int $id)
    {
        $recetario = Recetario::findOrFail($id);
        $recetario->delete();

        if($recetario->cover && Storage::has($recetario->cover))
        {
            Storage::delete($recetario->cover);
        }

        return redirect()
            ->route('admin.recetarios')
            ->with('status.message', 'El recetario <b>' . e($recetario->title) . '</b> fue eliminado con éxito.');

    }

    public function formEditEntrada(int $id)
    {
        return view('admin.entradas.edit', [
            'entrada_blog' =>  Entrada_Blog::findOrFail($id),
            'clasifications' => Clasification::all(),
            'consejos' => Consejo::orderBy('name')->get(),
    ]);
    }

    public function processEditEntrada(int $id, Request $request)
    {
        try
        {
            /** @var Entrada_Blog */
            $entrada_blog = Entrada_Blog::findOrFail($id);

            $request->validate(Entrada_Blog::$rules, Entrada_Blog::$errorMessages);

            $data = $request->except(['_token']);
            $oldCoverEntrada = null;

            if($request->hasFile('cover'))
            {
                $data['cover'] = $request->file('cover')->store('coversEntrada');
                $oldCoverEntrada = $entrada_blog->cover;
            }

            DB::transaction(function() use($entrada_blog, $data)
            {
                $entrada_blog->update($data);

                $entrada_blog->consejos()->sync($data['consejos'] ?? []);
            });

            if($oldCoverEntrada && Storage::has($oldCoverEntrada))
            {
                Storage::delete($oldCoverEntrada);
            }

            return redirect()
                ->route('admin.blog')
                ->with('status.message', 'La entrada <b>' . e($request->input('title')) . '</b> se editó con éxito');
        }
        catch(\Exception $e)
        {
            return redirect()
            ->back()
            ->with('status.message', 'Error al editar la entrada <b>' . e($request->input('title')) . '</b>.')
            ->with('status.type', 'danger');
        }
    }

    public function formDeleteEntrada(int $id)
    {
        return view('admin.entradas.delete', [
               'entrada_blog' =>  Entrada_Blog::findOrFail($id),
    ]);
    }

    public function processDeleteEntrada(int $id)
    {
        try
        {
            $entrada_blog = Entrada_Blog::findOrFail($id);

            DB::transaction(function() use ($entrada_blog)
            {
                $entrada_blog->consejos()->detach();

                $entrada_blog->delete();
            });

            if($entrada_blog->cover && Storage::has($entrada_blog->cover))
            {
                Storage::delete($entrada_blog->cover);
            }

            return redirect()
                ->route('admin.blog')
                ->with('status.message', 'La entrada <b>' . e($entrada_blog->title) . '</b> fue eliminada con éxito.');
        }catch(\Exception $e)
        {
            return redirect()
                ->back()
                ->with('status.message', 'Error al intentar eliminar la entrada <b>' . e($entrada_blog->title) . '</b>.')
                ->with('status.type', 'danger');
        }
    }
}
