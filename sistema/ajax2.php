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
		//buscar cuota para el detalle de la orden
		if($_POST['action']=='infoCuota'){
			
			$nroCuota=$_POST['cuota'];
			$query = mysqli_query ($conection,"SELECT *
				FROM cuotas WHERE id_cuota=$nroCuota");
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

		//mostrar la cuota en la generacion de la orden 25/07
		if($_POST['action']=='mostrarCuota'){
			print_r($_POST); exit;
			}
			exit;

		}

		//buscar financiera 25/07
		if($_POST['action']=='searchFinanciera'){
			if(!empty($_POST['financiera'])){
				$cuit=$_POST['financiera'];

				$query_financiera=mysqli_query($conection,"SELECT f.id_financiera, f.nombre, f.telefono, f.domicilio, c.id_cuota, c.total, c.n_cuotas, c.importe FROM financieras f inner join cuotas c on f.id_financiera = c.id_financiera and f.cuil = $cuit AND f.estado=1");



				/*para completar la tabla de cuotas por financiera
				$query_cuotas=mysqli_query($conection,"SELECT c.id_cuota, c.id_financiera, c.total, c.n_cuotas, c.importe FROM cuotas c inner join financieras f on  c.id_financiera=f.id_financiera where f.cuil = $cuit AND f.estado=1");
				mysqli_close($conection);
				$result_cuota= mysqli_num_rows($query_cuotas);
				$detalleTabla='';
				$arrayCuotas= array();
				if($result_cuota > 0){
					while ($data_cuota=mysqli_fetch_assoc($query_cuotas)) {
						$detalleTabla .= '<tr>
											<td>'.$data_cuota['id_cuota'].'</td>
											<td>'.$data_cuota['total'].'</td>
											<td>'.$data_cuota['n_cuotas'].'</td>
											<td>'.$data_cuota['importe'].'</td>	
										</tr>';
					}

				$arrayCuotas['cuotas'] = $detalleTabla;
				echo json_encode($arrayCuotas,JSON_UNESCAPED_UNICODE);
				//mysqli_close($conection);

				}*/

				//para completar la pantalla de financieras
				$result= mysqli_num_rows($query_financiera);

				$data='';
				if($result > 0){
					$data = mysqli_fetch_assoc($query_financiera);
				}else{
					$data = 0;
				}
				echo json_encode($data,JSON_UNESCAPED_UNICODE);
			}
			exit;
		}
	}
	exit;
?>
