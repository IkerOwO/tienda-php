<!-- PARA RECIBIR EL USUARIO -->
<?php 
   // BLOQUEAR LA SESION A CUALQUIERA QUE NO ESTE LOGUEADO
   session_start();
   if(!isset($_SESSION['esAdmin'])){
      // MANDAR AL LOGIN
      header('location:index.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Menu Administrador</title>
  </head>
  	<body>
		<div class="container">
			<div class="row">
				<div class="container col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<img src="./img/icon.png" style="height: 40px;" draggable="false" class="img-fluid">
					<ul class="nav justify-content-end">
					<li class="nav-item">
						<a class="nav-link">Usuario: <?php echo"$_SESSION[nombre]";?> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Inicio</a>
					</li>
					</ul>
					<br>
					<div class="row">
					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Articulos</h5>
								<p class="card-text">Gestion de Articulos</p>
								<a href="lstArticulos.php" class="btn btn-primary btn-block" style="margin-top:10px">Ver</a>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Tipos</h5>
								<p class="card-text">Gestion de Tipos</p>
								<a href="lstTipos.php" class="btn btn-primary btn-block" style="margin-top:10px">Ver</a>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Usuarios</h5>
								<p class="card-text">Gestion de Usuarios</p>
								<a href="lstUsuario.php" class="btn btn-primary btn-block" style="margin-top:10px">Ver</a>
							</div>
						</div>
					</div>
					</div>
			</div> <!-- row -->
		</div>  <!-- container -->

		<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  	</body>
</html>
