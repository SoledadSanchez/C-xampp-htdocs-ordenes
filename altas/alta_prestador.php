<?php
$con= mysqli_connect ("localhost", 'root', '', 'apunju_oc') or die ('Error en conexion con el servidor');
$sql= "INSERT INTO prestadores VALUES (null,'".$_POST["razon_social"]."', '".$_POST["cuil"]."','".$_POST["interes"]."','".$_POST["domicilio"]."', '".$_POST["telefono"]."', '".$_POST["email"]."')";
$resultado=mysqli_query($con, $sql) or die ('Error en la conexion de base de datos');

mysqli_close ($con);
?>
<a href=alta_prestadores.html>Volver</a;
