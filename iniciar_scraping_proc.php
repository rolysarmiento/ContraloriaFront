<?php
// Ruta al programa que deseas iniciar
$program_path = 'C:\PY\scrap_contraloria.bat';

// Iniciar el programa
exec($program_path);
?>

<script>
    alert('Scraping Terminado');
    location.href ="./iniciar_scraping.php";
</script>