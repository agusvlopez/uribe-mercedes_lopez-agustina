@extends('layouts.main')

@section('title', 'Iniciar Sesión')

@section('content')
        <h1>Ingresar a tu Cuenta</h1>

        <form action="{{ url('iniciar-sesion') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control"  evalue="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>

@endsection
