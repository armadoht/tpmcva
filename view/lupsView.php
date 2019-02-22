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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                    <h3>Crear un Lup</h3>
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
                    <?php
                    print_r($mensajeError);
                    ?>
                </div>
                <!-- .\ col-md-12 -->

                <div class="col-md-12">
                    <form action="index.php?controller=lups&action=createLups" enctype='multipart/form-data' method="post">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Titulo</label>
                                <input type="text" class="form-control" name="titulo" placeholder="Titulo de la lup" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Pilar</label>
                                <select class="form-control" name="idpilar" required>
                                    <option value=""></option>
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
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Tipo de Lup</label>
                                <select class="form-control" name="idTipoLup" required>
                                    <option value=""></option>
                                    <?php
                                    if (is_array($tipolup)) {
                                        foreach ($tipolup as $valor) {
                                            if ($valor[2] != 0) {
                                                echo "<option value='" . $valor[0] . "-" . $valor[1] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Clasificación</label>
                                <select class="form-control" name="idClasificacion" required>
                                    <option value=""></option>
                                    <?php
                                    if (is_array($clasificacion)) {
                                        foreach ($clasificacion as $valor) {
                                            if ($valor[2] != 0) {
                                                echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Maquina</label>
                                <select class="form-control" name="idMaquina" id="maquinaSelect" required>
                                    <option value=""></option>
                                    <?php
                                    if (is_array($maquina)) {
                                        foreach ($maquina as $valor) {
                                            if ($valor[2] != 0) {
                                                echo "<option value='" . $valor[0] . "-" . $valor[1] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Seccion</label>
                                <select class="form-control" name="idSeccion" id="idseccion" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Proyecto</label>
                                <select class="form-control" name="idProyecto" required>
                                    <option value=""></option>
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
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Departamento</label>
                                <select class="form-control" name="idDepartamento" required>
                                    <option value=""></option>
                                    <?php
                                    if (is_array($departamento)) {
                                        foreach ($departamento as $valor) {
                                            if ($valor[2] != 0) {
                                                echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Planta</label>
                                <select class="form-control" name="idPlanta" required>
                                    <option value=""></option>
                                    <?php
                                    if (is_array($planta)) {
                                        foreach ($planta as $valor) {
                                            if ($valor[9] != 0) {
                                                echo "<option value='" . $valor[0] . "-" . $valor[2] . "'>" . strtoupper($valor[1]) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--Quien Elaboro.... -->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Elaboró</label>
                                <input class="form-control mr-sm-2 numEmpleado" type="text" name="elaboro"  placeholder="Numero de Empleado" aria-label="Search" required>
                            </div>
                            
                            <!--Fecha de Elaboración-->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Fecha de Elaboración</label>
                                <input type="date" class="form-control" name="fecha_elaboracion"  required>
                            </div>
                            
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control" id="textElaboro" readonly> 
                            </div>
                            
                            <div class="form-group col-md-2">
                                <button type="button" id="nombreElaboro" class="btn btn-primary">Buscar</button>
                            </div>
                            
                            <!--Quien Revisión.... -->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Revisó</label>
                                <input class="form-control mr-sm-2 numEmpleado" type="text" name="revision"  placeholder="Número de Empleado" aria-label="Search" required>
                            </div>

                            <!--Fecha de Revisión-->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Fecha de Revisión</label>
                                <input type="date" class="form-control"  name="fecha_revision"  required>
                            </div>
                            
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control" id="textReviso" readonly> 
                            </div>
                            
                            <div class="form-group col-md-2">
                                <button type="button" id="nombreReviso" class="btn btn-primary">Buscar</button>
                            </div>
                            
                            <!--Quien Aprobó.... -->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Aprobó</label>
                                <input class="form-control mr-sm-2 numEmpleado" type="text" name="aprobo" placeholder="Numero de Empleado" aria-label="Search" required>
                            </div>

                            <!--Fecha de Aprobación-->
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Fecha de Aprobación</label>
                                <input type="date" class="form-control"  name="fecha_aprobacion"  required>
                            </div>
                            
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control" id="textAprobo" readonly> 
                            </div>
                            
                            <div class="form-group col-md-2">
                                <button type="button" id="nombreAprobo" class="btn btn-primary">Buscar</button>
                            </div>
                            <!-- Cargar Archivo PDF....-->
                            <div class="form-group col-md-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="file" accept=".pdf" required>
                                    <label class="custom-file-label">Selecciona un archivo PDF...</label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">  
                                <div id="ruta_archivo">
                                    
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                <!-- .\col-md-12 -->
                <div class="bor"></div>
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
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="view/js/bootstrap/bootstrap.min.js"></script>
        
       
        <script type="text/javascript">
            $("#maquinaSelect").change(function () {
                var str = $("#maquinaSelect").val().split("-");
                var idmaquina = str[0];
                $("#idseccion").empty();
                $.ajax({
                    data: {idMaquina: idmaquina},
                    type: "POST",
                    url: 'controller/json_session_maquina.php',
                    success: function (data) {
                        console.log(data);
                        if (data != 0) {
                            let array = JSON.parse(data);
                            for (let i = 0; i < array.length; i++) {
                                $("#idseccion").append('<option value=' + array[i].idMaquinaSeccion + '>' + array[i].nombre + '</option>');
                            }
                        }
                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            });
        </script>
        <!-- Query de los trabajadores-->
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">
            $(function () {
                let availableTags;
                let acti = "acti";
                let arreglo = new Array();

                $.ajax({
                    data: {idActividad: acti},
                    type: "POST",
                    url: 'controller/json_numeroEmpleado.php',
                    success: function (data) {
                        if (data != 0) {
                            let availableTags = JSON.parse(data);
                            for (let i = 0; i < availableTags.length; i++) {
                                arreglo.push(availableTags[i].numeroEmpleado);
                            }
                        }
                    },
                    error: function (data) {
                        alert(data);
                    }
                });

                console.log(arreglo);
                $(".numEmpleado").autocomplete({
                    source: arreglo
                });

            });
        </script>
        
        <!--Quien elaboro la lup -->
        <script type="text/javascript">
            $("#nombreElaboro").click(function () {
                let numero = $("input[name=elaboro]").val();
                let idActividad = "buscarNum";
                $.ajax({
                    data: {idActividad: idActividad, numero:numero},
                    type: "POST",
                    url: 'controller/json_numeroEmpleado.php',
                    success: function (data) {
                        if (data != 0) {
                            let availableTags = JSON.parse(data);
                            let nombre = availableTags[0].nombreCompleto;
                            $("#textElaboro").val(nombre);
                        }else{
                            $("#textElaboro").val("No se encontro el numero de trabajador");
                        }
                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            });
        </script>
        
        <!--Quien Reviso -->
        <script type="text/javascript">
            $("#nombreReviso").click(function () {
                let numero = $("input[name=revision]").val();
                let idActividad = "buscarNum";
                $.ajax({
                    data: {idActividad: idActividad, numero:numero},
                    type: "POST",
                    url: 'controller/json_numeroEmpleado.php',
                    success: function (data) {
                        if (data != 0) {
                            let availableTags = JSON.parse(data);
                            let nombre = availableTags[0].nombreCompleto;
                            $("#textReviso").val(nombre);
                        }else{
                            $("#textReviso").val("No se encontro el numero de trabajador");
                        }
                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            });
        </script>

        <!--Quien Aprobo -->
        
        <script type="text/javascript">
            $("#nombreAprobo").click(function () {
                let numero = $("input[name=aprobo]").val();
                let idActividad = "buscarNum";
                $.ajax({
                    data: {idActividad: idActividad, numero:numero},
                    type: "POST",
                    url: 'controller/json_numeroEmpleado.php',
                    success: function (data) {
                        if (data != 0) {
                            let availableTags = JSON.parse(data);
                            let nombre = availableTags[0].nombreCompleto;
                            $("#textAprobo").val(nombre);
                        }else{
                            $("#textAprobo").val("No se encontro el numero de trabajador");
                        }
                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            });
        </script>
        
        <script type="text/javascript">
           $("#validatedCustomFile").change(function (){
               $("#ruta_archivo").html("<h2>La ruta del archivo es:"+ $("#validatedCustomFile").val() +"</h2>");
           });
        </script>
        
    </body>
</html>
