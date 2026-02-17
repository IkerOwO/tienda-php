<?php
    include('./conexion.php');

    $recibirID = $_GET['id'];
    $recibirPersona = $_GET['persona'];

    $sql = "INSERT INTO compras (usuario, idArticulo, fechaCompra) VALUES ('$recibirPersona', '$recibirID', '" . date('Y-m-d H:i:s') . "')";

    mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL INSERT");

    mysqli_close($conexion);

    header("location:portada.php");
?>