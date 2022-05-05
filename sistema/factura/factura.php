<?php 
	
	$total 		= 0;
 //print_r($configuracion); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Órden de compra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php echo $anulada; ?>
<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					<img src="img/apunju.png">
				</div>
			</td>
			<!--<td class="info_empresa">
				<?php
					//if($result_config > 0){
						
				 ?>
				<div>
					<span class="h2"><?php // echo strtoupper($configuracion['nombre']); ?></span>
					<p><?php //echo $configuracion['razon_social']; ?></p>
					<p>CUIT: <?php //echo $configuracion['cuit']; ?></p>
					<p><?php //echo $configuracion['direccion']; ?></p>	
					<p>Email: <?php //echo $configuracion['email']; ?></p>
				</div>
				<?php
					//}
				 ?>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">ÓRDEN</span>
					<p>No. DE ORDEN: <strong><?php// echo $factura['id_orden']; ?></strong></p>
					<p>Fecha: <?php// echo $factura['fecha']; ?></p>
					<p>Hora: <?php// echo $factura['hora']; ?></p>
					<p>Generada por: <?php //echo $factura['vendedor']; ?></p>
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Afiliado</span>
					<table class="datos_cliente">
						<tr>
							<td><label>Id_afiliado:</label><p><?php //echo $factura['id_afiliado']; ?></p></td>
							
						</tr>
						<tr>
							<td><label>Nombre:</label> <p><?php //echo $factura['nombre']; ?></p></td>
							<td><label>Dirección:</label> <p><?php //echo $factura['domicilio']; ?></p></td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="50px">Monto</th>
					<th class="textleft">Nro de cuotas</th>
					<th class="textright" width="150px">Importe por cuota</th>
					<th class="textright" width="150px"> Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">

			<?php

				//if($result_detalle > 0){

					//while ($row = mysqli_fetch_assoc($query_productos)){
			 ?>
				<tr>
					<td class="textcenter"><?php //echo $row['monto']; ?></td>
					<td><?php// echo $row['n_cuotas']; ?></td>
					<td class="textright"><?php //echo $row['importe_cuota']; ?></td>
					<td class="textright"><?php //echo $row['precio_total']; ?></td>
				</tr>
			<?php
						//$total = $row['precio_total'];
						
					//}
				//}

				
			?>
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>TOTAL Q.</span></td>
					<td class="textright"><span><?php// echo $total; ?></span></td>
				</tr>
		</tfoot>-->
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
		<h4 class="label_gracias">¡Gracias por confiar en APUNJu!</h4>
	</div>

</div>

</body>
</html>