<?php
$con= mysqli_connect ("localhost", 'root', '', 'apunju_oc') or die ('Error en conexion con el servidor');
$sql= "INSERT INTO usuarios_login VALUES ('".$_POST["usuario"]."', '".MD5('$_POST["contraseña"]')."', '".$_POST["nombre"]."','".$_POST["apellido"]."', '".$_POST["nro_doc"]."')";
var_dump($sql);
$resultado=mysqli_query($con, $sql) or die ('Error en la conexion de base de datos');

mysqli_close ($con);
?>
<a href=alta_usuario.html>Volver</a;
