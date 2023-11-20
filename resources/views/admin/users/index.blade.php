<?php
use Illuminate\Pagination\LengthAwarePaginator;

/**@var \App\Models\Entrada_Blog[] | \Illuminate\Database\Eloquent\Collection|LengthAwarePaginator $entradas_blog*/

?>
@extends('layouts.admin')

@section('title', 'Compras de clientes')

@section('content')

        <div class="container">
            <h1 class="mb-3">Todas las compras de clientes</h1>

            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Compras</th>
                    <th>Acciones</th>
                </tr>
            <tbody>
            @foreach($users as $user)
            @if($user->role !== 'admin')
            <tr>
                <?php
                ?>
                <td>{{$user->name }}</td>
                <td>{{$user->email}} </td>
                <td>{{$user->role}} </td>
                <td>
                    @forelse ($user->recetarios->groupBy('title') as $title => $recetarios)
                        <span class="badge bg-secondary">
                            {{ $title }} @if($recetarios->count() > 1) x{{ $recetarios->count() }} @endif
                        </span>
                    @empty
                        <span class="small">No tiene recetarios comprados.</span>
                    @endforelse
                </td>
                <td>
                    <a href="{{ route('admin.users.view', ['id' => $user->id]   )}}" class="btn btn-primary mb-2 d-block">Ver</a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </thead>
    </table>

    </div>

@endsection
