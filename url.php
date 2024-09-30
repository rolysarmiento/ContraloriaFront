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
                    
                        <h1 class="h3 mb-2 text-gray-800"> Páginas para la búsqueda </h1>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> Páginas </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Página</th>
                                                <th>URL</th>
                                                <th>Seleccionar</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            $con = "select * from paginas";
                                            $sql = mysqli_query($conexion, $con);
                                            while($a = mysqli_fetch_array($sql)){
                                            ?>
                                                <tr>
                                                    <td><?=$a['id']?></td>
                                                    <td><?=$a['web']?></td>
                                                    <td><?=$a['url']?></td>
                                                    <td>    
                                                        <?php
                                                            if($a['estado']=='1'){ ?>
                                                                <a href="./url_estado.php?id_estado=<?=$a['id']?>" style="all: unset;">
                                                                    <button type="button" class="btn btn-success">Seleccionado</button>
                                                                </a>
                                                            <?php
                                                            }else{ ?>
                                                                <a href="./url_estado.php?id_estado=<?=$a['id']?>" style="all: unset;">
                                                                    <button type="button" class="btn btn-secondary">Seleccionar</button>
                                                                </a>
                                                        <?php } ?>                                                        
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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>