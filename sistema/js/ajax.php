<?php
include "../conexion.php";
 session_start();



	if(!empty($_POST)){
		
		if($_POST['action'] == 'infoproducto'){
			
			$nroOrden=$_POST['nroOrden'];
			$query = mysqli_query($conection,"SELECT nro_cuota, nro_orden
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
		//buscar afiliado
		if($_POST['action']=='searchAfiliado'){
			if(!empty($_POST['afiliado'])){
				$documento=$_POST['afiliado'];
				$query=mysqli_query($conection,"SELECT * FROM afiliados WHERE nro_doc LIKE '%$documento%' AND estado=1");
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
	}
	exit;
?>
