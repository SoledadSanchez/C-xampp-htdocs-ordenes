<?php
include "../conexion.php";
 session_start();

	if(!empty($_POST)){
		
		if($_POST['action']=='infoproducto'){
			
			$nroOrden=$_POST['nroOrden'];
			$query = mysqli_query ($conection,"SELECT min(nro_cuota), nro_orden
				FROM pagos_oc WHERE nro_orden=$nroOrden and estado =2");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);
			if($result>0){
				$data = mysqli_fetch_assoc($query);
				
				echo json_encode($data,JSON_UNESCAPED_UNICODE);
				exit;
			}

			echo 'error';
			exit;
		}
		//calcular el monto por cuota el detalle de la orden
		if($_POST['action']=='calcularMonto'){
			
			$importe=$_POST['importe'];
			$interes=$_POST['interes'];
			$nroCuota=$_POST['nroCuota'];

			$monto_interes=($importe * $interes)/100;
			$importeCuota=($monto_interes+$importe)/$nroCuota;
			
			if($importeCuota>0){
						
				echo json_encode($importeCuota,JSON_UNESCAPED_UNICODE);
				exit;
			}

			echo 'error';
			exit;
		}
		//buscar afiliado
		if($_POST['action']=='searchAfiliado'){
			if(!empty($_POST['afiliado'])){
				$documento=$_POST['afiliado'];
				$query=mysqli_query($conection,"SELECT * FROM afiliados WHERE nro_doc = $documento AND estado=1");
				mysqli_close($conection);
				$result= mysqli_num_rows($query);

				$data='';
				if($result > 0){
					$data = mysqli_fetch_assoc($query);
				}else{
					$data = 0;
				}
				echo json_encode($data,JSON_UNESCAPED_UNICODE);
			}
			exit;
		}

		//Registrar afiliado desde orden -
		if($_POST['action']=='addAfiliado')
		{


			$id_afiliado=$_POST['idAfiliado'];
			$documento=$_POST['nit_documento'];
			$nombre=$_POST['nom_afiliado'];
			$telefono=$_POST['tel_afiliado'];
			$domicilio = $_POST['dir_afiliado'];
			$legajo = $_POST['leg_afiliado'];
			$fecha = $_POST['fecha_afiliado'];
			$apellido = $_POST['apellido_afiliado'];
			$sexo = $_POST['sexo'];
			$id_dependencia = $_POST['dependencia'];
			$usuario_id =$_SESSION['idUser'];
			$operacion="A";
			$query_insert = mysqli_query($conection,"INSERT INTO afiliados(nombre, apellido, nro_doc, legajo, domicilio, telefono, fecha_nac, sexo, dependencia) VALUES ('$nombre','$apellido','$documento','$legajo','$domicilio','$telefono','$fecha','$sexo','$id_dependencia')");

			if($query_insert){
				$query_auditoria = mysqli_query($conection,"INSERT INTO aud_afiliado(nombre, apellido, nro_doc, legajo, domicilio, telefono, fecha_nac, sexo, dependencia, idusuario, operacion) VALUES ('$nombre','$apellido','$documento','$legajo','$domicilio','$telefono','$fecha','$sexo','$id_dependencia','$usuario_id','$operacion')");
				$codAfiliado = mysqli_insert_id($conection);
				$msg=$codAfiliado;
			}else {
				$msg='error';
			}
			mysqli_close($conection);
			echo $msg;
				exit;

		}

		//buscar financiera desde orden
		if($_POST['action']=='searchFinanciera'){
			if(!empty($_POST['financiera'])){
				$cuit=$_POST['financiera'];
				$query=mysqli_query($conection,"SELECT * FROM financieras WHERE cuil = $cuit AND estado=1");
				mysqli_close($conection);
				$result= mysqli_num_rows($query);

				$data='';
				if($result > 0){
					$data = mysqli_fetch_assoc($query);
				}else{
					$data = 0;
				}
				echo json_encode($data,JSON_UNESCAPED_UNICODE);
			}
			exit;
		}

		//mostrar la cuota en la generacion de la orden 
		if($_POST['action']=='mostrarCuota'){
			if(empty($_POST['cuil'])){
				echo 'error';
			}else {
				$cuil=$_POST['cuil'];
				$query=mysqli_query($conection,"SELECt f.id_financiera, c.id_cuota, c.n_cuotas, c.interes from financieras f inner join cuotas c on c.id_financiera=f.id_financiera where f.cuil = $cuil order by c.n_cuotas DESC");
				$result= mysqli_num_rows($query);

				$detalleTabla='';
				$arrayData = array();

				if($result > 0){
					
					while ($data = mysqli_fetch_assoc($query)){
						$detalleTabla .='<tr>
											<td class="textcenter">'.$data['id_cuota'].'</td>
											<td class="textcenter">'.$data['interes'].'</td>
											<td class="textcenter">'.$data['n_cuotas'].'</td>
											<td class="">
												<a class="link_add" href="#" onclick="event.preventDefault(); add_cuota('.$data['id_cuota'].');"> <i class="fas fa-plus"></i> Agregar</a>
											</td>	
										</tr>';
					}
					$arrayData['detalle'] = $detalleTabla;
					echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
					
				}else{
					echo 'error';
				}
				
				mysqli_close($conection);
			}
			exit;
		}

		//agregar la cuota en la generacion de la orden 
		if($_POST['action']=='addCuota'){

			if(!empty($_POST['cuota'])){
				$cuota=$_POST['cuota'];
				$query=mysqli_query($conection,"SELECT * FROM cuotas WHERE id_cuota = $cuota");
				mysqli_close($conection);
				$result= mysqli_num_rows($query);

				$data='';
				if($result > 0){
					$data = mysqli_fetch_assoc($query);
				}else{
					$data = 0;
				}
				echo json_encode($data,JSON_UNESCAPED_UNICODE);
			}
			exit;
			
		}
		//verificar cuotas quedo aca 23/08
		if($_POST['action']=='verificarCuota'){

			if(!empty($_POST['financiera'])){
				$cuota=$_POST['cant_cuota'];
				$total=$_POST['total'];
				$importe=$_POST['importe'];
				$financiera=$_POST['financiera'];


				$query=mysqli_query($conection,"SELECT * FROM cuotas WHERE id_financiera = $financiera and importe = $importe and n_cuotas = $cuota and total = $total");
				mysqli_close($conection);
				$result= mysqli_num_rows($query);

				if($result){
					echo "error";
				}else{
					echo "alta";
				}
				
			}
			exit;
			
		}

		//procesar la generacion de la orden 
		if($_POST['action'] == 'generarOrden'){
			$cuota=$_POST['cuota'];
			$financiera=$_POST['financiera'];
			$afiliado=$_POST['afiliado'];
			$monto=$_POST['monto'];
			$importe=$_POST['importe'];
			$usuario_id=$_SESSION['idUser'];
			$estado='Pendiente';

			//obtengo fechas
			$fechaComoEntero = time();
			$dia = date("d", $fechaComoEntero);
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

			//busco datos de la cuota
			$query_cuota=mysqli_query($conection,"SELECT * FROM cuotas WHERE id_cuota = $cuota");
			$result= mysqli_num_rows($query_cuota);
			if($result > 0){
					$data = mysqli_fetch_assoc($query_cuota);
					$interes=$data['interes'];
					$n_cuotas=$data['n_cuotas'];
					$aux=($monto * $interes) + $monto;
					$importe2=$aux/$n_cuotas;
					

					//inserto orden
					$query_insert = mysqli_query($conection,"INSERT INTO ordenes(id_afiliado, id_financiera, id_usuario, id_cuota, estado, n_cuotas, monto) 
																		VALUES ('$afiliado','$financiera','$usuario_id','$cuota','$estado','$n_cuotas','$monto')");
					//si se inserta bien la orden agrego los pagos
					if($query_insert){
						//extraigo el ultimo id_orden generado
						$query_max = mysqli_query($conection,"SELECT max(id_orden) FROM ordenes");
						$max = mysqli_fetch_assoc($query_max);
						$max_orden=$max['max(id_orden)'];
						
						//extraigo la fecha de la orden
						$query_fecha_max = mysqli_query($conection,"SELECT fecha_alta FROM ordenes where id_orden=$max_orden");
						$fecha_max = mysqli_fetch_assoc($query_fecha_max);
						$fecha_alta=$fecha_max['fecha_alta'];						

						//inserto en aud_orden
						$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_ordenes(id_afiliado, id_financiera, id_usuario_alta, id_cuota, estado, n_cuotas, monto, id_usuario, operacion, id_orden, fecha_alta ) 
																		VALUES ('$afiliado','$financiera','$usuario_id','$cuota','$estado','$n_cuotas','$monto','$usuario_id','A','$max_orden','$fecha_alta')");

											
						
						for ($cont=1; $cont<=$n_cuotas; $cont++){
													
							$query_insert_pagos = mysqli_query($conection,"INSERT INTO pagos_oc(id_orden, id_financiera, id_afiliado, importe_cuota, id_usuario, nro_cuota, estado, fecha_vencimiento) VALUES ('$max_orden','$financiera','$afiliado','$importe2','$usuario_id','$cont','2','$fecha')");
							$query_insert_audpagos = mysqli_query($conection,"INSERT INTO aud_pagos_oc(id_orden, id_financiera, id_afiliado, importe_cuota, id_usuario_alta, nro_cuota, estado, fecha_vencimiento, operacion, id_usuario) VALUES ('$max_orden','$financiera','$afiliado','$importe2','$usuario_id','$cont','2','$fecha','A','$usuario_id')");
							
							
							$mes = $mes +1;
							
								if ($mes>=13){
									$mes=1;
									$anio= $anio+1;
								}
							
							$fecha=$mes ."/". $anio;
						}
						}
						$query=mysqli_query($conection,"SELECT * FROM ordenes WHERE id_orden = $max_orden");
						mysqli_close($conection);
						$result= mysqli_num_rows($query);

						$data='';
							if($result > 0){
								$data = mysqli_fetch_assoc($query);
							}else{
								$data = 0;
							}
						echo json_encode($data,JSON_UNESCAPED_UNICODE);						
											

					}else{
							echo "error";
						}
				//mysqli_close($conection);
				exit;
			}
			

		
	
}
	
	exit;

?>

