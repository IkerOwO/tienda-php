<!-- PARA RECIBIR EL USUARIO -->
<?php 
    // BLOQUEAR LA SESION A CUALQUIERA QUE NO ESTE LOGUEADO
	session_start();
	if(!isset($_SESSION['esAdmin'])){
		// MANDAR AL LOGIN
		header('location:index.php');
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulario Articulos</title>
	<style>
		a{
            cursor: pointer;
            color: #000;
        }
	</style>

	<script lang="js">
		function calcularDescuento(){
			// EL parseFloat CONVIERTE UNA STRING EN UN VALOR FLOAT
			const precio = parseFloat(document.getElementById("f_precio").value);
			const descuento = parseFloat(document.getElementById("f_descuento").value);

			const precioFinal = precio - ((descuento / 100) * precio);
			// toFixed PARA QUE SOLO MUESTRE 2 DECIMALES
			document.getElementById("f_total").value = precioFinal.toFixed(2);
		}
	</script>
  </head>
  <body>

  	<!-- MENU -->
	<div class="container">
		<!-- PARA VER EL USUARIO UNA VEZ PASE POR EL LOGIN -->
        <a style="float: right;" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Usuario: <?php echo"$_SESSION[nombre]";?> </a>
	  <div class="form-group col-8 offset-2">
	    <img src="./img/icon.png" style="width: 50px;" draggable="false">
		<ul class="nav justify-content-end">   
			<li class="nav-item">
				<a class="nav-link active" href="./menuadmin.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Volver</a>
		  	</li>
		</ul>

    <!-- FORM -->
		<form action="addArticulos.php" method="post" enctype="multipart/form-data" autocomplete="off">
		  <div class="form-row mt-2">
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
			 <div class="form-group col-md-4">
			  <label>Precio</label>
			  <input type="number" step=".01" class="form-control" name="f_precio" id="f_precio">
			</div>
			<div class="form-group col-md-4">
			  <label for="inputDescuento">Descuento</label>
			  <input type="number" class="form-control" name="f_descuento" id="f_descuento" onblur='calcularDescuento()' >
			</div>
			<div class="form-group col-md-4">
			  <label for="f_total">Total</label>
			  <input type='number' class='form-control' name='f_total' id='f_total' readonly>
			</div>
		  </div>
		</div>
		  
		  <div class="form-row">
			<div class="form-group col-md-12">
			  <label>Detalles</label>
			  <div data-mdb-input-init class="form-outline">
				<textarea class="form-control" name="f_detalles" id="f_detalles" rows="6" style="resize: none;"></textarea>
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
