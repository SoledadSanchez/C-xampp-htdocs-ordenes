<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";

	if(!empty($_POST))
	{
		if (empty($_POST['idfinanciera']))
		{
			header("location: lista_financiera.php");
			mysqli_close($conection);
		}


		$idfinanciera = $_POST['idfinanciera'];
		$nombre = $_POST['nombre'];
		$cuil = $_POST['cuil'];
		$email  = $_POST['email'];
		$direccion  = ($_POST['direccion']);
		$telefono   = $_POST['telefono'];
		
		$usuario_id=$_SESSION['idUser'];

			
			$operacion='B';
			$estado = 0;
			//$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_afiliado(nombre, apellido, nro_doc, legajo, correo, direccion, telefono, estado, idusuario, operacion) VALUES ('$nombre','$apellido','$documento','$legajo','$email','$direccion','$telefono','$estado','$usuario_id','$operacion')");
			$query_delete = mysqli_query($conection,"UPDATE financieras SET estado = 0 WHERE id_financiera = $idfinanciera ");
			$sql_update_aud= mysqli_query($conection,"INSERT INTO  aud_financiera(nombre, cuil, correo, domicilio, telefono, id_usuario, operacion, estado) values ('$nombre','$cuil','$email','$direccion','$telefono','$usuario_id','$operacion', '$estado')");
		
		mysqli_close($conection);
		
		if($query_delete){
			header("location: lista_financiera.php");
		}else{
			echo "Error al eliminar la Financiera";
		}

	}




	if(empty($_REQUEST['id']) )
	{
		header("location: lista_financiera.php");
		mysqli_close($conection);
	}else{

		$idfinanciera = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM financieras WHERE id_financiera = $idfinanciera ");
		
		
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$nombre = $data['nombre'];
				$cuil = $data['cuil'];
				$email  = $data['correo'];
				$legajo   = $data['legajo'];
				$direccion  = $data['domicilio'];
				$telefono   = $data['telefono'];

					
			}
			mysqli_close($conection);
		}else{
			header("location: lista_financiera.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Financiera</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Estas seguro de eliminar la siguiente Financiera?</h2>
			<p>Razón Social: <span><?php echo $nombre; ?></span></p>
			<p>CUIL: <span><?php echo $cuil; ?></span></p>
						

			<form method="post" action="">
				<input type="hidden" name="idfinanciera" value="<?php echo $idfinanciera; ?>">
				<input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
				<input type="hidden" name="cuil" value="<?php echo $cuil; ?>">
				<input type="hidden" name="email" value="<?php echo $email; ?>">
				<input type="hidden" name="direccion" value="<?php echo $direccion; ?>">
				<input type="hidden" name="telefono" value="<?php echo $telefono; ?>">
				
				<a href="lista_financiera.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Eliminar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>