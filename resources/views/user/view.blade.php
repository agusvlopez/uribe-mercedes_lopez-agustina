@extends('layouts.main')

@section('title', $usuario->name)

@section('content')
<div class="container mx-auto m-4 d-flex align-items-start">
    <div class="p-3 d-flex col-md-8 align-items-center">
        <div class="me-4">
            <img src="{{ asset('imgs/iconos/perfil.png') }}" alt="Imagen de perfil" class="img-fluid" style="max-width: 100px;">
        </div>
        <div>
            <h1 class="border-bottom pb-2 mb-2">Mi Perfil</h1>
            <p class=""><span class="fw-bold">Nombre:</span> {{ $usuario->name }}</p>
            <p class=""><span class="fw-bold">Email:</span> {{ $usuario->email }}</p>
        </div>
    </div>
    <div>
        <a href="{{ route('user.form.edit', ['id' => $usuario->id]) }}" class="btn btn-secondary mb-2 d-block">Editar datos</a>
    </div>
</div>
<div class="container mx-auto m-4">
    <h2 class="border-bottom pb-2 mb-2">Historial De Mis Compras</h2>
    @if ($compras->isEmpty())
        <p>No hay compras realizadas.</p>
    @else
        <ul class="list-group list-group-flush">
            @foreach ($compras as $compra)
                <li class="list-group-item d-flex justify-content-between align-items-start bg-list">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold"><span class="badge bg-secondary">{{ $compra->recetario_title }}</span> </span> a <span class="fw-bold">${{ $compra->recetario_price }} c/u</span></div>
                    Fecha: {{ $compra->created_at }}.
                    </div>
                    <span class="badge bg-primary rounded-pill">{{ $compra->cantidad }} unidades</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
