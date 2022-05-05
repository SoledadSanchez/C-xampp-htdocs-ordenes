<?php 
	
	session_start();
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['cuil']))
		{
			$alert='<p class="msg_error">Los campos con asterisco son obligatorios.</p>';
		}else{

			$idfinanciera = $_POST['id'];
			$nombre = $_POST['nombre'];
			$cuil = $_POST['cuil'];
			$email  = $_POST['correo'];
			$direccion  = ($_POST['direccion']);
			$telefono   = $_POST['telefono'];
			$usuario_id=$_SESSION['idUser'];

			
			$operacion='M';
			$estado = 1;

			$result = 0;

			if (is_numeric($cuil)){
				$query = mysqli_query($conection,"SELECT * FROM financieras	WHERE (id_financiera = '$idfinanciera' AND cuil != $cuil) ");

				$result = mysqli_fetch_array($query);
				

			}

				

			if($result > 0){
				$alert='<p class="msg_error">El cuil ya existe.</p>';
			}else{

				$sql_update = mysqli_query($conection,"UPDATE financieras
															SET nombre = '$nombre', cuil = '$cuil', correo ='$email', domicilio ='$direccion', telefono ='$telefono'
															WHERE id_financiera= $idfinanciera ");

				if($sql_update){
					
					$sql_update_aud= mysqli_query($conection,"INSERT INTO  aud_financiera(nombre, cuil, correo, domicilio, telefono, id_usuario, operacion, estado) values ('$nombre','$cuil','$email','$direccion','$telefono','$usuario_id','$operacion', '$estado')");
															
					$alert='<p class="msg_save">Financiera actualizada correctamente.</p>';
					
				}else{
					$alert='<p class="msg_error">Error al actualizar el afiliado.</p>';
				}

			}


		}
		
	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_financiera.php');
		mysqli_close($conection);
	}
	$idfinanciera = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM financieras
									WHERE id_financiera = $idfinanciera and estado = 1 ");
	
	$result_sql = mysqli_num_rows($sql);
   mysqli_close($conection);
	if($result_sql == 0){
		header('Location: lista_financiera.php');
	}else{
		
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$idfinanciera  = $data['id_financiera'];
			$nombre  = $data['nombre'];
			$cuil = $data['cuil'];
			$correo  = $data['correo'];
			$direccion   = $data['domicilio'];
			$telefono     = $data['telefono'];

			
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Modificar Financiera</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Modificar Financiera</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $idfinanciera; ?>">
				<label for="nombre">Razón Social(*)</label>
				<input type="text" name="nombre" id="nombre" placeholder="Razón Social" value="<?php echo $nombre; ?>">
				<label for="cuil">CUIL(*)</label>
				<input type="number" name="cuil" id="cuil" placeholder="CUIL" value="<?php echo $cuil; ?>">
				<label for="telefono">Celular o teléfono(*)</label>
				<input type="number" name="telefono" id="telefono" placeholder="Telefono o Celular" value="<?php echo $telefono; ?>">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico" value="<?php echo $correo; ?>">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion" placeholder="Dirección competa" value="<?php echo $direccion; ?>">
				
				<input type="submit" value="Actualizar Financiera" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>