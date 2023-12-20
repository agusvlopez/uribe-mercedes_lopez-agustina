<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var User $usuario */

use App\Models\User;
?>

@extends('layouts.admin')

@section('title', 'Editar mis datos' . $usuario->name)

@section('content')
<div class="container mx-auto m-4">
    <h1>Editar mis datos: {{ $usuario->name }}</h1>

    @if ($errors->any())
        <p class="mb-3 text-danger">Hay campos con errores de validación. Por favor, verificar y corregir los valores indicados.</p>
    @endif

    <form action="{{ route('user.process.edit', ['id' => $usuario->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $usuario->name) }}"
            >
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $usuario->email) }}"
            >
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Nueva Contraseña (dejar en blanco para no cambiar)</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                value=""
            >
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn shadow bg-verde text-light">Actualizar Datos</button>
    </form>
</div>
@endsection
