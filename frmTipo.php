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
        <a class="nav-link active" style="float: right;" href="./lstTipos.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Volver</a>
        <h2 class="mt-4">TIPOS:</h2>
        <form action="addTipo.php" method="post" autocomplete="off">
          <div class="form-row mt-5">
          <div class="form-group col-md-6">
            <label>Nombre del Tipo</label>
            <input type="text" class="form-control" name="f_tipo" id="f_tipo" required>
          </div>
          <div class="form-group" style="margin-top: 32px;">
              <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
      </form>
      <br>
    </div>
</body>
</html>