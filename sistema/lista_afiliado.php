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
		
		<h1><i class="fas fa-users"></i> Lista de Afiliados</h1>
		<a href="registro_afiliado.php" class="btn_new"><i class="fas fa-user-check"></i> Crear afiliado</a>
		
		<form action="buscar_afiliado.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
			
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
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM afiliados WHERE estado = 1 ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 20;

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
					<a class="link_edit" href="editar_afiliado.php?id=<?php echo $data["id_afiliado"]; ?>"><i class="far fa-edit"></i> Modificar</a>
					|
					<a class="link_delete" href="eliminar_confirmar_afiliado.php?id=<?php echo $data["id_afiliado"]; ?>"><i class="far fa-trash-alt"></i> Eliminar</a>
										
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