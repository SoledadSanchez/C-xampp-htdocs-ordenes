<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";

	if(!empty($_POST))
	{
		if (empty($_POST['idafiliado']))
		{
			header("location: lista_afiliado.php");
			mysqli_close($conection);
		}


		$idafiliado = $_POST['idafiliado'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$documento = $_POST['documento'];
		$email  = $_POST['email'];
		$legajo   = $_POST['legajo'];
		$direccion  = ($_POST['direccion']);
		$telefono   = $_POST['telefono'];
		
		$usuario_id=$_SESSION['idUser'];

			
			$operacion='B';
			$estado = 0;
			$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_afiliado(nombre, apellido, nro_doc, legajo, correo, domicilio, telefono, estado, idusuario, operacion) VALUES ('$nombre','$apellido','$documento','$legajo','$email','$direccion','$telefono','$estado','$usuario_id','$operacion')");
			$query_delete = mysqli_query($conection,"UPDATE afiliados SET estado = 0 WHERE id_afiliado = $idafiliado ");
		
		mysqli_close($conection);
		
		if($query_delete){
			header("location: lista_afiliado.php");
		}else{
			echo "Error al eliminar el Afiliado";
		}

	}




	if(empty($_REQUEST['id']) )
	{
		header("location: lista_afiliado.php");
		mysqli_close($conection);
	}else{

		$idafiliado = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM afiliados WHERE id_afiliado = $idafiliado ");
		
		
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$nombre = $data['nombre'];
				$apellido = $data['apellido'];
				$documento = $data['nro_doc'];
				$email  = $data['correo'];
				$legajo   = $data['legajo'];
				$direccion  = $data['domicilio'];
				$telefono   = $data['telefono'];

					
			}
			mysqli_close($conection);
		}else{
			header("location: lista_afiliado.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Afiliado</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<i class="fas fa-user-times fa-7x" style="color: #e66262"></i> <br>
			<h2><br>¿Estas seguro de eliminar el siguiente Afiliado?</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Apellido: <span><?php echo $apellido; ?></span></p>
			<p>Nro de documento: <span><?php echo $documento; ?></span></p>

			

			<form method="post" action="">
				<input type="hidden" name="idafiliado" value="<?php echo $idafiliado; ?>">
				<input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
				<input type="hidden" name="apellido" value="<?php echo $apellido; ?>">
				<input type="hidden" name="documento" value="<?php echo $documento; ?>">
				<input type="hidden" name="email" value="<?php echo $email; ?>">
				<input type="hidden" name="legajo" value="<?php echo $legajo; ?>">
				<input type="hidden" name="direccion" value="<?php echo $direccion; ?>">
				<input type="hidden" name="telefono" value="<?php echo $telefono; ?>">
				
				<a href="lista_afiliado.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Eliminar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>