<?php 
	include "../conexion.php";
	session_start();
		
	
	
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['cuil']))
		{
			$alert='<p class="msg_error">Los campos con asterisco son obligatorios.</p>';
		}else{

			$nombre 	= $_POST['nombre'];
			$cuil 	= $_POST['cuil'];
			$email  	= $_POST['correo'];
			$telefono   = $_POST['telefono'];
			$direccion  = $_POST['direccion'];
			
			$usuario_id=$_SESSION['idUser'];

			$result = 0;
			$operacion='A';
			$estado = 1;
			if (is_numeric($cuil) and $cuil != 0){
				$query = mysqli_query($conection,"SELECT * FROM financieras WHERE cuil = '$cuil'");
				$result = mysqli_fetch_array($query);
			}

			if($result>0) {
				$alert='<p class="msg_error">El cuil ya existe.</p>';
			}else {
				$query_insert = mysqli_query($conection,"INSERT INTO financieras(nombre, cuil, correo, domicilio, telefono, estado) VALUES ('$nombre','$cuil','$email','$direccion','$telefono','$estado')");

				if($query_insert){
					$sql_update_aud= mysqli_query($conection,"INSERT INTO  aud_financiera(nombre, cuil, correo, domicilio, telefono, id_usuario, operacion, estado) values ('$nombre','$cuil','$email','$direccion','$telefono','$usuario_id','$operacion', '$estado')");
					
					$alert='<p class="msg_save">Financiera creada correctamente.</p>';
					
					
					
				}else{
					$alert='<p class="msg_error">Error al crear Financiera.</p>';
				}
			}
			
		}
		mysqli_close($conection);

	}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro de Financieras</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1><i class="fas fa-user-tie"></i> Registrar Financiera</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nombre">Razón social(*)</label>
				<input type="text" name="nombre" id="nombre" placeholder="Razón social">
				<label for="apellido">Cuil(*)</label>
				<input type="text" name="cuil" id="cuil" placeholder="Cuil">
				<label for="telefono">Celular o teléfono()</label>
				<input type="number" name="telefono" id="telefono" placeholder="Telefono o Celular">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion" placeholder="Dirección competa">
				
				<button type="submit" class="btn_save"><i class="fas fa-save"></i> Crear Financiera</button>
				

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>