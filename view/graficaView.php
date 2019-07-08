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
        <!-- Graficas -->
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
        
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
                    <h3>Crear Graficas!</h3>
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
                
                <dic class="col-md-12">
                    <form action="index.php?controller=grafica&action=crearGrafica" enctype='multipart/form-data' method="post">
                        <div class="form-row">
                            <!--SeleccionaPilar-->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Pilar</label>
                                <select class="form-control" name="idPilar" required>
                                    <option value="0"></option>
                                    <?php
                                    if (is_array($pilar)) {
                                        foreach ($pilar as $valor) {
                                            if ($valor[2] != 0) {
                                                echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- porProyecto -->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Proyecto</label>
                                <select class="form-control" name="idProyecto" required>
                                    <option value="0"></option>
                                    <?php
                                    if (is_array($proyecto)) {
                                        foreach ($proyecto as $valor) {
                                            if ($valor[2] != 0) {
                                                echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- porMaquina -->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Maquina</label>
                                <select class="form-control" name="idMaquina" id="maquinaSelect" required>
                                    <option value="0"></option>
                                    <?php
                                    if (is_array($maquina)) {
                                        foreach ($maquina as $valor) {
                                            if ($valor[3] != 0) {
                                                echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--porTipo-->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Tipo de Lup</label>
                                <select class="form-control" name="idTipoLup" id="tipo" required>
                                    <option value="0"></option>
                                    <?php
                                    if (is_array($tipolup)) {
                                        foreach ($tipolup as $valor) {
                                            if ($valor[3] != 0) {
                                                echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--porClasificación-->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Clasificación</label>
                                <select class="form-control" name="idClasificacion" id="clasificacion" required>
                                    <option value="0"></option>
                                    <?php
                                    if (is_array($clasificacion)) {
                                        foreach ($clasificacion as $valor) {
                                            if ($valor[3] != 0) {
                                                echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Planta -->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Planta</label>
                                <select class="form-control" name="idPlanta" id="planta" required>
                                    <option value="0"></option>
                                    <?php
                                    if (is_array($planta)) {
                                        foreach ($planta as $valor) {
                                            if ($valor[10] != 0) {
                                                echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <!--Fecha de Inicio-->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Fecha Inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio" required>
                            </div>
                            
                            <!--Fecha de Fin-->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Fecha Fin</label>
                                <input type="date" class="form-control" name="fecha_final" required>
                            </div>
                  
                        </div>
                         <button type="submit" class="btn btn-primary">Cargar Filtros</button>
                    </form>
                </dic>
                <!--.\col-md-2-->
                
            </div>
            <!--.\ end-row-->
        </div>
        <!-- .\container -->
        
        <!--Graficas con canvas-->
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                   <!--<canvas id="popChart" width="600" height="400"></canvas>--> 
                </div>
                <!--.\col-md-12--> 
            </div>
        </div>
        
        
        <div class="bor"></div>

        <?php include("footer.php") ?>
        <!-- .\ End -->

        <!-- jQuery -->
        <script type="text/javascript" src="view/js/query/jquery-min.js"></script>
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="view/js/bootstrap/bootstrap.min.js"></script>
        <!-- Tabla -->
        <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
        
    </body>
</html>
