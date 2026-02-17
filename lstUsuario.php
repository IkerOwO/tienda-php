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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>Mis compras</title>
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
        <!-- PARA VER EL USUARIO UNA VEZ PASE POR EL LOGIN -->
        <a style="float: right;" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Usuario: <?php echo"$_SESSION[nombre]";?> </a>
	  <div class="form-group col-12">
	    <img src="./img/icon.png" style="width: 50px;" draggable="false">
		<ul class="nav justify-content-end">
            <li class="nav-item">
			    <a class="nav-link" href="./frmUsuario.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Añadir usuario</a>
		    </li>
            <li class="nav-item">
			    <a class="nav-link" href="./menuadmin.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Volver</a>
		    </li>
          
		</ul>
        <!-- TABLA -->
        <table class='table table-bordered table-striped table-hover'>
            <tr style="text-align: center;"> 
                <th>Email</th>
                <th>Password</th> 
                <th>Nombre Completo</th> 
                <th>Movil</th>
                <th>¿Es Admin?</th>
                <th>Borrar</th>
            </tr>
        <?php
            include('./conexion.php');


            // QUERY CON UNION
            $sql = "SELECT * FROM usuarios";

            $query = mysqli_query($conexion, $sql) or die("ERROR EN EL SELECT");
            // CREAMOS LAS FILAS CON LOS REGISTROS
            while($linea=mysqli_fetch_array($query)){
                echo "
                    <tr>
                        <td>$linea[email]</td>
                        <td>$linea[password]</td>
                        <td>$linea[nombreCompleto]</td>
                        <td>$linea[movil]</td>
                        <td>$linea[rol]</td>
                        <td align='center'><a href='delUsuario.php?id=$linea[email]' onclick=\"return confirm('¿Seguro que deseas borrar este usuario?')\"><img src='./img/trash.png' draggable='false' style='width:30px;'></a></td>
                    </tr>
                ";
            }
            mysqli_close($conexion);
        ?>
        </table>
    </div>
</body>
</html>