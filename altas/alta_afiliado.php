<?php
$con= mysqli_connect ("localhost", 'root', '', 'apunju_oc') or die ('Error en conexion con el servidor');
$sql= "INSERT INTO afiliados VALUES (null, '".$_POST["nombre"]."', '".$_POST["apellido"]."', '".$_POST["nro_doc"]."','".$_POST["tipo_doc"]."', '".$_POST["legajo"]."')";
$resultado=mysqli_query($con, $sql) or die ('Error en la conexion de base de datos');
mysqli_close ($con);
?>
<a href=alta_persona.html>Volver</a;
