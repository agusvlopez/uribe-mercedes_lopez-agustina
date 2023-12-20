@extends('layouts.admin')

@section('title', $user->name)

@section('content')

<div class="container mx-auto m-4">

    <div class="bg-white rounded shadow-lg p-4">
        <h1>Compras de {{ $user->name }}</h1>
        <p class=""><span class="fw-bold">Email:</span> {{ $user->email }}</p>
        <dd>
            <h2>Recetarios comprados</h2>
            <ul>
                @forelse ($user->compras as $compra)
                <li>{{ $compra->recetario->title }} (Cantidad: {{ $compra->cantidad }})</li>
                @empty
                    <span class="small">No tiene compras.</span>
                @endforelse
            </ul>
        </dd>
    </div>
</div>
@endsection
