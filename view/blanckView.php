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

        <!-- Pagina en blanco -->
        <!-- #here code... -->
        <!-- .\End Pagina en blanco-->

        <div class="bor"></div>

        <?php include("footer.php") ?>
        <!-- .\ End -->

        <!-- jQuery -->
        <script type="text/javascript" src="view/js/query/jquery-min.js"></script>
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="view/js/bootstrap/bootstrap.min.js"></script>
    </body>
</html>