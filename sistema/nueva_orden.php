<?php

	include "../conexion.php";
if(!isset($_SESSION)){

 session_start();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	

	<title>Nueva órden</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg"
sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	
	<section id=container>
		<div class="title_page">
			<h1> <i class="fas fa-money-check-alt"></i> Nueva órden</h1>
		</div>
		<div class="datos_cliente">
			<div class="action_cliente">
				<h4>Datos Afiliado</h4>
				<a href="#" class="btn_new btn_new_cliente"><i class="fas fa-user-check"></i> Nuevo Afiliado</a>				
			</div>
			<form name="form_new_cliente_orden" id="form_new_cliente_orden" class="datos">
				<input type="hidden" name="action" value="addAfiliado">
				<input type="hidden" id="idAfiliado"   name="idAfiliado" value="" required>
				<div class="wd30">
					<label>Nro Documento</label>
					<input type="text" name="nit_documento" id="nit_documento">
				</div>
				<div class="wd30">
					<label>Nombre</label>
					<input type="text" name="nom_afiliado" id="nom_afiliado" disabled required>
				</div>
				<div class="wd30">
					<label>Apellido</label>
					<input type="text" name="apellido_afiliado" id="apellido_afiliado" disabled required>
				</div>
				<div class="wd30">
					<label>Legajo</label>
					<input type="num" name="leg_afiliado" id="leg_afiliado" disabled required>
				</div>
				<div class="wd30">
					<label>Fecha Nac</label>
					<input type="date" name="fecha_afiliado" id="fecha_afiliado" disabled required>
				</div>
				<div class="wd30">
					<label>Telefono</label>
					<input type="text" name="tel_afiliado" id="tel_afiliado" disabled required>
				</div>
				<div class="wd100">
					<label>Dirección</label>
					<input type="text" name="dir_afiliado" id="dir_afiliado" disabled required>
				</div>
				<div class="wd30">
					<label for="list_sexo">Sexo: </label>
					<select name="sexo" id="sexo" disabled required>
					<option value="Femenino">Femenino</option>
					<option value="Masculino">Masculino</option>					
					</select>
				</div>
				<div class="wd30">
					<label for="dependencia">Dependencia</label>

					<?php 

						$query_dependencia = mysqli_query($conection,"SELECT * FROM dependencias");
						
						$result_depe = mysqli_num_rows($query_dependencia);

					 ?>

					<select name="dependencia" id="dependencia" disabled required>
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
				</div>

				<div id="div_registro_cliente" class="wd100">
					<button type="submit" class="btn_save"><i class="fas fa-save"></i> Guardar
					</button>					
				</div>
			</form>
		</div>

		<!–– parte de financieras -->
		

		<div class="datos_financiera" >
			<h4>Datos Financiera</h4>
			<form name="form_financiera" id="form_financiera" class="datos">	
				<input type="hidden" id="idFinanciera"   name="idFinanciera" value="" required>
				<div class="wd30">
					<label>Cuit</label>
					<input type="text" name="nit_cuit" id="nit_cuit">
				</div>
				<div class="wd30">
					<label>Razón Social</label>
					<input type="text" name="nom_financiera" id="nom_financiera" disabled required>
				</div>
				<div class="wd30">
					<label>Telefono</label>
					<input type="text" name="tel_financiera" id="tel_financiera" disabled required>
				</div>
				<div class="wd100">
					<label>Dirección</label>
					<input type="text" name="dir_financiera" id="dir_financiera" disabled required>
				</div>
				<div class="wd50">
					<label>Genera órden:</label>
					<p><?php  
					  $id_user=$_SESSION["idUser"];
					  $query_usuario = mysqli_query($conection,"SELECT * FROM usuario where idusuario=$id_user");
					
					$usuarios = mysqli_fetch_array($query_usuario);
					$apellido_user=$usuarios["apellido"];
					echo $_SESSION["idUser"]." - ".$_SESSION["nombre"]." "."$apellido_user" ;?>
						
					</p>
				</div>
				<div class="wd50">
						<label>Acciones</label>
						<div id="acciones_orden">
							<a href="#" class="btn_cancel textcenter" id="btn_anular"> <i class="fas fa-ban"></i> Anular</a>
							<a href="#" class="btn_new textcenter" id="btn_generar"> <i class="fas fa-edit"></i> Generar</a>
							<a href="#" class="btn_new btn_muestra_cuota textcenter" id="muestra_cuota"> <i class="far fa-eye"></i> Ver Cuota</a>
						</div>				
				</div>	
			</form>				
		</div>
		
<br>
		<!–– detalle del monto a obtener -->
			<div><input type="hidden" id="text_cod_cuota"   name="text_cod_cuota" value="" required></div>
		<table class="tbl_venta">
			<thead>
				<tr>
					<th>Monto</th>
					<th>Interes</th>
					<th>Cantidad de cuotas</th>
					<th>Importe por cuota</th>
					<th>Acción</th>				
				</tr>
				<tr id="detalleOrden">
					<td><input type="text" name="text_monto" id="text_monto"></td>
					<td id="text_interes">--</td>
					<td id="text_cant_cuotas">--</td>
					<td id="text_importe" disabled>--</td>
					<td><a  href="#" id="delete_cuota" class="link_delete"><i class="far fa-trash-alt"> Eliminar</i></a>
					</td>			
				</tr>
				<tr>
					<th>Codigo</th>
					<th>Interes</th>
					<th>Cantidad de cuotas</th>
					<th>Acción</th>			
				</tr>				
			</thead>
			<tbody id="detalleTabla">
				<!--contenido en ajax-->
			</tbody>	
			<tfoot>
				<tr>
					<!--<td colspan="2" class="textright"> TOTAL $</td>
					//<td class="textright">10000</td>-->
				</tr>
			</tfoot>

		</table>

	</section>
	


	<?php include "includes/footer.php"?>
</body>
</html>
