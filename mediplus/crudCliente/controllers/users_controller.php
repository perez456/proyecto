<?php
	include dirname(dirname(__FILE__))."/models/users.php";

	$servicios=new Servicio();

	//Request: creacion de nuevo servicios
	if(isset($_POST['create']))
	{
		if($servicios->newServicio($_POST)){
			header('location: ../index.php?page=new&success=true');
		}else{
			header('location: ../index.php?page=new&error=true');
		}
	}

	//Request: editar servicio
	if(isset($_POST['edit']))
	{
		if($servicios->setEditServicio($_POST)){
			header('location: ../index.php?page=edit&id_ser='.$_POST['id_ser'].'&success=true');
		}else{
			header('location: ../index.php?page=edit&id_ser='.$_POST['id_ser'].'&error=true');
		}
	}

	//Request: editar servicio
	if(isset($_GET['delete']))
	{
		if($servicios->deleteServicio($_GET['id_ser'])){
			// header('location: ../index.php?page=users&success=true');
			echo json_encode(["success"=>true]);
		}else{
			// header('location: ../index.php?page=users&&error=true');
			echo json_encode(["error"=>true]);
		}
	}

?>