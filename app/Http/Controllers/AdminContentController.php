<?php

namespace App\Http\Controllers;

use App\Models\Consejo;
use App\Models\Clasification;
use App\Models\Compra;
use App\Models\EntradaBlog;
use App\Models\Recetario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminContentController extends Controller
{
    public function index()
    {
        return view('admin.contenido.index');
    }

    public function entradasBlog(Request $request)
    {
        {
            $searchParams = [
                'title' => $request->query('search-title'),
                'clasification' => $request->query('search-clasification'),
            ];

           //busqueda de datos en los query
            $query = EntradaBlog::with(['clasification', 'consejos']);

            if($searchParams['title'] !== null)
            {
                $query->where('title', 'LIKE', '%' . $searchParams['title'] . '%');
            }

            if($searchParams['clasification'] !== null) {
                // Agregamos la condición de búsqueda para el título.
                $query->where('clasification_id', '=', $searchParams['clasification']);
            }

            /** @var LengthAwarePaginator $query */
            $entradas_blog = $query->paginate(4)->withQueryString();

        //pasaje de variables a las vistas
            return view('admin.entradas.index', [
                    'entradas_blog' => $entradas_blog,
                    'clasifications' => Clasification::all(),
                    'searchParams' => $searchParams
                ]);
        }
    }

    public function recetarios(Request $request)
    {
        //Usamos el modelo para traer todos los datos de la tabla
        $searchParams = [
            'title' => $request->query('search-title-recetario'),
        ];

        //busqueda de datos en los query
        $query = Recetario::query();

        if($searchParams['title'] !== null)
        {
            $query->where('title', 'LIKE', '%' . $searchParams['title'] . '%');
        }

        /** @var LengthAwarePaginator $query */
        $recetarios = $query->paginate(4)->withQueryString();

        //pasaje de variables a las vistas
        return view('admin.recetarios.index', [
                'recetarios' => $recetarios,
                'searchParams' => $searchParams
            ]);
    }

    public function users()
    {
        // $users = User::with('compras.recetario')->where('role', '!=', 'admin')->get();
        $users = User::with('compras.recetario')->get();
        $totalSpending = 0;
        foreach ($users as $user) {
            foreach ($user->compras as $compra) {
                $totalSpending += $compra->recetario->price * $compra->cantidad;
            }
        }

        return view('admin.users.index', [
            'users' => $users,
            'totalSpending' => $totalSpending
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
            'entrada_blog' => EntradaBlog::findOrFail($id),
        ]);
    }

    public function viewUser(int $id)
    {
        return view('admin.users.view', [
            'user' => User::findOrFail($id),
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
        $request->validate(EntradaBlog::$rules, EntradaBlog::$errorMessages);
        try
        {
            $data = $request->except(['_token']);

            $user = Auth::user();
            if($user){
                // Asigna el autor antes de validar y almacenar los datos
                $data['author'] = $user->name ?? $user->email;
            }

            if($request->hasFile('cover'))
            {
                $data['cover'] = $request->file('cover')->store('coversEntrada');
            }

            DB::transaction(function() use($data)
            {
                /** @var EntradaBlog */
                $entrada_blog = EntradaBlog::create($data);

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
        $oldCover = null;

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
            'entrada_blog' =>  EntradaBlog::findOrFail($id),
            'clasifications' => Clasification::all(),
            'consejos' => Consejo::orderBy('name')->get(),
    ]);
    }

    public function processEditEntrada(int $id, Request $request)
    {
        /** @var EntradaBlog */
        $entrada_blog = EntradaBlog::findOrFail($id);

        $request->validate(EntradaBlog::$rules, EntradaBlog::$errorMessages);

        try
        {
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
               'entrada_blog' =>  EntradaBlog::findOrFail($id),
    ]);
    }

    public function processDeleteEntrada(int $id)
    {
        try
        {
            $entrada_blog = EntradaBlog::findOrFail($id);

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

    public function recetariosMasVendidos()
    {
        // Consulta para obtener el recetario más vendido
        $resultados = Compra::select('recetario_id', DB::raw('COUNT(*) as cantidad'))
            ->select('recetario_id', DB::raw('SUM(cantidad) as cantidad_total'))
            ->groupBy('recetario_id')
            ->orderByDesc('cantidad_total')
            ->get();

        if (!$resultados->isEmpty()) {
            $recetariosMasVendidos = [];

            foreach ($resultados as $resultado) {
                $recetario = Recetario::find($resultado->recetario_id);

                $recetariosMasVendidos[] = [
                    'recetario' => $recetario,
                    'cantidad_total' => $resultado->cantidad_total,
                ];
            }

            return view('admin.contenido.index', [
                'resultados' => $resultados,
                'recetariosMasVendidos' => $recetariosMasVendidos
            ]);
        } else {
            return view('admin.contenido.index');
        }
    }
}


