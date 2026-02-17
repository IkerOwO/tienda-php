<?php
    include ('conexion.php');
    
    // ENCRIPTAR CONTRASEÑA QUE SE HA INTRODUCIDO EN EL FORM
    $passEncrypted = MD5($_POST['f_pass']);
    $mail = $_POST['f_mail'];
    $user = $_POST['f_user'];
    $movil = $_POST['f_movil'];

    $sql = "INSERT INTO usuarios (email, password, nombreCompleto, movil, rol) VALUES ('$mail', '$passEncrypted', '$user', '$movil', 0)"; 

    mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL INSERT");

    header("location:index.php");
    
    mysqli_close($conexion);

?>