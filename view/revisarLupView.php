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
                    <h3>Revizar Lup's</h3>
                </div> 
            </div>
        </div>
        <div class="bor"></div>
        <!--Menu de la plataforma TPM -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php require_once("menuAdmin.php"); ?>
                </div>
            </div>
        </div>
        <!-- .\container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="index.php?controller=lups&action=revisarLups" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1"><strong>Clave-Lup</strong></label>
                                <select class="form-control" name="idpilar">
                                    <option value=""></option>
                                    <?php
                                    if (is_array($datos)) {
                                        foreach ($datos as $valor) {
                                            echo "<option value='" . $valor[0] . "'>" . strtoupper($valor[1]) . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Busqueda por empleado-->
                            <div class="form-group col-md-8">
                                <input class="form-control mr-sm-2" type="text" placeholder="Buscar por numero de empleado..." aria-label="Search">
                            </div>
                            <div class="form-group col-md-4">
                                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1"><strong>Nombre Empleado</strong></label>
                                <input class="form-control mr-sm-2" type="text"  aria-label="Search" readonly>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1"><strong>Fecha de Revision</strong></label>
                                <input class="form-control mr-sm-2" type="date" placeholder="dd/mm/YYYY"  aria-label="Search">
                            </div>   
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
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
    </body>
</html>


