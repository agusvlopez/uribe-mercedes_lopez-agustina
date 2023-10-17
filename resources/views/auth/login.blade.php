<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@extends('layouts.main')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="container">
        <h1>Ingresar a tu Cuenta</h1>

        @if ($errors->any())

        <p class="mb-3 text-danger"> Hay campos con errores de validación. Por favor, verificar y corregir los valores indicados.</p>

        @endif

        <form action="{{ route('auth.login.process') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                @error('email')
                aria-describedby="error-email"
                aria-invalid="true"
                @enderror
                >
                @error('email')
                <p class="text-danger" id="error-email">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                @error('password')
                aria-describedby="password"
                aria-invalid="true"
                @enderror
                >
                @error('password')
                <p class="text-danger" id="error-password">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>
@endsection
