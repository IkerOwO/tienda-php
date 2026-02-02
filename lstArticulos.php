<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado Articulos</title>
    <style>
        /* PARA QUE EL USUARIO NO PUEDA SELECCIONAR EL TEXTO */
        html{
            user-select: none;
        }
        a{
            cursor: pointer;
            color: #000;
        }
    </style>
</head>
<body>
    <!-- MENU -->
    <div class="container">
	  <div class="form-group col-12">
	    <img src="./img/icon.png" style="width: 50px;" draggable="false">
		<ul class="nav justify-content-end">
		  <li class="nav-item">
			<a class="nav-link" href="./frmArticulos.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Volver</a>
		  </li>
		</ul>
        <!-- TABLA -->
        <table class='table table-bordered table-striped table-hover'>
            <tr style="text-align: center;"> 
                <th><a href="#">Imagen</a></th>
                <th><a href="lstArticulos.php?campo=articulo">Articulo</a></th> 
                <th><a href="lstArticulos.php?campo=tipo">Tipo</a></th> 
                <th><a href="lstArticulos.php?campo=precio">Precio</a></th> 
                <th><a href="lstArticulos.php?campo=descuento">Descuento</a></th> 
                <th><a href="#">Detalles</a></th> 
            </tr>
        <?php
            include ("conexion.php");
            // PREGUNTAMOS SI EL PARAMETRO campo LLEVA CONTENIDO
            $ordenar = "";
            if(isset($_GET['campo'])){
                $ordenar = "ORDER BY $_GET[campo]";
            }

            // QUERY CON UNION
            $sql = "SELECT a.*, t.* FROM articulos as a, tipos as t WHERE (a.idTipos = t.idTipo) $ordenar";

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
                    <td align='center'><a href='delArticulo.php?id=$linea[idArticulo]' onclick=\"return confirm('¿Seguro que deseas borrar este artículo?')\"><img src='./img/trash.png' draggable='false' style='width:30px;'></a></td>
                </tr>";
            }
            mysqli_close($conexion);
        ?>
        </table>
    </div>
</body>
</html>