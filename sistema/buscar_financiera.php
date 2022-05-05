<?php 
	session_start();
	
	include "../conexion.php";	

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Financieras</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<?php 

			$busqueda = strtolower($_REQUEST['busqueda']);
			if(empty($busqueda))
			{
				header("location: lista_financiera.php");
				mysqli_close($conection);
			}


		 ?>
		
		<h1>Lista de Financieras</h1>
		<a href="registro_financiera.php" class="btn_new">Crear financiera</a>
		
		<form action="buscar_financiera.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>ID</th>
				<th>Razón Socia</th>
				<th>CUIL</th>
				<th>Correo</th>
				<th>Teléfono</th>
				<th>Dirección</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM financieras 
																WHERE ( nombre LIKE '%$busqueda%' OR 
																		cuil LIKE '%$busqueda%' ) 
																AND estado = 1  ");

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

			$query = mysqli_query($conection,"SELECT * FROM financieras WHERE 
										( 	nombre LIKE '%$busqueda%' OR 
											cuil LIKE '%$busqueda%' ) 
										AND	estado = 1 ORDER BY nombre ASC LIMIT $desde,$por_pagina ");
			
			$result = mysqli_num_rows($query);
			mysqli_close($conection);
			
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					
					<td><?php echo $data["id_financiera"]; ?></td>
					<td><?php echo $data["nombre"]; ?></td>
					<td><?php echo $data["cuil"]; ?></td>
					<td><?php echo $data["correo"]; ?></td>
					<td><?php echo $data["telefono"] ?></td>
					<td><?php echo $data["domicilio"] ?></td>
					<td>
						<a class="link_edit" href="editar_financiera.php?id=<?php echo $data["id_financiera"]; ?>">Editar</a>

					<?php if($_SESSION['rol'] == 1){ ?>
						|
						<a class="link_delete" href="eliminar_confirmar_financiera.php?id=<?php echo $data["id_financiera"]; ?>">Eliminar</a>
					<?php } ?>
						
					</td>
				</tr>
			
		<?php 
				}

			}
		 ?>


		</table>
<?php 
	
	if($total_registro != 0)
	{
 ?>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> ">>|</a></li>
			<?php } ?>
			</ul>
		</div>
<?php } ?>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>