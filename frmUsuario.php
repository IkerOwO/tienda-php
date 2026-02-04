<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulario Usuario</title>
    <style>
        a{
            cursor: pointer;
            color: #000;
        }
    </style>
    <script lang="js">
        function checkPass(){
            if(f_pass.value != repeatPass.value){
                errorMsg.innerHTML = "Las contraseñas NO COINCIDEN";
                errorMsg.style.color = 'red';
            } else {
                errorMsg.innerHTML = "Las contraseñas COINCIDEN";
                errorMsg.style.color = 'green';
            }
        }
    </script>
</head>
<body>
     <!-- FORM -->
      <div class="container">
        <img src="./img/icon.png" style="width: 50px;" draggable="false">
        <a class="nav-link active" style="float: right;" href="./index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Volver</a>
        <h2 class="mt-4">REGISTRO:</h2>
		<form action="register.php" method="post" autocomplete="off">
		  <div class="form-row mt-5">
			<div class="form-group col-md-6">
			  <label>Email</label>
			  <input type="email" class="form-control" name="f_mail" id="f_mail" required>
			</div>
            <div class="form-group col-md-6">
			  <label>Nombre de usuario</label>
			  <input type="text" class="form-control" name="f_user" id="f_user" required>
			</div>
          </div>
          <div class="form-row mt-2">
			<div class="form-group col-md-6">
			  <label>Contraseña</label>
			  <input type="password" class="form-control" name="f_pass" id="f_pass" required>
			</div>
            <div class="form-group col-md-6">
			  <label>Repite la contraseña</label>
			  <input type="password" class="form-control" name="repeatPass" id="repeatPass" onblur="checkPass()" required>
			</div>
          </div>

        <h3 id="errorMsg"></h3>
        
        <div class="form-row mt-2">
			<div class="form-group col-md-6">
			  <label>Movil</label>
			  <input type="text" class="form-control" name="f_movil" id="f_movil" required>
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
</body>
</html>