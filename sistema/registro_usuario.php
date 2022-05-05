<?php 
	include "../conexion.php";
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	
	$usuario_sesion=$_SESSION['idUser'];
	
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellido']) ||  empty($_POST['documento']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$documento = $_POST['documento'];
			$email  = $_POST['correo'];
			$user   = $_POST['usuario'];
			$clave  = md5($_POST['clave']);
			$rol    = $_POST['rol'];

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario = '$user' OR documento = '$documento' ");
			
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El documento o el usuario ya existe.</p>';
			}else{

				$status = 1;
				$query_insert = mysqli_query($conection,"INSERT INTO usuario(nombre, apellido, documento, correo,usuario,clave,rol) VALUES ('$nombre','$apellido', '$documento','$email','$user','$clave','$rol')");
				

				if($query_insert){
					$alert='<p class="msg_save">Usuario creado correctamente.</p>';
					$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_usuario(idusuario_sesion, nombre, apellido, documento, correo, usuario, clave, rol, status, operacion) VALUES ('$usuario_sesion','$nombre','$apellido', '$documento','$email','$user','$clave','$rol','$status','A')");
				}else{
					$alert='<p class="msg_error">Error al crear el usuario.</p>';
				}

			}


		}

	}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro Usuario</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1><i class="fas fa-user-plus"></i> Registro de usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo">
				<label for="apellido">Apellido</label>
				<input type="text" name="apellido" id="apellido" placeholder="Apellido">
				<label for="documento">DNI</label>
				<input type="text" name="documento" id="documento" placeholder="Nro de documento">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
				<label for="rol">Tipo Usuario</label>

				<?php 

					$query_rol = mysqli_query($conection,"SELECT * FROM rol");
					mysqli_close($conection);
					$result_rol = mysqli_num_rows($query_rol);

				 ?>

				<select name="rol" id="rol">
					<?php 
						if($result_rol > 0)
						{
							while ($rol = mysqli_fetch_array($query_rol)) {
					?>
							<option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
			
				<button type="submit" class="btn_save"><i class="fas fa-save"></i> Crear usuario</button>

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>