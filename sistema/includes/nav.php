		<nav>
			<ul>
				<li><a href="index.php"><i class="fas fa-home"></i>Inicio</a></li>
			<?php 
				if($_SESSION['rol'] == 1){
			 ?>
				<li class="principal">

					<a href="#"><i class="fas fa-users-cog"></i>Administración</a>
					<ul>
						<li><a href="registro_usuario.php"><i class="fas fa-user-plus"></i>Nuevo Usuario</a></li>
						<li><a href="lista_usuarios.php"><i class="fas fa-users"></i>Lista de Usuarios</a></li>
						<li><a href="#">Auditar ordenes</a></li>
						<li><a href="#">Auditar usuarios</a></li>
					</ul>
				</li>
			<?php } ?>
				<li class="principal">
					<a href="#"><i class="fas fa-user-friends"></i> Afiliados</a>
					<ul>
						<li><a href="registro_afiliado.php"><i class="fas fa-user-check"></i> Nuevo Afiliado</a></li>
						<li><a href="lista_afiliado.php"><i class="fas fa-users"></i> Lista de Afiliados</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#"><i class="far fa-building"></i> Financieras</a>
					<ul>
						<li><a href="registro_financiera.php"><i class="fas fa-user-tie"></i> Nueva Financiera</a></li>
						<li><a href="registro_cuotas.php"><i class="fas fa-user-tie"></i> Registro de Cuotas</a></li>
						<li><a href="lista_financiera.php"><i class="fas fa-city"></i> Lista de Financieras</a></li>
					</ul>
				</li>
				
				<li class="principal">
					<a href="#"><i class="fas fa-store"></i> Órdenes</a>
					<ul>
						<li><a href="registro_oc.php"><i class="fas fa-money-check-alt"></i> Nueva Órden</a></li>
						<li><a href="nueva_orden.php"><i class="fas fa-money-check-alt"></i> Nueva Órden 2</a></li>
						<li><a href="listado_ordenes.php"> <i class="fas fa-store"></i> Lista de Órdenes</a></li>
						<li><a href="listado_fechas1.php"> <i class="fas fa-bars"></i> Listado entre fechas</a></li>
					</ul>
				</li>
			</ul>
		</nav>