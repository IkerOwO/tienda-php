<?php
    include("./conexion.php");

    // VARIABLES
    $art   = $_POST['f_articulo'];
    $tipo  = $_POST['f_tipo'];
    $precio= $_POST['f_precio'];
    $desc  = $_POST['f_descuento'];
    $det   = $_POST['f_detalles'];
    $nombreImg = $_FILES['f_imagen']['name'];
    $tmpImg    = $_FILES['f_imagen']['tmp_name'];

    // EVITAMOS SOBREESCRITURA
    $nombreImg = time() . "_" . $nombreImg;
    
    // CARPETA DESTINO
    $destino = "./img/articulos/" . $nombreImg;

    // MOVER ARCHIVO
    if (!move_uploaded_file($tmpImg, $destino)) {
        die("Error al subir la imagen");
    }

    // INSERT A LA BBDD
    $sql = "INSERT INTO articulos (articulo, idTipos, precio, descuento, detalles, imagen) VALUES ('$art', '$tipo', '$precio', '$desc', '$det', '$nombreImg')";

    mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL INSERT");

    mysqli_close($conexion);

    // REDIRECCION
    header("Location: frmArticulos.php");
?>
