<?php 
	
	session_start();
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['']) )
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
		header('Location: listado_ordenes.php');
		mysqli_close($conection);
	}
	$idOrden = $_REQUEST['id'];
	$sql_afiliado= mysqli_query($conection,"SELECT o.id_orden, a.apellido, a.nombre, o.fecha_alta, o.monto, o.id_financiera FROM ordenes o inner join afiliados a on a.id_afiliado = o.id_afiliado WHERE o.estado != 'Baja' and o.id_orden=$idOrden");
		$result_sql_afiliado = mysqli_num_rows($sql_afiliado);
  
		if($result_sql_afiliado > 0){		
		
			$dataAfiliado = mysqli_fetch_array($sql_afiliado);
					# code...
			$apellido  = $dataAfiliado['apellido'];
			$nombre  = $dataAfiliado['nombre'];
			$monto = $dataAfiliado['monto'];
			

			
		}

	$sql= mysqli_query($conection,"SELECT * FROM pagos_oc
									WHERE id_orden = $idOrden and estado != 'Baja' ");
	
	$result_sql = mysqli_num_rows($sql);
  
	if($result_sql == 0){
		header('Location: listado_ordenes.php');
	}else{
		
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$nroCuota  = $data['nro_cuota'];
			$estado  = $data['estado'];
			$fechaPago = $data['fecha_pago'];
			$fechaVencimiento = $data['fecha_vencimiento'];
			$importe   = $data['importe_cuota'];

			
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
		
		
			<h1><i class="fas fa-file-invoice-dollar"></i> Abonar Cuota</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
		<h3>AFILIADO: <?php echo $apellido; ?>, <?php echo $nombre; ?></h3><br>
	
		<h3>MONTO: $<?php echo $monto; ?></h3><br>
			
		<table>
			<tr>
				<th>Orden</th>
				<th>Nro de Cuota</th>
				<th>Importe</th>
				<th>fecha Vencimiento</th>
				<th>Fecha de Pago</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM pagos_oc WHERE estado !=0 and id_orden=$idOrden ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 10;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT * FROM pagos_oc  WHERE id_orden = $idOrden and estado !=0 ORDER BY nro_cuota ASC LIMIT $desde,$por_pagina 
				");

			

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["id_orden"]; ?></td>
					<td><?php echo $data["nro_cuota"]; ?></td>
					<td><?php echo '$'.$data["importe_cuota"]; ?></td>
					<td><?php echo $data["fecha_vencimiento"] ?></td>
					<td><?php echo $data["fecha_pago"] ?></td>
					<td><?php 
					      if ($estado==3){
						 	echo "Pendiente";
						 	} else {
						 		if ($estado==1){
						 			echo "Pagado";
						 		}
						 	};						  
					     ?></td>
					<td>
					
					
						
						<?php if ($estado==3){ ?>
						<a class="link_add" href="confirma_abonar.php?orden=<?php echo $data["id_orden"]; ?>" ><i class="fas fa-dollar-sign"></i> Abonar</a>
						
						<?php
						}
					  ?>
									
					</td>
				</tr>
			
		<?php 
				 
				}

			}
		 ?>


		</table>


		


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>