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
                    <div class="row">

                        <div class="col-md-12" style="text-align: center;">                         
                            <h1 class="h3 mb-2 text-gray-800"> Iniciar Scraping </h1>
                            <br>                        

                            <?php
                                $tot = 0;
                                $con = "SELECT * FROM palabras_clave WHERE estado=1";
                                $sql = mysqli_query($conexion, $con);
                                $num = mysqli_num_rows($sql);
                                if($num <> 0){ $tot++; ?>
                                    <p>
                                        Palabra Clave : <input type="checkbox" id="checkbox" checked disabled />  <?=$num?>
                                    </p>
                                <?php                                    
                                }else{ ?>
                                    <p>
                                        Palabra Clave : <input type="checkbox" id="checkbox" disabled />  <?=$num?>
                                    </p>
                                <?php                                    
                                }

                                $con = "SELECT * FROM ubdistrito WHERE estado=1";
                                $sql = mysqli_query($conexion, $con);
                                $num = mysqli_num_rows($sql);
                                if($num <> 0){ $tot++; ?>
                                    <p>
                                        Distritos : <input type="checkbox" id="checkbox" checked disabled />  <?=$num?>
                                    </p>
                                <?php                                    
                                }else{ ?>
                                    <p>
                                        Distrito : <input type="checkbox" id="checkbox" disabled />  <?=$num?>
                                    </p>
                                <?php                                    
                                }

                                $con = "SELECT * FROM paginas WHERE estado=1";
                                $sql = mysqli_query($conexion, $con);
                                $num = mysqli_num_rows($sql);
                                if($num <> 0){ $tot++; ?>
                                    <p>
                                        Páginas : <input type="checkbox" id="checkbox" checked disabled />  <?=$num?>
                                    </p>
                                <?php                                    
                                }else{ ?>
                                    <p>
                                        Páginas : <input type="checkbox" id="checkbox" disabled />  <?=$num?>
                                    </p>
                                <?php                                    
                                }
                            ?>

                            <?php
                            if($tot >= 3){ ?>
                                <form action="./iniciar_scraping_proc.php" method="POST">                    
                                    <button type="submit" class="btn btn-primary">Iniciar Proceso</button>
                                </form>
                            <?php
                            }else{ ?>
                                <button type="button" class="btn btn-primary" disabled>Iniciar Proceso</button>
                            <?php
                            }
                            ?>

                            



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