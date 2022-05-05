<?php 
	session_start();
	include "../conexion.php";	

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>

	<title>Lista de ordenes</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1><i class="fas fa-store"></i> Lista de ordenes</h1>
		<a href="registro_oc.php" class="btn_new"><i class="fas fa-money-check-alt"></i> Crear orden</a>
		
		<form action="buscar_oc1.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>

		<table>
			<tr>
				<th>nro orden</th>
				<th>afiliado</th>
				<th>monto</th>
				<th>fecha_alta</th>
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
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM ordenes WHERE estado !='Baja' ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];
			

			$por_pagina = 10;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT o.id_orden, a.apellido, a.nombre, DATE_FORMAT(o.fecha_alta, '%d/%m/%Y') as fecha, o.monto, o.n_cuotas, o.estado, o.id_financiera FROM ordenes o inner join afiliados a on a.id_afiliado = o.id_afiliado WHERE o.estado !='Baja' ORDER BY a.nombre ASC LIMIT $desde,$por_pagina ");

			

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["id_orden"]; ?></td>
					<td><?php echo $data["apellido"].', '.$data["nombre"]; ?></td>
					<td><?php echo '$'.$data["monto"]; ?></td>
					<td><?php echo $data["fecha"] ?></td>
					<td><?php echo $data["n_cuotas"] ?></td>
					<td><?php 
					     $id_financiera = $data["id_financiera"]; 
						$query_financiera = mysqli_query($conection,"SELECT * FROM financieras WHERE id_financiera= '$id_financiera'");
						  $financiera = mysqli_fetch_array($query_financiera);
						   echo $financiera["nombre"];
					 ?></td>
					<td><?php echo $data["estado"] ?></td>
					
					<td>
					<?php 
						if ($data["estado"]=="Pendiente"){ ?>
							<a class="link_edit" href="editar_oc.php?id=<?php echo $data["id_orden"]; ?>">Modificar</a>
							|
							<a class="link_autorizar" href="autorizar_oc.php?id=<?php echo $data["id_orden"]; ?>">Autorizar</a>
							|
							<?php
						} ?>

					 <?php if($_SESSION['rol'] == 1){ ?> 

						<?php if ($data["estado"]=="Pendiente"){ ?>
						<a class="link_delete" href="eliminar_confirmar_oc.php?id=<?php echo $data["id_orden"]; ?>">Eliminar</a>
						|
						<?php
						}	
						
					 } ?> 
					 <?php if ($data["estado"]=="Autorizada"){ ?>
						|
						<a class="link_autorizar" href="abonar_cuota.php?id=<?php echo $data["id_orden"]; ?>">Abonar</a>
						<?php
						}
					  ?>
									
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