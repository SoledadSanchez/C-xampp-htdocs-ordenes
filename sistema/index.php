<?php 

if(!isset($_SESSION)){

 session_start();

}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>APUNJU</title>
	<link rel="icon" href="../imagenes/apunju2.jpg" type="image/jpeg"
sizes="24x16">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="divContainer">
			<div>
				<h1 class="titlePanelControl"> Panel de Control</h1>
				<div class="dashboard">
					<a href="lista_usuarios.php">
						<i class="fas fa-users"></i>
						<p>
							<strong>Usuarios</strong><br>
							<span>40</span>
						</p>
					</a>
				
					<a href="lista_afiliado.php">
						<i class="far fa-id-card"></i>
						<p>
							<strong>Afiliados</strong><br>
							<span>140</span>
						</p>
					</a>
				
					<a href="lista_financiera.php">
						<i class="fas fa-city"></i>
						<p>
							<strong>Financieras</strong><br>
							<span>2</span>
						</p>
					</a>


					<a href="listado_fechas1.php">
						<i class="fas fa-money-check-alt"></i>
						<p>
							<strong>Ordenes</strong><br>
							<span>240</span>
						</p>
					</a>
				
					<a href="listado_fechas1.php">
						
						<i class="fas fa-hand-holding-usd"></i>
						<p>
							<strong>Dinero Otorgado</strong><br>
							<span>$240.000</span>
						</p>
					</a>
				</div>
			</div>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>