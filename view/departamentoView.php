<?php
    session_start();
    if(!isset($_SESSION['permisos'],$_SESSION['usuario'])){
         header("Location:index.php?controller=index&action=index");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Descripcion, Palabras Claves y Autor -->
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Styles -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="view/css/bootstrap/bootstrap.min.css">
        <!-- Font awesome CSS -->
        <link rel="stylesheet" type="text/css" href="view/fontawesome-free/css/all.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="view/css/grupak/style.css">
        <!-- Grupak-Blue -->
        <link rel="stylesheet" type="text/css" href="view/css/grupak/grupak-blue.css">
        <!--Favicon Grupak-->
        <link rel="shortcut icon" href="view/img/favicon/grupak-favicon.ico">
        <title>TPM || Mantenimiento Productivo Total</title>
    </head>
    <body>
        <!-- My Header Start-->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Logo Grupak -->
                        <a href=""><img src="view/img/grupak.png" alt="Grupak Operaciones"></a>
                    </div>

                    <div class="col-md-4 offset-md-4">
                        <div class="list">
                            <!--Telefono-->
                            <div class="phone">
                                <i class="fa fa-phone"></i> 777 100 7200 ext.7242
                            </div>
                            <hr/>
                            <!--Email-->
                            <div class="email">
                                <i class="fas fa-envelope"></i> tpm.cuernavaca@grupak.com.mx
                            </div>
                            <hr/>
                            <!--Direccion-->
                            <div class="address">
                                <i class="fa fa-home"></i> Av. Atlacomulco  117 – A, Col. Chapultepec, C.P. 62450, Cuernavaca, Morelos, México.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- .\ End -->
        <!-- Texto descriptivo de la plataforma tpm-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Registrar Departamento</h3>
                </div> 
            </div>
        </div>
        <div class="bor"></div>
        <!--Menu de la plataforma TPM -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        if($_SESSION['permisos'] == 0){
                            require_once("menuAdmin.php");
                        }else if($_SESSION['permisos'] == 1){
                            require_once("menuUsuario.php");
                        }else if($_SESSION['permisos'] == 2){
                            require_once("menuOperador.php");
                        }
                    ?>
                    <!--.\ Nav Bar -->
                </div>
                <!-- .\ col-md-12 -->
                <div class="col-md-12">
                    <form action="index.php?controller=departamento&action=createDepartamento" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nombre del Departamento</label>
                                <input type="text" class="form-control" name="nombreDepartamento" placeholder="Registro del departamento">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- .\col-md-12 -->
                <div class="col-md-12">
                    <?php
                    print_r($mensajeError);
                    ?>
                </div>
                <!-- .\col-md-12 -->
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del Departamento</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($departamento)) {
                                foreach ($departamento as $valor) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $valor[0] . "</th>";
                                    echo "<th>" . $valor[1] . "</th>";
                                    if ($valor[2] == 1) {
                                        echo "<th>"
                                        . "<a href='index.php?controller=departamento&action=updateDepartamento&idDepartamento=" . $valor[0] . "&valor=0'>Activo</a>"
                                        . "</th>";
                                    } else {
                                        echo "<th>"
                                        . "<a href='index.php?controller=departamento&action=updateDepartamento&idDepartamento=" . $valor[0] . "&valor=1'>Inactivo</a>"
                                        . "</th>";
                                    }
                                    echo "<th><i class='far fa-trash-alt'></i>"
                                    . "<a href='index.php?controller=departamento&action=deletDepartamento&valor=" . $valor[0] . "'>Borrar</a></th>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <!-- .\container-->
        <div class="bor"></div>
        
        <?php include("footer.php") ?>
        <!-- .\ End -->
        <!-- jQuery -->
        <script type="text/javascript" src="view/js/query/jquery-min.js"></script>
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="view/js/bootstrap/bootstrap.min.js"></script>
    </body>
</html>

