<?php
    include 'conexion.php';
    $id_dep = $_POST['id_dep'];
    $dep = "select * from ubprovincia where idDepa='$id_dep'";
    $sql = mysqli_query($conexion, $dep);
?>

<select class="form-control" id="id_prov" name="id_prov" onchange="prov()">
    <?php while($row = mysqli_fetch_array($sql)){ ?>
        <option value="<?=$row['idProv']?>"> <?=$row['provincia']?> </option>
    <?php
    } ?>
</select>
      