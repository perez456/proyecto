<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registro</title>
		<script src="https://kit.fontawesome.com/3754d2d4da.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="estilos.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous
			</head>

	<body>
		<div class="contenedor">
			<form  class="formulario" action="controllers/users_controller.php" method="post" enctype="application/x-www-form-urlencoded">
				<img  src="../images/Recurso_2.png" href="#" height="68,00px" width="270px">
				<legend class="input-contenedor">Registrarse</legend>

				<div class="form-group">
				     <!–Id Usuario–>
				    <input type="hidden" class="form-control" id="id" name="id" autofocus required>
				</div>

				<div class="input-group input-group-sm mb-3">
				  <input type="text" class="form-control" id="nombreCli" name="nombreCli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nombre*" required autofocus>
				</div>

				<div class="input-group input-group-sm mb-3">
				  <input type="text" class="form-control" id="apellidoCli" name="apellidoCli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Apellido*" required autofocus>
				</div>

				<div class="input-group input-group-sm mb-3">
				  <input type="text" class="form-control" id="documentoCli" name="documentoCli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Documento*" required autofocus>
				</div>
				
				<select class="form-control" id="tipoDocumentoCli" name="tipoDocumentoCli" required>
					<option value="vacio">Tipo de Documento</option>
					<option value="tarjeta de identidad">Tarjeta de Identidad</option>
					<option value="cedula">Cedula</option>
					<option value="cedula de extranjeria">Cedula de Extranjeria</option>
				</select>  

				<p></p>

				<div class="input-group input-group-sm mb-3">
				  <input type="text" class="form-control" id="direccionCli" name="direccionCli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Dirección*" required autofocus>
				</div>

				<div class="input-group input-group-sm mb-3">
				  <input type="text" class="form-control" id="telefonoCli" name="telefonoCli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Teléfono*" required autofocus>
				</div>

				<div class="input-group input-group-sm mb-3">
				  <input type="text" class="form-control" id="email" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Correo*" required autofocus>
				</div>

				<div class="input-group input-group-sm mb-3">
				    <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña*" required>
				    <br><br>
				    <input type="checkbox" class="button" onclick="myFunction()">
				    <script>	
				      function myFunction() {
				      var x = document.getElementById("clave");
				      if (x.type === "password") {
				       x.type = "text";
				      } else {
				      x.type = "password";
				      }
				    }
				    </script>
				</div>

				<input type="submit" value="Registrarse" class="button" name="create">
				<p></p>
					<p>Al registrarte aceptas los <a class="link" href="https://minciencias.gov.co/ciudadano/terminosycondiciones-datospersonales">terminos y condiciones</a> sobre uso de datos.</p>

					<p>¿Ya tienes una cuenta? <a class="link" href="index.php">Iniciar Sesión</a></p>
			</form>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<br>
	</body>
</html>