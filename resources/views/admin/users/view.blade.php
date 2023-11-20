@extends('layouts.admin')

@section('title', $user->name)

@section('content')

<div class="container mx-auto m-4">

    <div class="bg-white rounded shadow-lg p-4">
        <h1>Compras de {{ $user->name }}</h1>
        <p class=""><span class="fw-bold">Email:</span> {{ $user->email }}</p>
        <dd>
            <h2>Recetarios comprados</h2>
            @forelse ($user->recetarios->groupBy('title') as $title => $recetarios)
                <span class="badge bg-secondary">
                    {{ $title }} @if($recetarios->count() > 1) x{{ $recetarios->count() }} @endif
                </span>
            @empty
                <span class="small">No tiene recetarios comprados.</span>
            @endforelse
        </dd>
    </div>
</div>
@endsection
