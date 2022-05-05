<?php 
	session_start();
	
	include "../conexion.php";

	if(!empty($_POST))

	{
		$alert='';
		if (empty($_POST['idorden']))
		{
			$alert='<p class="msg_error">el id esta vacio.</p>';
			header("location: listado_ordenes.php");
			mysqli_close($conection);
		}
		$idorden = $_POST['idorden'];
		$id_afiliado = $_POST['id_afiliado'];
		$id_financiera = $_POST['id_financiera'];
		$id_usuario_alta = $_POST['id_usuario_alta'];		
		$id_cuota= $_POST['id_cuota'];
			
		$monto  = $_POST['monto'];
		$cuotas   = $_POST['cuotas'];			
		$usuario_id=$_SESSION['idUser'];
		$operacion='M';
		$estado = 'Autorizada';
				
		
			
		$query_update = mysqli_query($conection,"UPDATE ordenes SET estado = 'Autorizada' WHERE id_orden = $idorden ");
		
		$query_update_pagos_oc = mysqli_query($conection,"UPDATE pagos_oc SET estado = '3' WHERE id_orden = $idorden ");
		
		$query_insert_aud_ordenes = mysqli_query($conection,"INSERT INTO aud_ordenes(id_afiliado, id_financiera, id_usuario, estado, n_cuotas, monto, id_orden, operacion, id_cuota) VALUES ('$id_afiliado','$id_financiera','$usuario_id','$estado','$cuotas','$monto','$idorden','$operacion','$id_cuota')");	

		//agrego la auditoria de pagos

				for ($cont=1; $cont<=$cuotas; $cont++){
													
							$query_pagos = mysqli_query($conection,"select fecha_vencimiento, importe_cuota, id_usuario from pagos_oc where id_orden=$idorden and nro_cuota=$cont ");
							$data_pagos = mysqli_fetch_assoc($query_pagos);
							$fecha_venc=$data_pagos['fecha_vencimiento'];
							$importe_cuota=$data_pagos['importe_cuota'];
							$id_usuario_alta=$data_pagos['id_usuario'];

							$query_insert_audpagos = mysqli_query($conection,"INSERT INTO aud_pagos_oc(id_orden, id_financiera, id_afiliado, importe_cuota, id_usuario_alta, nro_cuota, estado, fecha_vencimiento, operacion, id_usuario) VALUES ('$idorden','$id_financiera','$id_afiliado','$importe_cuota','$id_usuario_alta','$cont','3','$fecha_venc','M','$usuario_id')");
						}


		if($query_update){
					
			$alert='<p class="msg_error">Órden autorizada correctamente.</p>';
			
			
		}else{
			$alert='<p class="msg_error">Error al autorizar la Órden.</p>';
			
		}
	}



	if(empty($_REQUEST['id']) )
	{
		header("location: listado_ordenes.php");
		mysqli_close($conection);
	}else{

		$idorden = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT  o.id_afiliado, o.id_financiera, o.id_usuario, o.estado, o.n_cuotas, o.monto, o.id_orden, o.id_cuota, a.nombre, a.apellido FROM ordenes o inner join afiliados a on a.id_afiliado = o.id_afiliado WHERE o.estado !='Baja' and o.id_orden=$idorden ");
		
		
		$result = mysqli_num_rows($query);


		if($result > 0){

			
			while ($data = mysqli_fetch_array($query)) {
				# code...
			
				$id_afiliado = $data['id_afiliado'];
				$id_financiera = $data['id_financiera'];
				$id_usuario_alta = $data['id_usuario'];
				$estado=$data['estado'];
				$id_cuota=$data['id_cuota'];
				$nroOrden =$data['id_orden'];
				$monto  = $data['monto'];
				$cuotas   = $data['n_cuotas'];
				$nombre = $data['nombre'];
				$apellido= $data['apellido'];				
									
			}
			//sumo lo que debe el afiliado
			$query_deuda=mysqli_query($conection,"SELECT SUM(`importe_cuota`) FROM `pagos_oc` WHERE `estado`=3 and id_afiliado=$id_afiliado");
			$deuda = mysqli_fetch_array($query_deuda);
			$total_deuda = $deuda['SUM(`importe_cuota`)'];
			mysqli_close($conection);
		}else{
			header("location: listado_ordenes.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Autorizar Órden</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	
	<section id="container">
		<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
		<div class="data_delete">
			<h2>¿Estas seguro de AUTORIZAR la siguiente orden?</h2>
			<p>Nro de Órden: <span><?php echo $nroOrden; ?></span></p>
			<p>Afiliado: <span><?php echo $apellido.', '.$nombre; ?></span></p>
			<p>Monto: <span><?php echo '$'.$monto; ?></span></p>
			<p>Nro de Cuotas: <span><?php echo $cuotas; ?></span></p>
			<p>Monto Adeudado: <span><?php echo $total_deuda; ?></span></p>
								

			<form method="post" action="">
				<input type="hidden" name="idorden" value="<?php echo $idorden; ?>">
				<input type="hidden" name="id_afiliado" value="<?php echo $id_afiliado; ?>">
				<input type="hidden" name="id_financiera" value="<?php echo $id_financiera; ?>">
				<input type="hidden" name="id_usuario_alta" value="<?php echo $id_usuario_alta; ?>">
				<input type="hidden" name="estado" value="<?php echo $estado; ?>">
				<input type="hidden" name="id_cuota" value="<?php echo $id_cuota; ?>">
				<input type="hidden" name="monto" value="<?php echo $monto; ?>">
				<input type="hidden" name="cuotas" value="<?php echo $cuotas; ?>">
			
				
				
				<a href="listado_ordenes.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Autorizar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>