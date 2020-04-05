<?php
	include dirname(dirname(__FILE__))."/models/users.php";

	$citas=new Cita();

	//Request: creacion de nuevo cita
	if(isset($_POST['create']))
	{
		if($citas->newCita($_POST)){
			header('location: ../index.php?page=new&success=true');
		}else{
			header('location: ../index.php?page=new&error=true');
		}
	}

	//Request: editar cita
	if(isset($_POST['edit']))
	{
		if($citas->setEditCita($_POST)){
			header('location: ../index.php?page=edit&codigoCita='.$_POST['codigoCita'].'&success=true');
		}else{
			header('location: ../index.php?page=edit&codigoCita='.$_POST['codigoCita'].'&error=true');
		}
	}

	//Request: eliminar cita
	if(isset($_GET['delete']))
	{
		if($citas->deleteCita($_GET['codigoCita'])){
			// header('location: ../index.php?page=users&success=true');
			echo json_encode(["success"=>true]);
		}else{
			// header('location: ../index.php?page=users&&error=true');
			echo json_encode(["error"=>true]);
		}
	}

?>