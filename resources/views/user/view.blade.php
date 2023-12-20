@extends('layouts.main')

@section('title', $usuario->name)

@section('content')

<div class="container mx-auto m-4 d-flex">
        <div class="p-3 col-md-8">
            <h1 class="border-bottom pb-2 mb-2">Mi perfil</h1>
            <p class=""><span class="fw-bold">Nombre:</span> {{ $usuario->name }}</p>
            <p class=""><span class="fw-bold">Email:</span> {{ $usuario->email }}</p>
        </div>
        <div>
            <a href="{{route('user.form.edit', ['id' => $usuario->id] )}}" class="btn btn-secondary mb-2 d-block">Editar datos</a>
        </div>
</div>
<div class="container mx-auto m-4">
    <h2 class="border-bottom pb-2 mb-2">Mi Historial de Compras</h2>
    @if ($compras->isEmpty())
        <p>No hay compras realizadas.</p>
    @else
        <ul>
            @foreach ($compras as $compra)
                <li>
                    <span class="fw-bold">{{ $compra->cantidad }}</span> unidades de <span class="fw-bold">{{ $compra->recetario_title }}</span> por <span class="fw-bold">${{ $compra->recetario_price }}</span> el {{ $compra->created_at }}.
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
