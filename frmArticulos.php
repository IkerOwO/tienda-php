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
				<?php 
					include ("./conexion.php");

					// Hacemos un array vacio en el que meteremos el numero de ids que hay en la tabla
					$ids = [];
					
					$sql = "SELECT idTipo FROM tipos";
					$query = mysqli_query($conexion, $sql) or die("ERROR AL REALIZAR EL SELECT");
					/*
						Si el numero de filas es mayor a 0
						El fetch_assoc(), devuelve una fila de datos del conjunto de resultados y la retorna como un array "asociativo" -- Segun la web de PHP btw :(
					*/
					if ($query->num_rows > 0) {
						while ($row = $query->fetch_assoc()) {
							$ids[] = $row['idTipo'];
						}
					}
					// El count() cuenta todos los elementos en un array
					for ($i = 1; $i <= count($ids); $i++) {
						echo "<option value=$i>$i</option>";
					}

					mysqli_close($conexion);
				?>
				<!-- 
				<option value="" selected>Elije...</option>
				<option value="1">Guitarras</option>
				<option value="2">Bajos</option>
				<option value="3">Baterias</option>
				<option value="4">Pianos</option>  -->
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
