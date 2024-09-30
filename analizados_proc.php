<?php

    include 'conexion.php';

    // para seleccionar     
    if(isset($_POST['estado']) and $_POST['estado'] != ''){
        $estado = $_POST['estado'];
        $con = "update info_distrito set estado=$estado where id=".$_POST['id'];
        $sql = mysqli_query($conexion, $con);
    }
    

?>

<script>
    location.href ="./analizados.php";
</script>