<?php 
	
	session_start();
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		
		
		if(empty($_POST['nombre']) || empty($_POST['apellido']) ||  empty($_POST['documento']) ||  empty($_POST['telefono'])|| empty($_POST['legajo'])|| empty($_POST['fecha'])|| empty($_POST['sexo'])|| empty($_POST['depende']))
		{
			$alert='<p class="msg_error">Los campos con asterisco son obligatorios.</p>';
		}else{

			$idafiliado = $_POST['id'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$documento = $_POST['documento'];
			$correo  = $_POST['correo'];
			$legajo   = $_POST['legajo'];
			$direccion  = ($_POST['direccion']);
			$telefono   = $_POST['telefono'];
			$fecha = $_POST['fecha'];
			$sexo=$_POST['sexo'];
			$depende=$_POST['depende'];
			$cuil = $_POST['cuil'];

			$usuario_id=$_SESSION['idUser'];

			
			$operacion='M';
			$estado = 1;

			$result = 0;

			if (is_numeric($documento)){
				$query = mysqli_query($conection,"SELECT * FROM afiliados WHERE (id_afiliado = '$idafiliado' AND nro_doc != $documento) ");

				$result = mysqli_fetch_array($query);				

			}			

			if($result > 0){
				$alert='<p class="msg_error">El nro de documento ya existe.</p>';
			}else{

				$sql_update = mysqli_query($conection,"UPDATE afiliados
															SET nombre = '$nombre', apellido = '$apellido', nro_doc = '$documento', correo ='$correo', domicilio ='$direccion', legajo ='$legajo', telefono ='$telefono', cuil = '$cuil', sexo = '$sexo', dependencia='$depende', fecha_nac='$fecha'
															WHERE id_afiliado= $idafiliado ");
				
				if($sql_update){
					$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_afiliado(nombre, apellido, nro_doc, legajo, correo, domicilio, telefono, estado, idusuario, operacion, cuil, fecha_nac, sexo, dependencia) VALUES ('$nombre','$apellido','$documento','$legajo','$correo','$direccion','$telefono','$estado','$usuario_id','$operacion','$cuil','$fecha','$sexo','$depende')");
					$alert='<p class="msg_save">Afiliado actualizado correctamente.</p>';
					
				}else{
					$alert='<p class="msg_error">Error al actualizar el afiliado.</p>';
				}

			}


		}
		
	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_afiliado.php');
		mysqli_close($conection);
	}
	$idafiliado = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT a.id_afiliado, a.nombre, a.apellido, a.nro_doc, a.legajo, a.correo, a.domicilio, a.telefono, a.cuil, a.fecha_nac, a.sexo, d.nombre_dep, d.id_dependencia FROM afiliados a inner join dependencias d on a.dependencia=d.id_dependencia
									WHERE id_afiliado = $idafiliado and estado = 1 ");
	
	$result_sql = mysqli_num_rows($sql);
   
	if($result_sql == 0){
		header('Location: lista_afiliado.php');
	}else{
		$option = '';
		$op_sexo = '';
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$idafiliado  = $data['id_afiliado'];
			$nombre  = $data['nombre'];
			$apellido =$data['apellido'];
			$documento = $data['nro_doc'];
			$correo  = $data['correo'];
			$legajo = $data['legajo'];
			$direccion   = $data['domicilio'];
			$telefono     = $data['telefono'];
			$fecha = $data['fecha_nac'];
			$sexo=$data['sexo'];
			$depende=$data['nombre_dep'];
			$id_depende=$data['id_dependencia'];
			$cuil = $data['cuil'];	
			if($sexo=='Femenino'){
				$op_sexo = '<option value="'.$sexo.'" select>'.$sexo.'</option>';
			}else if($sexo=='Masculino'){
				$op_sexo = '<option value="'.$sexo.'" select>'.$sexo.'</option>';
			}


			if($id_depende == 1){
				$option = '<option value="'.$id_depende.'" select>'.$depende.'</option>';
			}else if($id_depende == 2){
				$option = '<option value="'.$id_depende.'" select>'.$depende.'</option>';
			}else if($id_depende == 3){
				$option = '<option value="'.$id_depende.'" select>'.$depende.'</option>';
			}else if($id_depende == 4){
				$option = '<option value="'.$id_depende.'" select>'.$depende.'</option>';
			}else if($id_depende == 5){
				$option = '<option value="'.$id_depende.'" select>'.$depende.'</option>';
			}else if($id_depende == 6){
				$option = '<option value="'.$id_depende.'" select>'.$depende.'</option>';
			}else if($id_depende == 7){
				$option = '<option value="'.$id_depende.'" select>'.$depende.'</option>';
			}else if($id_depende == 8){
				$option = '<option value="'.$id_depende.'" select>'.$depende.'</option>';
			}
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Modificar Afiliado</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Modificar Afiliado</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $idafiliado; ?>">
				<label for="nombre">Nombre(*)</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo $nombre; ?>">
				<label for="apellido">Apellido(*)</label>
				<input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $apellido; ?>">
				<label for="documento">DNI(*)</label>
				<input type="number" name="documento" id="documento" placeholder="Nro de documento" value="<?php echo $documento; ?>">
				<label for="telefono">Celular o teléfono(*)</label>
				<input type="number" name="telefono" id="telefono" placeholder="Telefono o Celular" value="<?php echo $telefono; ?>">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico" value="<?php echo $correo; ?>">
				<label for="legajo">Legajo</label>
				<input type="text" name="legajo" id="legajo" placeholder="legajo" value="<?php echo $legajo; ?>">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion" placeholder="Dirección competa" value="<?php echo $direccion; ?>">
				<label for="cuil">Cuil</label>
				<input type="text" name="cuil" id="cuil" placeholder="cuil" value="<?php echo $cuil; ?>">
				<label for="fecha">Fecha de Nacimiento</label>
				<input type="date" name="fecha" id="fecha" placeholder="Fecha de Nacimiento" value="<?php echo $fecha; ?>">
				<label for="list_sexo">Sexo(*): </label>
				<select name="sexo" id="sexo" class="notItemOne">
					<?php echo $op_sexo ?>;
					<option value="Femenino">Femenino</option>
					<option value="Masculino">Masculino</option>
				</select>
				<label for="$depende">Dependencia(*)</label>

				<?php 

					$query_dependencia = mysqli_query($conection,"SELECT * FROM dependencias");
					mysqli_close($conection);
					
					$result_depe = mysqli_num_rows($query_dependencia);

				 ?>

				<select name="depende" id="depende" class="notItemOne">

					<?php 
					echo $option; 
						if($result_depe > 0)
						{
							while ($result= mysqli_fetch_array($query_dependencia)) {
					?>
							<option value="<?php echo $result["id_dependencia"]; ?>"><?php echo $result["nombre_dep"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
				
				<input type="submit" value="Actualizar afiliado" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>