 <?php
session_start();
?>


		<title>Check Login and create session</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	
	<body>
		<div class="container">
		
			<?php
			// Connection info. file
			include 'config/conexion.php';	
			
			// Connection variables
			$conexion = mysqli_connect($host, $user, $password, $dataBase);

			// Check connection
			if (!$conexion) {
				die("Conexión fallida: " . mysqli_connect_error());
			}

			// data sent from form index.php
			$email = $_POST['email']; 
			$clave = $_POST['clave'];
			
			// Query sent to database
			$result = mysqli_query($conexion, "SELECT usuarios.email, usuarios.clave, usuarios.cargo, cliente.nombreCli FROM cliente INNER JOIN usuarios ON cliente.id = usuarios.id WHERE email = '$email'");

			$result = mysqli_query($conexion, "SELECT usuarios.email, usuarios.clave, usuarios.cargo, empleado.nombreEmp FROM empleado INNER JOIN usuarios ON empleado.id = usuarios.id WHERE email = '$email'");
			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);

			
			
			
			// Variable $hash hold the password hash on database
			$hash = $row['clave'];
			
			/* 
			password_Verify() function verify if the password entered by the user
			match the password hash on the database. If everything is OK the session
			is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
			*/
			if (password_verify($_POST['clave'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['nombreCli'] = $row['nombreCli'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (1 * 60);						
				
				
				if($row['cargo'] === "1"){
					header("Location:../mediplus/index.html");
				}else if ($row['cargo'] === "2"){
						header("Location:../mediplus/indexEmpleado.html");
					}else if ($row['cargo'] === "3") {
						    header("Location:../mediplus/indexCliente.html");
						}elseif (isset($_SESSION['loggedin'])) {  
			    			}else{
					        echo "<div class='alert alert-danger mt-4' role='alert'>
					        <h4>Necesitas loguearte para ingresar aqui.</h4>
					        <p><a href='index.php'>Logueate aqui!</a></p></div>";
					        }
			}
						 else echo "<div class='alert alert-danger mt-4' role='alert'>Email o contraseña son incorrectos!
				<p><a href='./'><strong>Porfavor intentalo de nuevo!</strong></a></p></div>";			
				
			
			

				/*echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenido!</strong> $row[nombreCli]*/
				
					    
			
			?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>