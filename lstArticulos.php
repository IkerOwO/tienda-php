<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Articulos</title>
</head>
<body>


    <?php 
        include ("conexion.php");

        // QUERY CON UNION
        $sql = "SELECT a.*, t.* FROM articulos as a, tipos as t WHERE (a.idTipos = t.idTipo)";

        $query = mysqli_query($conexion, $sql) or die("ERROR EN EL SELECT");

        while($linea=mysqli_fetch_array($query)){
            echo "$linea[idArticulo] - $linea[articulo] - $linea[tipo] - $linea[precio]€ - $linea[descuento]€ - $linea[detalles] - $linea[imagen]<br>";
        }
        mysqli_close($conexion);
    ?>  
</body>
</html>