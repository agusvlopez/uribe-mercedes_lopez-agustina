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
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand logo-nav" href="<?=url('/');?>"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=url('/');?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=url('/sobre-mi');?>">Sobre mi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=url('/recetarios');?>">Recetarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=url('/blog');?>">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=url('/admin/contenido');?>">Administración de Contenido</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=url('/iniciar-sesion');?>">Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>

            @yield('content')
        </main>
        <footer class="footer">
            <p>Da Vinci &copy; 2023</p>
        </footer>
    </div>
</body>
</html>
