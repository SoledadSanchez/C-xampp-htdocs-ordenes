<?php 
	session_start();
	
	include "../conexion.php";	

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Afiliados</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg" sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<?php 

			$busqueda = strtolower($_REQUEST['busqueda']);
			if(empty($busqueda))
			{
				header("location: lista_afiliado.php");
				mysqli_close($conection);
			}


		 ?>
		
		<h1>Lista de Afiliados</h1>
		<a href="registro_afiliado.php" class="btn_new">Crear afiliado</a>
		
		<form action="buscar_afiliado.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>Legajo</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Documento</th>
				<th>Correo</th>
				<th>Celular</th>
				<th>Direccion</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM afiliados 
																WHERE ( legajo LIKE '%$busqueda%' OR 
																		nombre LIKE '%$busqueda%' OR 
																		apellido LIKE '%$busqueda%' OR 
																		nro_doc LIKE '%$busqueda%' ) 
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

			$query = mysqli_query($conection,"SELECT * FROM afiliados WHERE 
										( apellido LIKE '%$busqueda%' OR 
											nombre LIKE '%$busqueda%' OR 
											legajo LIKE '%$busqueda%' OR 
											documento LIKE '%$busqueda%' ) 
										AND	estado = 1 ORDER BY apellido ASC LIMIT $desde,$por_pagina ");
			
			$result = mysqli_num_rows($query);
			mysqli_close($conection);
			
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data['id_afiliado'] ?></td>
					<td><?php echo $data["legajo"]; ?></td>
					<td><?php echo $data["nombre"]; ?></td>
					<td><?php echo $data["apellido"]; ?></td>
					<td><?php echo $data["nro_doc"]; ?></td>
					<td><?php echo $data["correo"]; ?></td>
					<td><?php echo $data['celular'] ?></td>
					<td><?php echo $data['direccion'] ?></td>
					<td>
						<a class="link_edit" href="editar_afiliado.php?id=<?php echo $data["id_afiliado"]; ?>">Editar</a>

					<?php if($data["idusuario"] != 1){ ?>
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