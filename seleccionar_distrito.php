<?php
    include 'conexion.php';

    $dep = "select * from ubdepartamento";
    $sql = mysqli_query($conexion, $dep);
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

                        <h1 class="h3 mb-2 text-gray-800"> Seleccionar Distrito(s) </h1>

                        <br>
                    
                        <form action="./seleccionar_distrito_proc.php" method="POST">                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Departamento</label>
                                <select class="form-control" id="id_dep" name="id_dep" onchange="depart()">
                                    <?php while($row = mysqli_fetch_array($sql)){ ?>
                                        <option value="<?=$row['idDepa']?>"> <?=$row['departamento']?> </option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Provincia</label>                                
                                <div id="resultado_prov"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Distrito</label>
                                <div id="resultado_dist"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Seleccionar</button>
                        </form>

                    </div>

                    <br>

                    <div class="container-fluid"> 
                    
                        <h1 class="h3 mb-2 text-gray-800">Palabra Clave (para búsqueda)</h1>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Palabras Clave </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Departamento</th>
                                                <th>Provincia</th>
                                                <th>Distrito</th>
                                                <th>OP</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            $con = "select * from ubdepartamento d join ubprovincia p on p.idDepa = d.idDepa join ubdistrito di on di.idProv = p.idProv where di.estado = '1'";
                                            $sql = mysqli_query($conexion, $con);
                                            while($a = mysqli_fetch_array($sql)){
                                            ?>
                                                <tr>
                                                    <td><?=$a['departamento']?></td>
                                                    <td><?=$a['provincia']?></td>
                                                    <td><?=$a['distrito']?></td>
                                                    <td>
                                                        <a type="button" class="btn btn-danger" href="./seleccionar_distrito_proc.php?id_distrito_elim=<?=$a['idDist']?>"> Quitar</button>
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


    <script>

        function depart(){
            id_dep = document.getElementById('id_dep').value;
            var dato = {'id_dep':id_dep}; 
            $.ajax({
                beforeSend: function() {
                    $('#resultado_prov').html('<center><img src="./view/img/cargando.gif"><center>');
                },
                url: './select_provincia.php',
                type: 'POST',
                data: dato,
                success: function(x) {
                    $('#resultado_prov').html(x);   
                },        
            }); 
        }

        function prov(){
            id_prov = document.getElementById('id_prov').value;
            var dato = {'id_prov':id_prov}; 
            $.ajax({
                beforeSend: function() {
                    $('#resultado_dist').html('<center><img src="./view/img/cargando.gif"><center>');
                },
                url: './select_distrito.php',
                type: 'POST',
                data: dato,
                success: function(x) {
                    $('#resultado_dist').html(x);   
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