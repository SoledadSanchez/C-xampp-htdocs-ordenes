<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";

	if(!empty($_POST))
	{
		if($_POST['idusuario'] == 1){
			header("location: lista_usuarios.php");
			mysqli_close($conection);
			exit;
		}
		$idusuario = $_POST['idusuario'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$documento = $_POST['documento'];
		$correo  = $_POST['correo'];
		$user   = $_POST['usuario'];
		$clave  = $_POST['clave'];
		$rol    = $_POST['rol'];

		$usuario_id=$_SESSION['idUser'];

			
		$operacion='B';
		$estado = 0;

		
		$query_delete = mysqli_query($conection,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario ");
		$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_usuario(idusuario_sesion, nombre, apellido, documento, correo, usuario, clave, rol, status, operacion) VALUES ('$usuario_id','$nombre','$apellido', '$documento','$correo','$user','$clave','$rol','$estado','$operacion') ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_usuarios.php");
		}else{
			echo "Error al eliminar";
		}

	}




	if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1 )
	{
		header("location: lista_usuarios.php");
		mysqli_close($conection);
	}else{

		$idusuario = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT *
												FROM usuario u
												INNER JOIN
												rol r
												ON u.rol = r.idrol
												WHERE u.idusuario = $idusuario ");
		
		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$nombre 	   = $data['nombre'];
				$apellido 	   = $data['apellido'];
				$usuario 	   = $data['usuario'];
				$rol     	   = $data['rol'];
				$clave  	   = $data['clave'];
				$correo 	   = $data['correo'];
				$documento     = $data['documento'];
			}
		}else{
			header("location: lista_usuarios.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Usuario</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Estas seguro de eliminar el siguiente Usuario?</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Apellido: <span><?php echo $apellido; ?></span></p>
			<p>usuario: <span><?php echo $usuario; ?></span></p>
			<p>Tipo Usuario: <span><?php echo $rol; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
				<input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
				<input type="hidden" name="apellido" value="<?php echo $apellido; ?>">
				<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
				<input type="hidden" name="clave" value="<?php echo $clave; ?>">
				<input type="hidden" name="correo" value="<?php echo $correo; ?>">
				<input type="hidden" name="documento" value="<?php echo $documento; ?>">
				<input type="hidden" name="rol" value="<?php echo $rol; ?>">
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>