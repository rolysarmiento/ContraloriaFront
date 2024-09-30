<?php
    include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Contraloria </title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
       <?php
            include 'head.php';
       ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                    include 'header.php';
                ?>
                <div class="container-fluid">


                    <div class="container-fluid"> 
                    
                        <h1 class="h3 mb-2 text-gray-800"> Distritos Analizados </h1>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> Distritos Analizados </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Distrito</th>
                                                <th>Fuente</th>
                                                <th>Fecha Registrado</th>
                                                <th>Palabra Clave</th>
                                                <th>Estado</th>
                                                <th>Total Contenido</th>
                                                <th>Ver Detalles</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            $con = "SELECT i.id as id, i.fuente as fuente, i.estado as estado, i.fecha_reg as fecha_reg, d.distrito as distrito, p.palabra as palabra_clave, i.total_contenido
                                            FROM info_distrito i 
                                            JOIN ubdistrito d on d.idDist = i.id_distrito
                                            JOIN palabras_clave p on p.id = i.id_palabra_clave";
                                            $sql = mysqli_query($conexion, $con);
                                            while($a = mysqli_fetch_array($sql)){
                                            ?>
                                                <tr>
                                                    <td><?=$a['distrito']?></td>
                                                    <td><?=$a['palabra_clave']?></td>
                                                    <td> 
                                                       <a href="<?=$a['fuente']?>" target="blank_"> Link </a> 
                                                    </td>
                                                    <td><?=$a['fecha_reg']?></td>
                                                    <td>
                                                        <?php
                                                            if($a['estado']==1){ ?>
                                                                <label type="button" class="btn btn-info">Con Datos</label>
                                                            <?php }else{ ?>
                                                                <label type="button" class="btn btn-danger">Sin Datos</label>
                                                            <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?=$a['total_contenido']?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="modal('<?=$a['id']?>')">Ver Detalles</button>
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                



                </div>
            </div>
          <?php
            include 'end.php';
          ?>
        </div>
    </div>    

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div id="resultado_modal"></div>
        </div>
    </div>

    <script>
        function modal(id){
            var datos = {'id':id};
            $.ajax({
                beforeSend: function() {
                    $('#resultado_modal').html('<center><img src="./img/cargando.gif"><center>');
                },
                url: './analizados_modal.php',
                type: 'POST',
                data: datos,
                success: function(x) {
                    $('#resultado_modal').html(x); 
                },     
            });  
        }
    </script>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>