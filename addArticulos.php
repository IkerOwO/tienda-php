<!-- CODIGO PHP -->
<?php
    // INCLUIR CONEXION BBDD 
    include ("./conexion.php");

    /*
    // CON ARRAY :3
    $myArray = array(
        $_POST['f_articulo'],
        $_POST['f_tipo'],
        $_POST['f_precio'],
        $_POST['f_descuento'],
        $_POST['f_detalles'],
        $_POST['f_imagen']
    );

    // QUERY CON EL ARRAY
    $sql = "INSERT INTO articulos (idArticulo, articulo, idTipos, precio, descuento, detalles, imagen) VALUES (NULL,'$myArray[0]', '$myArray[1]', '$myArray[2]', '$myArray[3]', '$myArray[4]', '$myArray[5]')";
    */

    // DECLARACION DE VARIABLES
    $art = $_POST['f_articulo'];
    $tipo = $_POST['f_tipo'];
    $precio = $_POST['f_precio'];
    $desc = $_POST['f_descuento'];
    $det = $_POST['f_detalles'];
    $img = $_POST['f_imagen'];

    // INSERT A LA BBDD
    $sql = "INSERT INTO articulos (idArticulo, articulo, idTipos, precio, descuento, detalles, imagen) VALUES (NULL,'$art', '$tipo', '$precio', '$desc', '$det', '$img')";
    
    // EJECUTAR CONSULTA
    mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL INSERT");

    // CERRAR LA CONEXION
    mysqli_close($conexion);

    // REGRESAR A LA PAGINA ANTERIOR DE MANERA AUTOMATICA
    header("location:frmArticulos.php");
?>