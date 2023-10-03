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
                <a class="navbar-brand" href="#">Recetas</a>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <nav class="col-2">
                <ul>
                    <li>
                        <a class="nav-link" href="<?=url('/');?>">Home</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=url('/quienes-somos');?>">Quienes somos</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=url('/recetario/recetas');?>">Recetario</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=url('/admin/contenido');?>">Administrar Contenido</a>
                    </li>
                </ul>
            </nav>
            <div class="col-10">
                @yield('content')
            </div>
        </div>

    </div>

    <footer class="footer">
            <p>Da Vinci &copy; 2023</p>
    </footer>

</body>
</html>
