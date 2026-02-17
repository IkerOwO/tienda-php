<?php
    include('./conexion.php');

    $tipo = $POST['f_tipo'];

    $sql = "INSERT INTO tipos (tipo) VALUES ('$tipo')";

    mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL INSERT");

    mysqli_close($conexion);
?>