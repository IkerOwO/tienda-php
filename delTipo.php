<?php
   // BLOQUEAR LA SESION A CUALQUIERA QUE NO ESTE LOGUEADO
   session_start();
   if(!isset($_SESSION['esAdmin'])){
      // MANDAR AL LOGIN
      header('location:index.php');
   }

   include ("conexion.php");
   
   // BORRAMOS TODO DEL ARTICULO QUE RECIBIMOS POR SU ID
   $sql = "DELETE FROM tienda.tipos WHERE idTipo = $_GET[idTipo] ";

   // COMO NO DEVULVE REGISTROS, NO LO METEMOS DENTRO DE UNA VARIABLE
   mysqli_query($conexion, $sql) or die("ERROR EN EL DELETE"); 

   mysqli_close($conexion);

   header("location:lstArticulos.php");
?>