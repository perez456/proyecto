<?php 
require 'config/conexion.php';
session_start();

$email =$_POST['email'];
$clave =$_POST['clave'];

$q = "SELECT COUNT(*) from usuarios where email = '$email ' and clave = '$clave'";
$consulta = mysql_query($conexion,$q);
$array = mysqli_fetch_array($consulta);

if ($array['contar']>0) {
	$_SESSION['email'] = $email;
 	header("location: inicio.php");
 } else{
 	echo "Datos incorrectos";
 }




?>