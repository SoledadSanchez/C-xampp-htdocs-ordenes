<?php 
	session_start();
	include "../conexion.php";	

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Órdenes</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1>Lista de Órdenes</h1>
		<a href="registro_afiliado.php" class="btn_new">Crear Órden</a>
		
		<form action="buscar_oc.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>Nro Órden</th>
				<th>Afiliado</th>
				<th>Financiera</th>
				<th>Monto</th>
				<th>Nro de cuotas</th>
				<th>Fecha Alta</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM ordenes WHERE estado != 0 ");
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

			$query = mysqli_query($conection,"SELECT * FROM ordenes WHERE estado != 0 ORDER BY nro_orden ASC LIMIT $desde,$por_pagina 
				");

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

					$id_orden=$data["id_orden"];
					
			?>
				<tr>
					<td><?php echo $data["nro_orden"]; ?></td>
					<td><?php 
						$id_afiliado = $data["id_afiliado"];
						$query_afiliado = mysqli_query($conection,"SELECT * FROM afiliados WHERE id_afiliado= '$id_afiliado'");
						$afiliado = mysqli_fetch_array($query_afiliado);
						echo $afiliado["apellido"].', '. $afiliado["nombre"]
					 ?></td>
					<td><?php 
					     $id_financiera = $data["id_financiera"]; 
						$query_financiera = mysqli_query($conection,"SELECT * FROM financieras WHERE id_financiera= '$id_financiera'");
						  $financiera = mysqli_fetch_array($query_financiera);
						   echo $financiera["nombre"];
						   
					 ?></td>
					<td><?php echo '$' . $data["monto"]; ?></td>
					<td><?php echo $data["n_cuotas"]; ?></td>
					<td><?php echo $data["fecha_alta"] ?></td>
					<td> <?php 
					     $estado = $data["estado"]; 
						 if ($estado==1){
						 	echo "Pendiente";
						 	} else {
						 		if ($estado==2){
						 			echo "Autorizado";
						 		};
						 	};						  
					     ?></td>
					
					<td>
					
					<a class="link_edit" href="editar_oc.php?id=<?php echo $id_orden; ?>">Modificar</a>


					<?php if($_SESSION['rol'] == 1){ ?>

						|
						<a class="link_delete" href="anular_confirmar_oc.php?id=<?php echo $data["id_orden"] ?>">Anular</a>
						|
						<a class="link_autorizar" href="editar_autorizar_oc.php?id=<?php echo $data["id_orden"]; ?>">Autorizar</a>
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