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
        <!-- Table -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Permisos para la plataforma de TPM</h3>
                </div> 
            </div>
        </div>
        
        <div class="bor"></div>
        
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
                 <div class="col-md-12">
                    <form action="index.php?controller=login&action=insert_usuario" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Numero de Empleado</label>
                                <input type="text" class="form-control" name="numeroEmpleado" placeholder="Numero de Empleado" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Usuario</label>
                                <input type="text" class="form-control" name="usuario" placeholder="Ejemplo: jflores" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Fecha de Registro</label>
                                <input type="date" class="form-control" name="fechainicio" placeholder="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Permisos</label>
                                <select class="form-control" name="permisos" required>
                                    <option value=""></option>
                                    <option value="0">Cordinador</option>
                                    <option value="1">Usuario Clave</option>
                                    <option value="2">Operador</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Planta</label>
                                <select class="form-control" name="idPlanta" required>
                                    <option value=""></option>
                                    <?php
                                    if (is_array($planta)) {
                                        foreach ($planta as $valor) {
                                            echo "<option value='" . $valor[0] . "'>" . $valor[1] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Contraseña</label>
                                <input type="password" class="form-control" name="pass" placeholder="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <!-- .\ col-md-12 -->
                
                <div class="col-md-12">
                    <?php
                    print_r($mensajeError);
                    ?>
                </div>
                <!-- .\ col-md-12 -->
                
                <div class="col-md-12">
                    <table class="table" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Empelado</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fecha de Alta</th>
                                <th scope="col">Permisos</th>
                                <th scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($datosRegistro)) {
                                foreach ($datosRegistro as $valor) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $valor[0] . "</th>";
                                    echo "<th>" . $valor[1] . "</th>";
                                    echo "<th>" . $valor[2] . "</th>";
                                    echo "<th>" . $valor[5] . "</th>";
                                    //Permisos 1 = cordinador 2 = usuarioClave 3=operador
                                    $valor_op = $valor[6];
                                    
                                    if ($valor_op == 0) {
                                        echo "<th>"
                                        . "Cordinador"
                                        . "</th>";
                                    } else if($valor_op == 1){
                                        echo "<th>"
                                        . "Usuario Clave"
                                        . "</th>";
                                    } else if($valor_op == 2){
                                        echo "<th>"
                                        . "Operador"
                                        . "</th>";
                                    }
                                    
                                    if ($valor[8] == 1  ) {
                                        echo "<th>"
                                        . "<a href='index.php?controller=login&action=update_Login&idLogin=" . $valor[0] . "&valor=0'>Activo</a>"
                                        . "</th>";
                                    } else {
                                        echo "<th>"
                                        . "<a href='index.php?controller=login&action=update_Login&idLogin=" . $valor[0] . "&valor=1'>Inactivo</a>"
                                        . "</th>";
                                    }
                                    
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- col-md-12-->
            </div>
            <!--.\ end-row-->
        </div>
        <!-- .\container -->

        <div class="bor"></div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget">
                            <h4>Responsables de la plataforma</h4>
                            <p></p>
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="#">Martin Espinoza - Gerente de Mantenimiento Corrugado</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Juan Jose Flores - Coordinador de TPM</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .\ row -->

                <div class="row">
                    <hr/>
                    <div class="col-md-12">
                        <div class="copy pull-left">
                            <p> Copyright &copy; <a href="#">www.grupak.com.mx</a> | Designed by <a href="#"></a>Ing. Armando Huerta Tolentino</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </footer>
        <!-- .\ End -->

        <!-- jQuery -->
        <script type="text/javascript" src="view/js/query/jquery-min.js"></script>
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="view/js/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
    </body>
</html>
