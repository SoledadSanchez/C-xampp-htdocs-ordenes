<?php 
	include "../conexion.php";
	session_start();
		
	
	
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellido']) ||  empty($_POST['documento']) ||  empty($_POST['telefono'])|| empty($_POST['legajo'])|| empty($_POST['fecha_nac'])|| empty($_POST['sexo'])|| empty($_POST['dependencia']))
		{
			$alert='<p class="msg_error">Los campos con asterisco son obligatorios.</p>';
		}else{

			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$documento = $_POST['documento'];
			$email  = $_POST['correo'];
			$telefono   = $_POST['telefono'];
			$direccion  = $_POST['direccion'];
			$legajo    = $_POST['legajo'];
			$fecha = $_POST['fecha_nac'];
			$sexo=$_POST['sexo'];
			$depende=$_POST['dependencia'];
			$cuil = $_POST['cuil'];

			$usuario_id=$_SESSION['idUser'];

			$result = 0;
			$operacion='A';
			$estado = 1;
			if (is_numeric($documento) and $documento != 0){
				$query = mysqli_query($conection,"SELECT * FROM afiliados WHERE nro_doc = '$documento'");
				$result = mysqli_fetch_array($query);
			}

			if($result>0) {
				$alert='<p class="msg_error">El nro de documento ya existe.</p>';
			}else {
				$query_insert = mysqli_query($conection,"INSERT INTO afiliados(nombre, apellido, nro_doc, legajo, correo, domicilio, telefono, cuil, fecha_nac, sexo, dependencia) VALUES ('$nombre','$apellido','$documento','$legajo','$email','$direccion','$telefono','$cuil','$fecha','$sexo','$depende')");

				if($query_insert){
					$query_insert_aud = mysqli_query($conection,"INSERT INTO aud_afiliado(nombre, apellido, nro_doc, legajo, correo, domicilio, telefono, estado, idusuario, operacion, cuil, fecha_nac, sexo, dependencia) VALUES ('$nombre','$apellido','$documento','$legajo','$email','$direccion','$telefono','$estado','$usuario_id','$operacion','$cuil','$fecha','$sexo','$depende')");
					$alert='<p class="msg_save">Afiliado creado correctamente.</p>';
					
					
					
				}else{
					$alert='<p class="msg_error">Error al crear el afiliado.</p>';
				}
			}
			
		}
		mysqli_close($conection);

	}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro Afiliado</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1><i class="fas fa-user-check"></i> Registro de Afiliado</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nombre">Nombre(*)</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo">
				<label for="apellido">Apellido(*)</label>
				<input type="text" name="apellido" id="apellido" placeholder="Apellido">
				<label for="documento">DNI(*)</label>
				<input type="number" name="documento" id="documento" placeholder="Nro de documento">
				<label for="telefono">Celular o teléfono(*)</label>
				<input type="number" name="telefono" id="telefono" placeholder="Telefono o Celular">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico">
				<label for="legajo">Legajo(*)</label>
				<input type="text" name="legajo" id="legajo" placeholder="legajo">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion" placeholder="Dirección competa">
				<label for="cuil">CUIL</label>
				<input type="text" name="cuil" id="cuil" placeholder="CUIL">
				<label for="fecha_nac">Fecha de Nacimiento(*)</label>
				<input type="date" name="fecha_nac" id="fecha_nac" placeholder="Fecha de Nacimiento">
				<label for="list_sexo">Sexo(*): </label>
					<select name="sexo" id="sexo">
					<option value="Femenino">Femenino</option>
					<option value="Masculino">Masculino</option>
					
					</select>
				<label for="rol">Dependencia(*)</label>

				<?php 

					$query_dependencia = mysqli_query($conection,"SELECT * FROM dependencias");
					mysqli_close($conection);
					$result_depe = mysqli_num_rows($query_dependencia);

				 ?>

				<select name="dependencia" id="dependencia">
					<?php 
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
				
				
									
				<button type="submit" class="btn_save"><i class="fas fa-save"></i> Crear afiliado</button>

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>