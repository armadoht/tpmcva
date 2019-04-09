<!-- Nav Usuario Clave
Acceso solo usuarios que registran las lups!
-->
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark rounded">
    <a class="navbar-brand" href="">Operador TPM</a>
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
                    <a class="dropdown-item" href="index.php?controller=lups&action=leerLup">Revisar Lup</a>                   
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=login&action=salir">Salir</a>
            </li>
        </ul>
    </div>
</nav>
<!--.\ Nav Bar -->