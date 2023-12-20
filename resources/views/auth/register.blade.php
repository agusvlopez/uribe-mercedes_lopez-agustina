<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@extends('layouts.main')

@section('title', 'Registrar Usuario')

@section('content')
    <div class="container">
        <div class="row my-5 justify-content-center bg-light">
            <div class="col col-md-5">
                <h1 class="text-center mt-2 mb-3 fw-bold">Crear una Cuenta</h1>

                @if ($errors->any())
                    <p class="mb-3 text-danger">Hay campos con errores de validación. Por favor, verificar y corregir los valores indicados.</p>
                @endif

                <form class="row g-3" action="{{ route('auth.register.process') }}" method="post">
                    @csrf
                    <div class="col-12 mb-2 w-100">
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

                    <div class="col-12 mb-3 w-50">
                        <label for="password" class="form-label">Contraseña</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            @error('password')
                            aria-describedby="password"
                            aria-invalid="true"
                            @enderror
                        >
                        @error('password')
                        <p class="text-danger" id="error-password">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-12 mb-3 w-50">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            @error('password_confirmation')
                            aria-describedby="error-password_confirmation"
                            aria-invalid="true"
                            @enderror
                        >
                        @error('password_confirmation')
                        <p class="text-danger" id="error-password_confirmation">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn p-2 shadow d-block w-50 mx-auto m-2 bg-verde text-light text-uppercase">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
@endsection
