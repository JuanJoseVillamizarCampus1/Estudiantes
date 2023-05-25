<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['guardar'])) {
    require_once("config.php");

    $config = new Config();

    $config -> setNombre($_POST['nombres']);
    $config -> setDireccion($_POST['direccion']);
    $config -> setLogros($_POST['logros']);
    $config -> setSkills($_POST['skills']);
    $config -> setSer($_POST['ser']);
    $config -> setIngles($_POST['ingles']);
    $config -> setReview($_POST['review']);

    $config -> insertData();

    echo "<script> alert('Los datos fueron guardados satisfactoriamente');document.location='estudiantes.php'</script>";
}
?>