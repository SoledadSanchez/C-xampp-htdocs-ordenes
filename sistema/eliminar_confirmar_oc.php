<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
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
		$interes= $_POST['interes'];
		$total_con_recargo= $_POST['total_con_recargo'];
		$total_sin_recargo= $_POST['total_sin_recargo'];
		$inicio_pago= $_POST['inicio_pago'];
		$nroOrden =$_POST['nroOrden'];
		$monto  = $_POST['monto'];
		$cuotas   = $_POST['cuotas'];			
		$usuario_id=$_SESSION['idUser'];
		$operacion='B';
		$estado = 0;
			
		$query_consulta = mysqli_query($conection,"SELECT * from pagos_oc where nro_orden = $nroOrden and estado = 1 ");
			
		
		$result_pago = mysqli_num_rows($query_consulta);

		if($result_pago > 0){
			
			$alert='<p class="msg_error">No se puede anular la órden porque tiene pagos registrados.</p>';

		}else {	
			
		$query_delete = mysqli_query($conection,"UPDATE ordenes SET estado = 0 WHERE id_orden = $idorden ");
		$query_insert_aud_ordenes = mysqli_query($conection,"INSERT INTO aud_ordenes(id_afiliado, id_financiera, id_usuario, estado, n_cuotas, interes, total_con_recargo, total_sin_recargo, inicio_pago, monto, nro_orden, operacion) VALUES ('$id_afiliado','$id_financiera','$usuario_id','$estado','$cuotas','$interes','$total_con_recargo','$total_sin_recargo','$inicio_pago','$monto','$nroOrden','$operacion')");		
		
		if($query_delete){
			for ($cont=1; $cont<=$cuotas; $cont++){
												
				$query_insert_aud_pagos =mysqli_query($conection,"INSERT INTO aud_pagos_oc(nro_orden, importe_cuota, id_usuario_alta, nro_cuota, estado, fecha_vencimiento, id_usuario, operacion) VALUES ('$nroOrden','$total_con_recargo','$usuario_id','$cont','$estado','$inicio_pago','$usuario_id','$operacion')");
				$query_insert_pagos =mysqli_query($conection,"UPDATE pagos_oc SET estado=0 WHERE nro_orden=$nroOrden");
			}
			
			$alert='<p class="msg_error">Órden anulada correctamente.</p>';
			
			//header("location: listado_ordenes.php");
		}else{
			$alert='<p class="msg_error">Error al anular la Órden.</p>';
			
		}
	}


	}




	if(empty($_REQUEST['id']) )
	{
		header("location: listado_ordenes.php");
		mysqli_close($conection);
	}else{

		$idorden = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT  o.id_afiliado, o.id_financiera, o.id_usuario, o.estado, o.n_cuotas, o.interes, o.total_con_recargo, o.total_sin_recargo, o.inicio_pago, o.monto, o.nro_orden, a.nombre, a.apellido FROM ordenes o inner join afiliados a on a.id_afiliado = o.id_afiliado WHERE o.estado !=0 and o.id_orden=$idorden ");
		
		
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
			
				$id_afiliado = $data['id_afiliado'];
				$id_financiera = $data['id_financiera'];
				$id_usuario_alta = $data['id_usuario'];
				$estado=$data['estado'];
				$interes= $data['interes'];
				$total_con_recargo= $data['total_con_recargo'];
				$total_sin_recargo= $data['total_sin_recargo'];
				$inicio_pago= $data['inicio_pago'];
				$nroOrden =$data['nro_orden'];
				$monto  = $data['monto'];
				$cuotas   = $data['n_cuotas'];
				$nombre = $data['nombre'];
				$apellido= $data['apellido'];				
									
			}
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
	<title>Eliminar orden</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	
	<section id="container">
		<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
		<div class="data_delete">
			<h2>¿Estas seguro de eliminar la siguiente orden?</h2>
			<p>Nro de Órden: <span><?php echo $nroOrden; ?></span></p>
			<p>Afiliado: <span><?php echo $apellido.', '.$nombre; ?></span></p>
			<p>Monto: <span><?php echo '$'.$monto; ?></span></p>
			<p>Nro de Cuotas: <span><?php echo $cuotas; ?></span></p>
						

			<form method="post" action="">
				<input type="hidden" name="idorden" value="<?php echo $idorden; ?>">
				<input type="hidden" name="id_afiliado" value="<?php echo $id_afiliado; ?>">
				<input type="hidden" name="id_financiera" value="<?php echo $id_financiera; ?>">
				<input type="hidden" name="id_usuario_alta" value="<?php echo $id_usuario_alta; ?>">
				<input type="hidden" name="estado" value="<?php echo $estado; ?>">
				<input type="hidden" name="interes" value="<?php echo $interes; ?>">
				<input type="hidden" name="total_sin_recargo" value="<?php echo $total_sin_recargo; ?>">
				<input type="hidden" name="total_con_recargo" value="<?php echo $total_con_recargo; ?>">
				<input type="hidden" name="inicio_pago" value="<?php echo $inicio_pago; ?>">
				<input type="hidden" name="nroOrden" value="<?php echo $nroOrden; ?>">
				<input type="hidden" name="monto" value="<?php echo $monto; ?>">
				<input type="hidden" name="cuotas" value="<?php echo $cuotas; ?>">
			
				
				
				<a href="listado_ordenes.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Eliminar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>