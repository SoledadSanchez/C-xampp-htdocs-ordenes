<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";

	if(!empty($_POST))
	{
		if (empty($_POST['id_orden']))
		{
			header("location: lista_oc.php");
			mysqli_close($conection);
		}


		$idorden = $_POST['id_orden'];
		
		
		$usuario_id=$_SESSION['idUser'];

			
			$operacion='B';
			$estado = 0;
			/*$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_afiliado(nombre, apellido, nro_doc, legajo, correo, domicilio, telefono, estado, idusuario, operacion) VALUES ('$nombre','$apellido','$documento','$legajo','$email','$direccion','$telefono','$estado','$usuario_id','$operacion')");
			$query_delete = mysqli_query($conection,"UPDATE afiliados SET estado = 0 WHERE id_afiliado = $idafiliado ");
		
		mysqli_close($conection);
		
		if($query_delete){
			header("location: lista_oc.php");
		}else{
			echo "Error al anular la Orden";
		}*/

	}




	if(empty($_REQUEST['id']) )
	{
		//header("location: lista_oc.php");
		echo "Error al anular la Orden". $id_orden;
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
			//header("location: lista_oc.php");
			echo "Error al anular la Orden". $id_orden;
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Anular Órden</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Estas seguro de anular la siguiente Órden?</h2>
			<p>Nro de Órden: <span><?php echo $id_orden; ?></span></p>

			
			
			<form method="post" action="">
				<input type="hidden" name="id_orden" value="<?php echo $id_orden; ?>">
				<input type="hidden" name="id_afiliado" value="<?php echo $id_afiliado; ?>">
				<input type="hidden" name="id_financiera" value="<?php echo $id_financiera; ?>">
				
				
				<a href="#" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Eliminar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>