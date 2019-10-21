<?php
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
        <!-- Texto descriptivo de la plataforma tpm-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Mostrar Lups</h3>
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
                </div>
            </div>
        </div>
        <!-- .\container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Control</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Ver Archivo...</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Cancelar</th>
                                <th scope="col">Eliminar Archivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($datos)) {
                                $cont = 1;
                                foreach ($datos as $valor) {
                                    echo "<tr>";
                                    echo "<th>" . strtoupper($valor[0]) . "</th>";
                                    echo "<th>" . strtoupper($valor[1]) . "</th>";
                                    echo "<th>" . $valor[6] . "</th>";
                                    echo "<th><a href='view/docs/lups/".$valor[1].".pdf' target='_blank'>Abrir ".$valor[1].".pdf</a></th>";
                                    echo "<th><a class='modificar' href='#' rel='".$valor[0]."' >Modificar</a></th>";
                                    echo "<th><a class='cancelar' href='#' rel='".$valor[0]."' >Cancelar</a></th>";
                                    echo "<th><a class='eliminar' href='#' rel='".$valor[0]."' >Eliminar</a></th>";
                                    echo "</tr>";
                                    $cont++;
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

        <!-- Modal para eliminar la lup -->
        <div class="modal" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Alvertencia!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <h2>Estas seguro que quieres eliminar esta lup!</h2>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="delet-lup">Eliminar Lup</button>
                </div>
              </div>
            </div>
        </div>

        <!-- Modal para modificar la lup -->
        <div class="modal" tabindex="-1" role="dialog" id="myModalUpdate">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Alvertencia!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <h2>Estas seguro que quieres modificar la lup!</h2>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="modificar-lup">Modificar Lup</button>
                </div>
              </div>
            </div>
        </div>

        <!-- Modal para Cancelar la lup-->
        <div class="modal" tabindex="-1" role="dialog" id="myModalCancelar">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Alvertencia!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <h2>Estas seguro que quieres cacelar la lup!</h2>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="cancelar-lup">Cancelar Lup</button>
                </div>
              </div>
            </div>
        </div>


        <!-- .\ End -->
        <!-- jQuery -->
        <script type="text/javascript" src="view/js/query/jquery-min.js"></script
        <!-- Table JS -->
        <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="view/js/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript">

            var NUMCONTROL;
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );

            //Modificar una lup
            $(".modificar").click(function (){
                $('#myModalUpdate').modal('show');
                NUMCONTROL = $(this).attr('rel');
            });

            //Modificar una lup
            $(".cancelar").click(function (){
                $('#myModalCancelar').modal('show');
                NUMCONTROL = $(this).attr('rel');
            });

            //Eliminar una lup
            $(".eliminar").click(function (){
                $('#myModal').modal('show');
                NUMCONTROL = $(this).attr('rel');
            });

            //modifiacr una lup
            $("#modificar-lup").click(function (){
                var noControl = $(".modificar").attr('rel');
                location.href = 'index.php?controller=lups&action=formUpdate&valor='+NUMCONTROL;
            });

            //modifiacr una lup
            $("#cancelar-lup").click(function (){
                var noControl = $(".cancelar").attr('rel');
                location.href = 'index.php?controller=lups&action=canceLups&valor='+NUMCONTROL;
            });

            //Eliminar una lup
            $("#delet-lup").click(function (){
                var noControl = $(".eliminar").attr('rel');
                location.href = 'index.php?controller=lups&action=deletedLup&valor='+NUMCONTROL;
            });

        </script>
    </body>
</html>
