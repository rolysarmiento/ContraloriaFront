<?php

    include 'conexion.php';

    // para seleccionar por unidad    
    if(isset($_POST['id_dist']) and $_POST['id_dist'] != 'x'){
        $id_dist = $_POST['id_dist'];
        $con = "update ubdistrito set estado='1' where idDist='$id_dist'";
        $sql = mysqli_query($conexion, $con);
    }
     
    // para quitar distrito
    if(isset($_GET['id_distrito_elim']) and $_GET['id_distrito_elim'] != ''){
        $id_distrito_elim = $_GET['id_distrito_elim'];
        $con = "update ubdistrito set estado='0' where idDist='$id_distrito_elim'";
        $sql = mysqli_query($conexion, $con);
    }

    // para agregar todo distrito de una provincia
    if(isset($_POST['id_dist']) and $_POST['id_dist'] == 'x'){
        $id_prov = $_POST['id_prov'];
        $con = "update ubdistrito set estado='1' where idProv='$id_prov'";
        $sql = mysqli_query($conexion, $con);
    }


?>

<script>
    location.href ="./seleccionar_distrito.php";
</script>