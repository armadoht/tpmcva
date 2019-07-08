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
        <!-- Graficas -->
        <link rel="stylesheet" type="text/css" href="view/css/chart/Chart.min.css">
        
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
                    <h3><?php echo $title; ?></h3>
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
            </div>
            <!--.\ end-row-->
        </div>
        <!-- .\container -->
        
        <!--Graficas con canvas-->
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                   <canvas id="popChart" width="600" height="400"></canvas> 
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
        <!-- Grafica -->
        <script type="text/javascript" src="view/js/chart/Chart.js"></script>
        <script type="text/javascript" src="view/js/chart/Chart.bundle.min.js"></script>
        
        <script type="text/javascript">
            var array_baseProyecto = <?php echo json_encode($array_baseProyecto); ?>;
            var array_proyecto = <?php echo json_encode($datos); ?>;
            var tamanio = array_baseProyecto.length;
            
            var tag = [];
            for(let i=0; i < tamanio; i++){
                tag.push(array_baseProyecto[i].nombre);
            }
            
            var valores = [];
            for(let i=0; i < array_proyecto.length; i++){
                valores.push(array_proyecto[i].idProyecto);
            }
            
            var datos = new Array(tamanio);
            datos.fill(0);
            var cont=0;
            for(let i=1; i <= datos.length; i++){
                for(let j=0; j < valores.length; j++){
                    let val = valores[j];
                    if(i == val){
                        datos[cont]=datos[cont]+1;
                    }
                }
                cont++;
            }
            console.log(datos);
            
            var popCanvas= $("#popChar");
            var popCanvas = document.getElementById("popChart");
            var popCanvas = document.getElementById("popChart").getContext("2d");
            
            var barChart = new Chart(popCanvas,{
                type: 'bar',
                data: {
                  labels: tag,
                  datasets: [{
                    label: 'Por Proyecto',
                    data: datos,
                    backgroundColor: [
                      'rgba(75, 192, 192, 0.6)',
                      'rgba(54, 162, 235, 0.6)',
                      'rgba(255, 206, 86, 0.6)',
                      'rgba(255, 99, 132, 0.6)',
                      'rgba(54, 162, 235, 0.6)',
                      'rgba(255, 206, 86, 0.6)',
                      'rgba(75, 192, 192, 0.6)',
                      'rgba(153, 102, 255, 0.6)',
                      'rgba(255, 159, 64, 0.6)',
                      'rgba(255, 99, 132, 0.6)',
                      'rgba(54, 162, 235, 0.6)',
                      'rgba(255, 206, 86, 0.6)',
                      'rgba(75, 192, 192, 0.6)',
                      'rgba(153, 102, 255, 0.6)',
                      'rgba(75, 192, 192, 0.6)',
                      'rgba(153, 102, 255, 0.6)',
                      'rgba(255, 159, 64, 0.6)',
                      'rgba(255, 99, 132, 0.6)',
                      'rgba(54, 162, 235, 0.6)',
                      'rgba(255, 206, 86, 0.6)',
                      'rgba(75, 192, 192, 0.6)',
                      'rgba(153, 102, 255, 0.6)',
                      'rgba(75, 192, 192, 0.6)',
                      'rgba(153, 102, 255, 0.6)',
                      'rgba(255, 159, 64, 0.6)',
                      'rgba(255, 99, 132, 0.6)',
                      'rgba(54, 162, 235, 0.6)',
                      'rgba(255, 206, 86, 0.6)',
                      'rgba(75, 192, 192, 0.6)',
                      'rgba(153, 102, 255, 0.6)'
                    ]
                  }]
                }
             });
            
            
        </script>
        
                
    </body>
</html>



