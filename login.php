<?php
    // ARRANCAR LA VARIABLE SESSION
    session_start();

    include ('conexion.php');
    
    // ENCRIPTAR CONTRASEÑA QUE SE HA INTRODUCIDO EN EL FORM
    $passEncrypted = MD5($_POST['f_password']);
    $mail = $_POST['f_mail'];

    $sql = "SELECT * FROM usuarios WHERE email='$mail' AND password='$passEncrypted'"; 

    $registros = mysqli_query($conexion, $sql) or die ("ERROR EN EL SELECT");

    // COMPROBACION EL Nº DE REGISTROS DEVUELTOS EN LA QUERY
    $num = mysqli_num_rows($registros);

    if($num == 0){
        echo "EMAIL O CLAVE INCORRECTOS <br><a href='index.php'>Volver</a>";
    } else {
        // VARIBLE DE SESION
        $_SESSION['usuario'] = $mail;
        header("location:lstArticulos.php");
    }

    mysqli_close($conexion);
?>