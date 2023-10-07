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
        <div class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand logo-nav" href="<?=url('/');?>"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" href="<?=url('/');?>">Home</a>
                </li>
                <li>
                    <a class="nav-link" href="<?=url('/admin/contenido');?>">Administración de Contenido</a>
                </li>
                <li>
                    <a class="nav-link" href="<?=url('/admin/recetarios');?>">Administración de Recetarios</a>
                </li>
                <li>
                    <a class="nav-link" href="<?=url('/admin/entradas-blog');?>">Administración de Entradas de Blog</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
            </div>
        </div>
    </div>

            <div>
                @yield('content')
            </div>
        </div>

    </div>

    <footer class="footer-admin">
            <p>Da Vinci &copy; 2023</p>
    </footer>

</body>
</html>
