<?php 
	session_start();
	include "../conexion.php";	

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
		
		<h1> <i class="fas fa-bars"></i> Órdenes entre fechas</h1>
		<a href="registro_oc.php" class="btn_new"><i class="fas fa-money-check-alt"></i> Crear orden</a>
		
		<form action="buscar_orden.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Nro de órden">
			<input type="submit" value="Buscar" class="btn_search">
		</form>
		<div>
			<h5>Buscar entre fechas</h5>
			<form action="buscar_ordenes.php" method="get" class="form_search_date">
				<label>Desde: </label>
				<input type="date" name="fecha_de" id="fecha_de" required>
				<label>Hasta: </label>
				<input type="date" name="fecha_a" id="fecha_a" required>
				<button type="submit" class="btn_view"> <i class="fa fa-search"></i></button>
			</form>
		</div>

		<table>
			<tr>
				<th>nro orden</th>
				<th>afiliado</th>
				<th>monto</th>
				<th>fecha</th>
				<th>nro cuotas</th>
				<th>
					<?php 

						$query_financiera = mysqli_query($conection,"SELECT id_financiera, nombre FROM financieras where estado = 1 order by nombre asc");
						
						$result_financiera = mysqli_num_rows($query_financiera);
					?>

					<select name="financiera" id="search_financiera">
						<option value="" selected>Financiera</option>
						<?php 
							if($result_financiera > 0)
							{
								while ($financiera = mysqli_fetch_array($query_financiera)) {
						?>
								<option value="<?php echo $financiera["id_financiera"]; ?>"><?php echo $financiera["nombre"] ?></option>
						<?php 
									# code...
								}
								
							}
						 ?>
					</select>
				</th>
				<th>
					<select name="estado" id="search_estado">
						<option value="" selected>Estado</option>
						<option value="Pendiente">Pendiente</option>
						<option value="Autorizada">Autorizada</option>
						<option value="Cancelada">Cancelada</option>
					</select>
				</th>
				<th>Acciones</th>
			</tr>
		 
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM afiliados WHERE estado = 1 ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 5;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT * FROM afiliados WHERE estado = 1 ORDER BY apellido ASC LIMIT $desde,$por_pagina 
				");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["legajo"]; ?></td>
					<td><?php echo $data["nombre"]; ?></td>
					<td><?php echo $data["apellido"]; ?></td>
					<td><?php echo $data["nro_doc"]; ?></td>
					<td><?php echo $data["correo"]; ?></td>
					<td><?php echo $data["telefono"] ?></td>
					<td><?php echo $data["domicilio"] ?></td>
					<td>
					<a class="link_edit" href="editar_afiliado.php?id=<?php echo $data["id_afiliado"]; ?>">Modificar</a>

					<?php if($_SESSION['rol'] == 1){ ?>

						|
						<a class="link_delete" href="eliminar_confirmar_afiliado.php?id=<?php echo $data["id_afiliado"]; ?>">Eliminar</a>
					<?php } ?>
									
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
				<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
			<?php } ?>
			</ul>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>