<?php

    include 'conexion.php';

    // para registrar
    if(isset($_POST['palabra_clave']) and $_POST['palabra_clave'] != ''){
        $palabra_clave = $_POST['palabra_clave'];
        $con = "insert into palabras_clave (palabra, tipo_palabra) values('$palabra_clave', '1')";
        $sql = mysqli_query($conexion, $con);
    }

    // para eliminar     
    if(isset($_GET['id']) and $_GET['id'] != ''){
        $id = $_GET['id'];
        $con = "delete from palabras_clave where id='$id'";
        $sql = mysqli_query($conexion, $con);
    }

    // para seleccionar     
    if(isset($_GET['id_estado']) and $_GET['id_estado'] != ''){
        $id_estado = $_GET['id_estado'];
        $con = "update palabras_clave set estado='0'";
        $sql = mysqli_query($conexion, $con);
        $con = "update palabras_clave set estado='1' where id='$id_estado'";
        $sql = mysqli_query($conexion, $con);
    }
    

?>

<script>
    location.href ="./palabra_clave.php";
</script>