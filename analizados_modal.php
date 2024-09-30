<?php
    include 'conexion.php';
    $con = 'SELECT i.id as id, i.fuente as fuente, i.captura as captura, i.estado as estado, i.fecha_reg as fecha_reg, d.distrito as distrito FROM info_distrito i JOIN ubdistrito d on d.idDist = i.id_distrito where id='.$_POST['id'];
    $sql = mysqli_query($conexion, $con);
    while($a = mysqli_fetch_array($sql)){
        $distrito = $a['distrito'];
        $fecha_reg = $a['fecha_reg'];
        $captura = $a['captura'];
        $fuente = $a['fuente'];
        $estado = $a['estado'];
    }
?>

<div class="modal-content">
    <form action="./analizados_proc.php" method="POST">
        <input type="hidden" id="id" name="id" value="<?=$_POST['id']?>">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Distrito Analizado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">            
            <div class="form-group">
                <label for="exampleFormControlInput1">Distrito : <?=$distrito?> </label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Fecha Registro : <?=$fecha_reg?> </label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Link : <a href="<?=$fuente?>" target="blank_"> <?=$fuente?> </a> </label>
            </div>
            <div class="form-group">                
                <img src="./<?=$captura?>" style="width: 100%"/>                
            </div>      
            <div class="form-group">
                <label for="exampleFormControlTextarea1"> Estado Análizis </label>
                <select class="form-control form-control-sm" type="text" id="estado" name="estado">
                    <option value=""> --> Seleccionar <-- </option>
                    <option value="1">Datos</option>
                    <option value="0">Sin datos</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success">Actualizar</button>            
        </div>
    </form>
</div>


<script>
    $('#estado').val('<?=$estado?>');
</script>