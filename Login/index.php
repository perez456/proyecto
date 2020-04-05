<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Iniciar Sesión</title>
		<script src="https://kit.fontawesome.com/3754d2d4da.js" crossorigin="anonymous"></script>
		<script type="js/bootstrap.js"></script>
		<link rel="stylesheet" href="estilos.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body>


		<form class="formulario" action="validar.php" method="post" enctype="application/x-www-form-urlencoded">
			<img  src="../images/Recurso_2.png" href="#" height="68,00px" width="270px">
			<legend  class="input-contenedor">Iniciar Sesión</legend>

			<br>

			<div class="input-group input-group-sm mb-3">
				<input type="text" class="form-control" id="email" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Correo Electrónico" required autofocus>
			</div>

			<div class="input-group input-group-sm mb-3">
				<input type="password" class="form-control" id="clave" name="clave" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Contraseña" required autofocus>
			</div>

			

			<input onclick="inicio.php" type="submit" class="button" value="Iniciar Sesión">
			<p></p>
			<p>¿Aún no tienes cuenta?<a href="registrar.php" onclick="registrar()"> Registrate</a>
				
				<script type="text/javascript">
					function registrar(){
						window.location="registrar.php";
					}
				</script>
		</form>	
	</body>
</html>