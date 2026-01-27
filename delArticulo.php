<?php
   include ("conexion.php");
   
   // BORRAMOS TODO DEL ARTICULO QUE RECIBIMOS POR SU ID
   $sql = "DELETE FROM tienda.articulos WHERE idArticulo = $_GET[id] ";

   // COMO NO DEVULVE REGISTROS, NO LO METEMOS DENTRO DE UNA VARIABLE
   mysqli_query($conexion, $sql) or die("ERROR EN EL DELETE"); 

   mysqli_close($conexion);

   header("location:lstArticulos.php");
?>