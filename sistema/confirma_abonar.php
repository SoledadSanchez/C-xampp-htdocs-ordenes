<?php 
	session_start();
	include "../conexion.php";

	if(!empty($_POST))
	{
		if (empty($_POST['orden']))
		{
			header("location: abonar_cuota.php");
			mysqli_close($conection);
		}


		$idorden = $_POST['orden'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cuota = $_POST['cuota'];
		$max_cuota = $_POST['max_cuota'];
		$importe  = $_POST['importe'];
		$fecha_venc  = $_POST['fecha_venc'];
				
		$usuario_id=$_SESSION['idUser'];

			
			$operacion='M';
			$estado = 1;
			//$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_afiliado(nombre, apellido, nro_doc, legajo, correo, domicilio, telefono, estado, idusuario, operacion) VALUES ('$nombre','$apellido','$documento','$legajo','$email','$direccion','$telefono','$estado','$usuario_id','$operacion')");
			$query = mysqli_query($conection,"UPDATE pagos_oc SET estado = 1, fecha_pago=CURRENT_TIMESTAMP  WHERE id_orden = $idorden and nro_cuota=$cuota ");
			$query_insert_aud_pagos =mysqli_query($conection,"INSERT INTO aud_pagos_oc(id_orden, importe_cuota, nro_cuota, estado, fecha_pago, fecha_vencimiento, id_usuario, operacion) VALUES ('$idorden','$importe','$cuota','1',CURRENT_TIMESTAMP,'$fecha_venc','$usuario_id','$operacion')");
			
			if ($cuota==$max_cuota){
				$query_ordenes = mysqli_query($conection,"UPDATE ordenes SET estado = 'Cancelada' WHERE id_orden = $idorden ");
				$query_orden = mysqli_query($conection,"SELECT * FROM ordenes WHERE estado = 'Cancelada' AND id_orden = $idorden ");
				$result = mysqli_num_rows($query_orden);

				if($result > 0){
					while ($data = mysqli_fetch_array($query_orden)) {
					# code...
					$afiliado = $data['id_afiliado'];
					$financiera = $data['id_financiera'];
					$id_cuota = $data['id_cuota'];
					$cuotas  = $data['n_cuotas'];							
					$inicio_pago = $data['fecha_alta'];
					$monto = $data['monto'];
					$estado = $data['estado'];
					$id_usuario_alta= $data['id_usuario'];
					
					$query_insert_aud_ordenes = mysqli_query($conection,"INSERT INTO aud_ordenes(id_afiliado, id_financiera, id_usuario, id_usuario_alta, id_cuota, estado, n_cuotas, fecha_alta, monto, id_orden, operacion) VALUES ('$afiliado','$financiera','$usuario_id','$id_usuario_alta','$id_cuota','Cancelada','$cuotas','$inicio_pago','$monto','$idorden','$operacion')");
				}}}
			
		
		mysqli_close($conection);
		
		if($query){
			header("location: abonar_cuota.php");
		}else{
			echo "Error al confirmar pago";
		}

	}




	if(empty($_REQUEST['orden']) )
	{
		header("location: abonar_cuota.php");
		mysqli_close($conection);
	}else{

		$orden = $_REQUEST['orden'];

		$query = mysqli_query($conection,"SELECT min(p.nro_cuota), max(p.nro_cuota), p.importe_cuota, o.id_afiliado, a.apellido, a.nombre, p.fecha_vencimiento FROM pagos_oc p inner join ordenes o ON o.id_orden=p.id_orden 
			inner join afiliados a on  o.id_afiliado=a.id_afiliado
			WHERE p.id_orden = $orden and p.estado=3");
		
		
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$cuota = $data['min(p.nro_cuota)'];
				$max_cuota =$data['max(p.nro_cuota)'];
				$apellido = $data['apellido'];
				$importe = $data['importe_cuota'];
				$nombre  = $data['nombre'];
				$fecha_venc  = $data['fecha_vencimiento'];
									
			}
			
		}else{
			header("location: abonar_cuota.php");
			mysqli_close($conection);
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Abonar Cuota</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<i class="fas fa-money-check-alt fa-5x" style="color: #0610b0" ></i> <br>
			<h2><br>Confirma el abono de:</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Apellido: <span><?php echo $apellido; ?></span></p>
			<p>Cuota Nro: <span><?php echo $cuota; ?></span></p>
			<p>Monto de Cuota: <span><?php echo $importe; ?></span></p>

			

			<form method="post" action="">
				<input type="hidden" name="orden" value="<?php echo $orden; ?>">
				<input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
				<input type="hidden" name="apellido" value="<?php echo $apellido; ?>">
				<input type="hidden" name="cuota" value="<?php echo $cuota; ?>">
				<input type="hidden" name="max_cuota" value="<?php echo $max_cuota; ?>">
				<input type="hidden" name="importe" value="<?php echo $importe; ?>">
				<input type="hidden" name="fecha_venc" value="<?php echo $fecha_venc; ?>">
				
				<a href="abonar_cuota.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Confirmar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>