@extends('layouts.admin')

@section('title', $user->name)

@section('content')

<div class="container mx-auto m-4">

    <div class="bg-white rounded shadow-lg p-4">
        <h1 class="p-2">Compras de {{ $user->name }}</h1>
        <p class="p-2"><span class="fw-bold">Email:</span> {{ $user->email }}</p>
        <dd>
            <h2 class="p-2">Recetarios comprados</h2>
            <ul class="list-group list-group-flush">
                @forelse ($user->compras as $compra)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold"><span class="badge bg-secondary">{{ $compra->recetario_title }}</span> </span> a <span class="fw-bold">${{ $compra->recetario_price }} c/u</span></div>
                    Fecha: {{ $compra->created_at }}.
                    </div>
                    <span class="badge bg-primary rounded-pill">{{ $compra->cantidad }} unidades</span>
                </li>
                @empty
                    <span class="small">No tiene compras.</span>
                @endforelse
            </ul>
        </dd>
    </div>
</div>
@endsection
