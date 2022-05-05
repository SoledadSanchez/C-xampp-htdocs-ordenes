<?php
 
	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
	session_start();
	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}

	include "../../conexion.php";
	require_once '../pdf/vendor/autoload.php';
	use Dompdf\Dompdf;

	if(empty($_REQUEST['cl']) || empty($_REQUEST['f']))
	{
		echo "No es posible generar la orden.";
	}else{
		$codCliente = $_REQUEST['cl'];
		$noFactura = $_REQUEST['f'];
		$anulada = '';

		$query_config   = mysqli_query($conection,"SELECT * FROM configuracion");
		$result_config  = mysqli_num_rows($query_config);
		if($result_config > 0){
			$configuracion = mysqli_fetch_assoc($query_config);
		}


		$query = mysqli_query($conection,"SELECT f.id_orden, DATE_FORMAT(f.fecha_alta, '%d/%m/%Y') as fecha, DATE_FORMAT(f.fecha_alta,'%H:%i:%s') as  hora, f.id_afiliado, f.estado,
												 v.nombre as vendedor,
												 cl.id_afiliado, cl.nombre, cl.domicilio
											FROM ordenes f
											INNER JOIN usuario v
											ON f.id_usuario = v.idusuario
											INNER JOIN afiliados cl
											ON f.id_afiliado = cl.id_afiliado
											WHERE f.id_orden = $noFactura AND f.id_afiliado = $codCliente  AND f.estado != 'Baja'");

		$result = mysqli_num_rows($query);
		if($result > 0){

			$factura = mysqli_fetch_assoc($query);
			$no_factura = $factura['id_orden'];

			if($factura['estado'] == 'Cancelada'){
				$anulada = '<img class="anulada" src="img/anulado.png" alt="Anulada">';
			}

			$query_productos = mysqli_query($conection,"SELECT f.monto,f.n_cuotas,f.id_cuota,dt.importe_cuota,(f.n_cuotas * dt.importe_cuota) as precio_total FROM ordenes f
														INNER JOIN pagos_oc dt
														ON f.id_orden = dt.id_orden
														WHERE f.id_orden = $no_factura");
			
			$result_detalle = mysqli_num_rows($query_productos);
			
			// instantiate and use the dompdf class
			$dompdf = new Dompdf();
			ob_start();
		    include(dirname('__FILE__').'/factura.php');
		    $html = ob_get_clean();

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			//ro agregado ob_get_clean();
			ob_get_clean();			
			$dompdf->stream('factura_.pdf',array('Attachment'=>0));
			exit;
		}
	}

?>