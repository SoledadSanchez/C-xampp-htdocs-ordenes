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
			<h1> <i class="fas fa-money-check-alt"></i> Registro Cuotas de Financiera</h1>
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
						<label>Acciones</label>
						<div id="acciones_orden">
							<a href="#" class="btn_cancel textcenter" id="btn_anular"> <i class="fas fa-ban"></i> Anular</a>
							<a href="#" class="btn_new textcenter" id="btn_generar"> <i class="fas fa-edit"></i> Guardar</a>
							<a href="#" class="btn_new btn_muestra_cuota textcenter" id="muestra_cuota"> <i class="far fa-eye"></i> Ver Cuota</a>
						</div>				
				</div>	
			</form>				
		</div>
		
<br>
		<!–– detalle del monto a obtener -->
		<table class="tbl_venta">
			<thead>
				<tr>
					<th>Código</th>
					<th>Total</th>
					<th>Cantidad de cuotas</th>
					<th>Importe por cuota</th>
					<th>Acción</th>				
				</tr>
				<tr id="detallecuotas">					
					
					<td><input type="text" name="text_cod_cuota" id="text_cod_cuota" class="add_cuota" disabled></td>
					<td><input type="number" name="text_total" id="text_total" type="number" step="any" class="add_cuota"></td>
					<td><input type="number" name="text_cant_cuotas" id="text_cant_cuotas" value="0" min="1" class="add_cuota"></td>
					<td><input type="number" name="text_importe" id="text_importe" step="any" ></td>
					<td><a  href="#" id="add_cuota_financiera" class="link_add"><i class="fas fa-plus"> Agregar</i></a>
					</td>			
					
				</tr>
				<tr>
					<th>Código</th>
					<th>Total a prestar</th>
					<th>Cantidad de cuotas</th>
					<th>Importe por cuota</th>
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
