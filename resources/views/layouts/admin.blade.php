<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>

    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= url('css/styles.css');?>">
</head>
<body>
    <div class="app">
        <nav class="navbar navbar-expand-lg bg-nav">
            <div class="container-fluid">
                <a class="navbar-brand logo-nav" href="<?=route('home');?>"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li>
                        <a class="nav-link" href="<?=route('home');?>">Home</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=route('admin.index');?>">Administración</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=route('admin.recetarios');?>">Administración de Recetarios</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=route('admin.blog');?>">Administración de Entradas de Blog</a>
                    </li>
                    <li>
                        <form action="<?=route('auth.logout.process');?>" method="post">
                            @csrf
                           <button type="submit" class="nav-link">Cerrar sesión</button>
                        </form>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>


        <main class="container py-3">
            @if(\Session::has('status.message'))
                <div class="m-2 alert alert-{{ \Session::get('status.type', 'success') }}">{!! \Session::get('status.message') !!}</div>
            @endif

            <div>
                @yield('content')
            </div>

        </main>
        <footer class="footer-admin">
                <p>Da Vinci &copy; 2023</p>
        </footer>
    </div>
</body>
</html>
