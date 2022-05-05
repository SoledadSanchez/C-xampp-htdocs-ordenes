<?php 
	include "../conexion.php";
	session_start();
		
	$total_sin_recargo=0;
	$total_con_recargo=0;
	
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nroOrden']) ||empty($_POST['afiliado']) || empty($_POST['financiera']) ||  empty($_POST['cuotas']) ||  empty($_POST['monto']))
		{
			$alert='<p class="msg_error">Los campos son obligatorios.</p>';
		}else{

			$afiliado = $_POST['afiliado'];
			$financiera = $_POST['financiera'];
			$monto = $_POST['monto'];
			$cuotas  = $_POST['cuotas'];
			$nroOrden  = $_POST['nroOrden'];
			
			$usuario_id=$_SESSION['idUser'];

			$fechaComoEntero = time();
			$dia = date("d", $fechaComoEntero);
			

			$interes = 0.02;
			$operacion='A';
			$estado = 'Pendiente';
			$total_sin_recargo= $monto / $cuotas;
			$total_con_recargo = (($monto*$interes)/$cuotas) + $total_sin_recargo;
			
			if ( (date('d'))>15){

				$mes = date("m", $fechaComoEntero);
				$mes = $mes + 1;
			}
			else{
				$mes = date("m", $fechaComoEntero);
			}
			if ($mes >= 13 ){
				$mes = 1;
				$anio= date("Y", $fechaComoEntero);
				$anio = $anio +1;
			}else{
				$anio= date("Y", $fechaComoEntero);
			}

			$fecha = $mes ."/". $anio;
						
			
				$query_insert = mysqli_query($conection,"INSERT INTO ordenes(id_afiliado, id_financiera, id_usuario, estado, n_cuotas, interes, total_con_recargo, total_sin_recargo, inicio_pago, monto, nro_orden) VALUES ('$afiliado','$financiera','$usuario_id','$estado','$cuotas','$interes','$total_con_recargo','$total_sin_recargo','$fecha','$monto','$nroOrden')");
				$query_insert_aud_ordenes = mysqli_query($conection,"INSERT INTO aud_ordenes(id_afiliado, id_financiera, id_usuario, estado, n_cuotas, interes, total_con_recargo, total_sin_recargo, inicio_pago, monto, nro_orden, operacion) VALUES ('$afiliado','$financiera','$usuario_id','$estado','$cuotas','$interes','$total_con_recargo','$total_sin_recargo','$fecha','$monto','$nroOrden','$operacion')");


				if($query_insert){

					
					for ($cont=1; $cont<=$cuotas; $cont++){
												
						$query_insert_pagos = mysqli_query($conection,"INSERT INTO pagos_oc(nro_orden, importe_cuota, id_usuario, nro_cuota, estado,fecha_vencimiento) VALUES ('$nroOrden','$total_con_recargo','$usuario_id','$cont','2','$fecha')");
						$query_insert_aud_pagos =mysqli_query($conection,"INSERT INTO aud_pagos_oc(nro_orden, importe_cuota, id_usuario_alta, nro_cuota, estado, fecha_vencimiento, id_usuario, operacion) VALUES ('$nroOrden','$total_con_recargo','$usuario_id','$cont','2','$fecha','$usuario_id','$operacion')");

						$mes = $mes +1;
						
						if ($mes>=13){
							$mes=1;
							$anio= $anio+1;
						}
						
						$fecha=$mes ."/". $anio;
					}
					
					$alert='<p class="msg_save">Órden creada correctamente.</p>';
					
					
					
				}else{
					$alert='<p class="msg_error">Error al crear la órden.</p>';
				}
			}
			
		}
		




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<?php include "includes/fecha_pago.php"; ?>
	<title>Registro Órden de Compra</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1><i class="fas fa-cubes"></i>Registro Órden de Compra</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nroOrden">Nro de Orden:</label>
				<input type="number" name="nroOrden" id="nroOrden" placeholder="Número de orden">
				<label for="afiliado">Afiliado</label>
				<?php 

					$query_afiliado = mysqli_query($conection,"SELECT id_afiliado, nombre, apellido FROM afiliados where estado =1 order by apellido asc");
					
					$result_afiliado = mysqli_num_rows($query_afiliado);

				 ?>

				<select name="afiliado" id="afiliado">
					<?php 
						if($result_afiliado > 0)
						{
							while ($afiliado = mysqli_fetch_array($query_afiliado)) {
					?>
							<option value="<?php echo $afiliado["id_afiliado"]; ?>"><?php echo $afiliado["apellido"].', '. $afiliado["nombre"]?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>

				<label for="financiera">Financiera</label>
				<?php 

					$query_financiera = mysqli_query($conection,"SELECT id_financiera, nombre FROM financieras where estado = 1 order by nombre asc");
					
					$result_financiera = mysqli_num_rows($query_financiera);
					mysqli_close($conection);

				 ?>

				<select name="financiera" id="financiera">
					<?php 
						if($result_financiera > 0)
						{
							while ($financiera = mysqli_fetch_array($query_financiera)) {
					?>
							<option value="<?php echo $financiera["id_financiera"]; ?>"><?php echo $financiera["nombre"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
				<label for="cuotas">Nº de cuotas</label>
				<input type="number" name="cuotas" id="cuotas" placeholder="Nro de cuotas">
				<label for="monto">Monto</label>
				<input type="number" name="monto" id="monto" placeholder="Monto total sin interes">
				
				
				<input type="submit" value="Crear órden" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>