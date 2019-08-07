<!-- Nav Administrador-->
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark rounded">
    <a class="navbar-brand" href="">Administrador TPM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?controller=login&action=usuarioActivo">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Seguimiento de Lup's
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?controller=lups&action=index">Creacion de Lup</a>
                    <a class="dropdown-item" href="index.php?controller=lups&action=leerLup">Revisar Lup</a>
                    <!-- Modificación de la apegartea la lup original....
                    <a class="dropdown-item" href="index.php?controller=lups&action=tratarLup">Tratar Lup</a>
                    <a class="dropdown-item" href="index.php?controller=lups&action=revisarLup">Revisar Lup</a>
                    <a class="dropdown-item" href="index.php?controller=lups&action=aprovarLup">Aprovar Lup</a>
                    -->
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Complementos de Lups
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?controller=pilar&action=index">Registro de Pilar</a>
                    <a class="dropdown-item" href="index.php?controller=proyecto&action=index">Registro de Proyecto</a>
                    <a class="dropdown-item" href="index.php?controller=clasificacion&action=index">Registro de Clasificación</a>
                    <a class="dropdown-item" href="index.php?controller=maquina&action=index">Registro de Maquina</a>
                    <a class="dropdown-item" href="index.php?controller=seccion&action=index">Registro de Sección</a>
                    <a class="dropdown-item" href="index.php?controller=tipoLup&action=index">Tipo de Lup</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Registros del Administrador
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?controller=departamento&action=index">Departamento</a>
                    <a class="dropdown-item" href="index.php?controller=planta&action=index">Planta</a>
                    <a class="dropdown-item" href="index.php?controller=empleado&action=index">Empleado</a>
                    <a class="dropdown-item" href="index.php?controller=login&action=viewPermiso">Permisos TPM</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Graficas de lups
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?controller=grafica&action=tipo">Por Tipo</a>
                    <a class="dropdown-item" href="index.php?controller=grafica&action=pilar">Por Pilar</a>
                    <a class="dropdown-item" href="index.php?controller=grafica&action=proyecto">Por Proyecto</a>
                    <a class="dropdown-item" href="index.php?controller=grafica&action=persona">Por Persona</a>
                    <a class="dropdown-item" href="index.php?controller=grafica&action=index">Por Selección</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=login&action=salir">Salir</a>
            </li>
        </ul>
    </div>
</nav>
<!--.\ Nav Bar -->


