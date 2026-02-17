<!-- PARA RECIBIR EL USUARIO -->
<?php 
   // BLOQUEAR LA SESION A CUALQUIERA QUE NO ESTE LOGUEADO
   session_start();
   if(!isset($_SESSION['nombre'])){
      // MANDAR AL LOGIN
      header('location:index.php');
   }
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="iso-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Bootstrap CSS -->
		<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<title>Portada</title>
        <style>
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
			<div class="container">
                <!-- ICONO -->
				<img src="./img/icon.png" style="height: 40px;" class="img-fluid">
				<!-- Barra de navegación -->
				<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar01" aria-controls="navbar01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar01">
					<ul class="navbar-nav mr-auto">
					
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tipos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class='dropdown-item' href="portada.php?">Todos los articulos</a>
                                <?php 
                                    include ("./conexion.php");

                                    // PREPARAR QUERY
                                    $sql = "SELECT * FROM tipos";
                                    // EJECUTAMOS LA QUERY Y GUARDAMOS LOS REGISTROS SELECCIONADOS
                                    $query = mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL SELECT");
                                    // LEER LA INFORMACION DE $query
                                    while ($linea=mysqli_fetch_array($query)) {
                                        echo "<a class='dropdown-item' href='portada.php?id=$linea[idTipo]'>$linea[tipo]</a>";
                                    }
                                    mysqli_close($conexion);
                                ?>
                            </div>
                        </li>
        			</ul>
                        <a class="nav-link" style="float: right;" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Usuario: <?php echo"$_SESSION[nombre]";?> </a>	
                        <?php echo"<a class='nav-link' href='lstcompras.php?persona=$_SESSION[usuario]'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;Ver mis compras<span class='sr-only'>(current)</span></a>"; ?>
						<a class="nav-link" href="./logout.php"><i class="fa fa-times-circle" aria-hidden="true"></i>&nbsp;Salir</a>
				    </div>
				</nav>
				<br>

                <div class='row'> 
                <?php 
                    include ("./conexion.php");
					// PREGUNTAMOS SI EL PARAMETRO id LLEVA CONTENIDO
                    $filtrar = "";
                    if(isset($_GET['id'])){
                        $filtrar = "AND idTipo = $_GET[id]";
                    }

                    // QUERY CON UNION
                    $sql = "SELECT a.*, t.* FROM articulos as a, tipos as t WHERE (a.idTipos = t.idTipo) $filtrar";
					// EJECUTAMOS LA QUERY Y GUARDAMOS LOS REGISTROS SELECCIONADOS
					$query = mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL SELECT");
					// LEER LA INFORMACION DE $query
					while ($linea=mysqli_fetch_array($query)) {
                        $total = $linea['precio'] - ($linea['descuento']/100)*$linea['precio'];
						echo "
                                <!-- ARTICULO -->
                                <div class='col-sm-4'>
                                    <div class='card h-100'>	
                                        <div class='card-body'>
                                            <h6 class='card-image'>  <img src='./img/articulos/$linea[imagen]' draggable='false' style='width: 275px'></h6><br>
                                            <h4 class='card-title' style='margin-top: -20px'>$linea[articulo]</h4><br>
                                            <h6 class='card-text' style='margin-top: -20px'>Categoría: $linea[tipo]</h6><br>
                                            <h6 class='card-text'style='margin-top: -20px'>Precio: $total €</h6><br>
                                            <center>
                                            <a href='addCompras.php?persona=$_SESSION[usuario]&id=$linea[idArticulo]' onclick=\"alert('¡Articulo Comprado!')\" class='btn btn-primary'>COMPRAR</a>
                                        </div>
                                    </div>
                                </div>
                        ";
					}
					mysqli_close($conexion);
                ?>
            </div> <!-- row --> 
		</div> <!-- END CONTAINER DIV -->    

         <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>