<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- PARA ORDENAR TABLA -->
    <script src="./lib/sorttable.js"></script>
    <title>Listado Articulos</title>
    <style>
        /* PARA QUE EL USUARIO NO PUEDA SELECCIONAR EL TEXTO */
        html{
            user-select: none;
        }
        th{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- MENU -->
    <div class="container">
	  <div class="form-group col-12">
	    <img src="./img/icon.png" style="width: 50px;">
		<ul class="nav justify-content-end">
		  <li class="nav-item">
			<a class="nav-link active" href="#">Active</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Link</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Link</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		  </li>
		</ul>
        <!-- TABLA -->
        <table class='table table-bordered table-striped table-hover sortable'>
            <tr style="text-align: center;"> 
                <th>Imagen</th>
                <th>Articulo</th> 
                <th>Tipo</th> 
                <th>Precio</th> 
                <th>Descuento</th> 
                <th>Detalles</th> 
                <th>Eliminar</th>
            </tr>
        <?php 
            include ("conexion.php");

            // QUERY CON UNION
            $sql = "SELECT a.*, t.* FROM articulos as a, tipos as t WHERE (a.idTipos = t.idTipo)";

            $query = mysqli_query($conexion, $sql) or die("ERROR EN EL SELECT");
            // CREAMOS LAS FILAS CON LOS REGISTROS
            while($linea=mysqli_fetch_array($query)){
                echo "
                <tr>
                    <td><img src='./img/articulos/$linea[imagen]' draggable='false' style='width:70px;'></td>
                    <td>$linea[articulo]</td>
                    <td>$linea[tipo]</td>
                    <td>$linea[precio]€</td>
                    <td>$linea[descuento]€</td>
                    <td>$linea[detalles]</td>
                    <td align='center'><a href='delArticulo.php?id=$linea[idArticulo]'><img src='./img/trash.png' draggable='false' style='width:30px;'></a></td>
                </tr>";
            }
            mysqli_close($conexion);
        ?>
        </table>
    </div>
</body>
</html>