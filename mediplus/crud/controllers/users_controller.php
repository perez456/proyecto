<?php
	include dirname(__file__,2).'/models/users.php';

	$empleados=new Empleado();

	//Request: creacion de nuevo empleado
	if(isset($_POST['create']))
	{
		if($empleados->newEmpleado($_POST)){
			header('location: ../index.php?page=new&success=true');
		}else{
			header('location: ../index.php?page=new&error=true');
		}
	}

	//Request: editar empleado
	if(isset($_POST['edit']))
	{
		if($empleados->setEditEmpleado($_POST)){
			header('location: ../index.php?page=edit&documentoEmp='.$_POST['documentoEmp'].'&success=true');
		}else{
			header('location: ../index.php?page=edit&documentoEmp='.$_POST['documentoEmp'].'&error=true');
		}
	}

	//Request: editar empleado
	if(isset($_GET['delete']))
	{
		if($empleados->deleteEmpleado($_GET['documentoEmp'])){
			 header('location: ../index.php?page=users&success=true');
			//echo json_encode(["success"=>true]);
		}else{
			header('location: ../index.php?page=users&&error=true');
			//echo json_encode(["error"=>true]);
		}
	}

?>