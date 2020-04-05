<?php
	define('HOMEDIR',__DIR__);

	include 'views/header.php';
	$page=isset($_GET['page'])?$_GET['page']:'users';
	if(isset($_POST['btnSearch'])){
		$search     =true;
		$dataSearch =$_POST['dataSearch'];
	}
	include 'views/users/'.$page.'.php';
	include 'views/footer.php';
