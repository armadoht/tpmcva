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
        <!-- Table -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
                    <h3>Registro de empleados</h3>
                </div> 
            </div>
        </div>
        <div class="bor"></div>
        <!--Menu de la plataforma TPM -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php require_once("menuAdmin.php"); ?>
                    <!--.\ Nav Bar -->
                </div>
                <!-- .\ col-md-12 -->
                <div class="col-md-12">
                    <form action="index.php?controller=empleado&action=createEmpleado" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Numero de Empleado</label>
                                <input type="text" class="form-control" name="numeroEmpleado" placeholder="Numero de Empleado">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nombre Completo</label>
                                <input type="text" class="form-control" name="nombreCompleto" placeholder="Nombre Completo">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Area</label>
                                <select class="form-control" name="idDepartamento">
                                    <option value=""></option>
                                    <?php
                                    if (is_array($departamento)) {
                                        foreach ($departamento as $valor) {
                                            echo "<option value='" . $valor[0] . "'>" . $valor[1] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Tipo de Nomina</label>
                                <select class="form-control" name="idNomina">
                                    <option value=""></option>
                                    <?php
                                    if (is_array($nomina)) {
                                        foreach ($nomina as $valor) {
                                            echo "<option value='" . $valor[0] . "'>" . $valor[2] . "</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Planta</label>
                                <select class="form-control" name="idPlanta">
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
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                
                <div class="col-md-12">
                    <?php
                    print_r($mensajeError);
                    ?>
                </div>
                
                <!-- .\col-md-12 -->
                <div class="col-md-12">
                    <table id="myTable" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Numero de Trabajador</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Tipo de nomina</th>
                                <th scope="col">Planta</th>
                                <th scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($empleado)) {
                                foreach ($empleado as $valor) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $valor[0] . "</th>";
                                    echo "<th>" . $valor[1] . "</th>";
                                    echo "<th>" . utf8_encode($valor[2]) . "</th>";
                                    echo "<th>" . utf8_encode($valor[3]) . "</th>";
                                    echo "<th>" . $valor[4] . "</th>";
                                    echo "<th>" . $valor[5] . "</th>";
                                    if ($valor[6] == 1) {
                                        echo "<th>Activo</th>";
                                    }else {
                                        echo "<th>Baja</th>";
                                    }
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- ./col-md-12-->
            </div>
        </div>
        <!-- .\container-->
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
        <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="view/js/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
    </body>
</html>

