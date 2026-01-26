<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulario Articulos</title>
  </head>
  <body>

	<div class="container">
	  <div class="form-group col-8 offset-2">
	    <img src="./img/icon.png" style="width: 50px;" draggable="false">
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
		<!--
		  <li class="nav-item">
			<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		  </li>
		-->
		</ul>

    <!-- Modelo de formulario -->
		<form action="addArticulos.php" method="post" autocomplete="off">
		  <div class="form-row mt-5">
			<div class="form-group col-md-6">
			  <label>Articulo</label>
			  <input type="text" class="form-control" name="f_articulo" id="f_articulo">
			</div>
			<div class="form-group col-md-6">
				<label for="inputTipo">Tipo de instrumento</label>
			  <select id="f_tipo" name="f_tipo" class="form-control" required>
				<option value="" selected>Elige...</option>
				<?php 
					include ("./conexion.php");

					// PREPARAR QUERY
					$sql = "SELECT * FROM tipos";
					// EJECUTAMOS LA QUERY Y GUARDAMOS LOS REGISTROS SELECCIONADOS
					$query = mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL SELECT");
					// LEER LA INFORMACION DE $query
					while ($linea=mysqli_fetch_array($query)) {
						echo "<option value='$linea[idTipo]'>$linea[tipo]</option>";
					}
					mysqli_close($conexion);
				?>
			  </select>  
			</div>
		  </div>
		  <div class="form-row">
			 <div class="form-group col-md-6">
			  <label>Precio</label>
			  <input type="number" class="form-control" name="f_precio" id="f_precio">
			</div>
			<div class="form-group col-md-6">
			  <label for="inputDescuento">Descuento</label>
			  <input type="number" class="form-control" name="f_descuento" id="f_descuento">
			</div>
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-12">
			  <label>Detalles</label>
			  <div data-mdb-input-init class="form-outline">
				<textarea class="form-control" name="f_detalles" id="f_detalles" rows="4" style="resize: none;"></textarea>
			</div>
			</div>
			<div class="form-group col-md-8">
			  <label for="inputDescuento">Ruta Imagen</label>
			  <input type="file" class="form-control" name="f_imagen" id="f_imagen">
			</div>
		  </div>
		  <div class="form-group">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="gridCheck" required>
			  <label class="form-check-label" for="gridCheck">
				Acepto los terminos y condiciones :D
			  </label>
			</div>
		  </div>
		  <button type="submit" class="btn btn-primary">Enviar</button>
		</form>
		<br>
     </div>
  </div>
 
  </body>
</html>
