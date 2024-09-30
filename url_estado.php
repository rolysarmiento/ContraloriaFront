<?php

    include 'conexion.php';

    // para seleccionar     
    if(isset($_GET['id_estado']) and $_GET['id_estado'] != ''){
        
        $sql = "SELECT * FROM paginas where id=".$_GET['id_estado'];
        $con = mysqli_query($conexion, $sql);
        
        while($arr = mysqli_fetch_array($con)){
            $estado = $arr['estado'];
        }

        if($estado == 0){
            $con = "update paginas set estado='1' where id=".$_GET['id_estado'];        
        }else{
            $con = "update paginas set estado='0' where id=".$_GET['id_estado'];            
        }        
        $sql = mysqli_query($conexion, $con);

        
    }
    

?>

<script>
    location.href ="./url.php";
</script>