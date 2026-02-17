<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>index.php</title>
	<style>
		a{
            cursor: pointer;
            color: #000;
        }
	</style>
</head>
<body>
    <!-- MENU -->
	<div class="container">
	  <div class="form-group col-4 offset-4">
	    <img src="./img/icon.png" style="width: 50px;" draggable="false">
		<!-- FORM -->
		<form action="login.php" method="post" autocomplete="off">
		  <div class="form-row mt-5">
			<div class="form-group col-md-12">
			  <label>Email</label>
			  <input type="email" class="form-control" name="f_mail" id="f_mail" required>
			</div>
          </div>
          <div class="form-row mt-2">
			<div class="form-group col-md-12">
				<label for="f_mail">Contraseña</label>
			    <input type="password" class="form-control" name="f_password" id="f_password" required>
			</div>
		  </div>
		  <a href="./frmUsuario.php" style="float: right;">¿No tiene cuenta?</a>
		  <br>
            <button type="submit" class="btn btn-primary">Acceder</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>