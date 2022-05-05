<?php 
	session_start();
	include "../conexion.php";

	$busqueda='';
	$fecha_de='';
	$fecha_a='';

	if( isset($_REQUEST['busqueda']) && $_REQUEST['busqueda'] =='' ){
		header("location: listado_fechas1.php");
	}

	if( isset($_REQUEST['fecha_a'])  )
	{
		if( $_REQUEST['fecha_a'] == '')
		{
			header("location: listado_fechas1.php");
		}
	}


			
	if(!empty($_REQUEST['busqueda'])){
		if(!is_numeric($_REQUEST['busqueda'])){
			header("location: listado_fechas1.php");
		}
		$busqueda = strtolower($_REQUEST['busqueda']);
		$where = "id_orden = $busqueda";
		$buscar = "busqueda = $busqueda";		
	}
	//para buscar en un periodo de tiempo
	if(!empty($_REQUEST['fecha_de']) && !empty($_REQUEST['fecha_a'])){
		$fecha_de=$_REQUEST['fecha_de'];
		$fecha_a=$_REQUEST['fecha_a'];

		$buscar ='';

		if($fecha_de > $fecha_a){
			header("location: listado_fechas1.php");
		}else if ($fecha_de == $fecha_a){
			$where="fecha_alta LIKE '$fecha_de%'";
			$buscar= "fecha_de=$fecha_de&fecha_a=$fecha_a";
		} else{
			$f_de = $fecha_de.' 00:00:00';
			$f_a = $fecha_a.' 23:59:59';
			$where = "fecha_alta BETWEEN '$f_de' AND '$f_a'";
			$buscar = "fecha_de=$fecha_de&fecha_a=$fecha_a";
		}
	}
	//para buscar con fecha hasta unicamente
	if (empty($_REQUEST['fecha_de'])){
			$fecha_de='';
			$fecha_a=$_REQUEST['fecha_a'];

			$buscar ='';

			
			$f_a = $fecha_a.' 23:59:59';
			$where = "fecha_alta <='$f_a'";
			$buscar = "fecha_a=$fecha_a";
		}
		
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>

	<title>Órdenes entre fechas</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1><i class="fas fa-bars"></i> Órdenes entre fechas</h1>
		<a href="registro_oc.php" class="btn_new"><i class="fas fa-money-check-alt"></i> Crear orden</a>
		
		<form action="buscar_ordenes.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Nro. órden" value="<?php echo $busqueda; ?>">
			
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>
		<div>
			<h5>Buscar entre fechas</h5>
			<form action="buscar_ordenes.php" method="get" class="form_search_date">
				<label>Desde: </label>
				<input type="date" name="fecha_de" id="fecha_de" value="<?php echo $fecha_de; ?>" >
				<label>Hasta: </label>
				<input type="date" name="fecha_a" id="fecha_a" value="<?php echo $fecha_a; ?>" required>
				<button type="submit" class="btn_view"> <i class="fa fa-search"></i></button>
			</form>
		</div>

		<table>
			<tr>
				<th>Nro orden</th>
				<th>Afiliado</th>
				<th>fecha</th>
				<th>Importe Cuota</th>				
				<th>Cuota a Pagar</th>
				<th>Financiera </th>
				<th>Acciones</th>
			</tr>
		<?php 
		$total_a_pagar=0;

			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM ordenes WHERE $where and estado ='Autorizada' ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];
			

			$por_pagina = 2;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT o.id_orden, a.apellido, a.nombre, DATE_FORMAT(o.fecha_alta, '%d/%m/%Y') as fecha, o.monto, o.n_cuotas, o.estado, o.id_financiera FROM ordenes o inner join afiliados a on a.id_afiliado = o.id_afiliado WHERE $where and o.estado ='Autorizada' ORDER BY a.nombre ASC LIMIT $desde,$por_pagina ");

			

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["id_orden"]; ?></td>
					<td><?php echo $data["apellido"].', '.$data["nombre"]; ?></td>
					<td><?php echo $data["fecha"] ?></td>
					<td><?php 
							$id_orden = $data["id_orden"];
							$query_importe = mysqli_query($conection,"SELECT distinct importe_cuota FROM pagos_oc WHERE estado =2 and id_orden= '$id_orden' ");
							$cuota = mysqli_fetch_array($query_importe);
						   echo $cuota["importe_cuota"];
						   $importe=$cuota["importe_cuota"];
						    $total_a_pagar= $total_a_pagar + $importe;
						?>
						   	
					</td>
					
					<td><?php 
						$id_orden = $data["id_orden"];
						$query_pago = mysqli_query($conection,"SELECT min(nro_cuota) FROM pagos_oc WHERE estado =2 and id_orden= '$id_orden' ");
						$cuota = mysqli_fetch_array($query_pago);
						   echo   $cuota["min(nro_cuota)"]." / ".$data["n_cuotas"];

					?></td>
					<td><?php 
					     $id_financiera = $data["id_financiera"]; 
						$query_financiera = mysqli_query($conection,"SELECT * FROM financieras WHERE id_financiera= '$id_financiera'");
						  $financiera = mysqli_fetch_array($query_financiera);
						   echo $financiera["nombre"];
					 ?></td>
							
					<td>
						<div class="div_acciones">
							<button class="btn_view view_orden" type="button" cl="<?php echo $data["id_orden"]; ?>"><i class="fas fa-eye"></i></button>

							<?php if($_SESSION['rol'] == 1){ ?>
							<div class="div_orden">	

								<button  class="btn_anular anular_oc" type="button" oc="<?php echo $data["id_orden"]; ?>"><i class="fas fa-ban"></i></button>
							</div>	
							<?php }else{ ?>
							<div class="div_orden">
								<button type="button" class="btn_anular inactive"><i class="fas fa-ban"></i></button>
							</div>	
							<?php }
							
							?>
						</div>
						
						
					</td>
				</tr>
			
		<?php 
				 
				}

			}
		 ?>

		</table>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>&<?php echo $buscar; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>&<?php echo $buscar; ?>"><<</a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'&'.$buscar.'">'.$i.'</a></li>';
					}
				}
				if($pagina == $total_paginas)
				{?>
					<p colspan="5" class="textright"> TOTAL A PERCIBIR $</p>
					<li class="textright"><?php echo $total_a_pagar; ?></li>
				<?php
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>&<?php echo $buscar; ?>">>></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?>&<?php echo $buscar; ?>">>|</a></li>
			
			<?php } 
				
			?>
			</ul>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
	
</body>
</html>