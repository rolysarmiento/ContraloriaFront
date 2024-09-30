<?php
    include 'conexion.php';
    $id_prov = $_POST['id_prov'];
    $dep = "select * from ubdistrito where idProv='$id_prov'";
    $sql = mysqli_query($conexion, $dep);
?>

<select class="form-control" id="id_dist" name="id_dist">
        <option value="x"> Todo </option>
    <?php while($row = mysqli_fetch_array($sql)){ ?>
        <option value="<?=$row['idDist']?>"> <?=$row['distrito']?> </option>
    <?php
    } ?>
</select>
      