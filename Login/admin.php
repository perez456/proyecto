<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php  

session_start();
header("Location:../mediplus/index.html");

if (isset($_SESSION['loggedin'])) {  
		    }
		    else {
		        echo "<div class='alert alert-danger mt-4' role='alert'>
		        <h4>Necesitas loguearte para ingresar aqui.</h4>
		        <p><a href='index.php'>Logueate aqui!</a></p></div>";
		        exit;
		    }
?>
<p><a href='cerrarsesion.php'>Cerrar Sesión</a></p></div>


</body>
</html>
