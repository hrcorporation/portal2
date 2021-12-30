<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Adaptabilidad y compatibilidad en los navegadores -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Titulo En la Pagina -->
    <title>CONCRE TOLIMA</title>
    <!-- Icono de la pagina web -->
    <link href="../../../assets/images/logos/LogoConcretol.png" rel="icon" type="image">
    <!-- Tema Adminlte -->
    <link rel="stylesheet" href="../../../vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css" />
    <link href="../custom/remi.css" rel="stylesheet" />
    <!--Iconos -->
    <link rel="stylesheet" href="../../../vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Alertas -->
    <link href="../../../node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
    <link href="../../../node_modules/toastr/build/toastr.min.css" rel="stylesheet" />
    <!-- Fuentes de Letra -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!--Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <!-- Adicionales para Formulario -->
    <link rel="stylesheet" href="../../../vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="../../../vendor/almasaeed2010/adminlte/plugins/datatables/datatables.min.css" />
</head>

<body class="hold-transition sidebar-mini">
    <!-- Sitio wrapper -->
    <div class="wrapper">
        <!-- Navbar  y el tema del mismo-->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Menu horizonlal en el Nav -->
            <!-- Alineacion en left del nav -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="menu/dashboard.php" class="nav-link">Inico</a>
                </li>
            </ul>

            <!-- Alineacion rigth del nav -->
            <ul class="navbar-nav ml-auto">
                <!-- Menu de Notificaciones -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">0 Notficaciones</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 0 Notificaciones
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <a href="#" class="dropdown-item dropdown-footer">Ver Todas las Notificaciones</a>
                    </div>
                </li>
                <!-- imagen y Nombre de Usuario nav right -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="../../../assets/images/usuarios/images.png" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"><?php echo $nombre_usuario; ?></span>
                    </a>
                    <!-- Menu Inferior del Boton Usuario -->
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="../../../assets/images/usuarios/images.png" class="img-circle elevation-2" alt="User Image">
                            <p>
                                <?php echo $nombre_usuario; ?>
                            </p>
                        </li>
                        <!-- Enlace para Cambiar de contraseña -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="#">Cambiar Contraseña</a>
                                </div>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!-- Boton para redirigir al perfil del usuario -->
                            <!--<a href="#" class="btn btn-default btn-flat">Perfil</a> -->
                            <!-- Boton Cerrar Sesion -->
                            <a href="../../../cerrar.php" class="btn btn-default btn-flat float-right">Cerrar Sesion</a> 
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- Fin navbar -->