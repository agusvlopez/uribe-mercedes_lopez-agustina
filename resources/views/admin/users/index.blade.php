<?php
use Illuminate\Pagination\LengthAwarePaginator;

/**@var \App\Models\Entrada_Blog[] | \Illuminate\Database\Eloquent\Collection|LengthAwarePaginator $entradas_blog*/

?>
@extends('layouts.admin')

@section('title', 'Compras de clientes')

@section('content')

<div class="container">
    <h1 class="mb-3">Todas las compras de clientes</h1>
    <p class="fw-bold">Ganancia total: ${{$totalSpending}}</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Compras</th>
                <th>Gasto total</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
            <tbody>
                @foreach($users as $user)
                    @foreach($user->compras as $compra)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $compra->recetario->title }} x{{ $compra->cantidad }}
                                </span>
                            </td>
                            <td>${{ number_format($compra->recetario->price * $compra->cantidad, 2) }}</td>
                            <td>{{ $compra->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.users.view', ['id' => $user->id]) }}" class="btn btn-primary mb-2 d-block">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </thead>
    </table>
</div>

@endsection
