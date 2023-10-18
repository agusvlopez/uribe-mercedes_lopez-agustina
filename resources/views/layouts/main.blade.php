<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') :: Parcial 1</title>

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
                        <li class="nav-item">
                            <a class="nav-link" href="<?=route('home');?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=route('about');?>">Sobre mi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=route('recetarios.index');?>">Recetarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=route('blog.index');?>">Blog</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="<?=route('admin.index');?>">Administración</a>
                        </li>

                        <li class="nav-item">
                            <form action="<?=route('auth.logout.process');?>" method="post">
                                @csrf
                               <button type="submit" class="btn">Cerrar sesión</button>
                            </form>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="<?=route('auth.login.process');?>">Iniciar Sesión</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @if(\Session::has('status.message'))
                <div class="alert alert-success m-2">{!! \Session::get('status.message') !!}</div>
            @endif

            @yield('content')
        </main>
        <footer class="footer">
            <p>Da Vinci &copy; 2023</p>
        </footer>
    </div>
</body>
</html>
