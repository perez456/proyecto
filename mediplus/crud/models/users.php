<?php
	include dirname(dirname(__FILE__))."/config/conexion.php";
	/**
	*
	*/
	class Empleado
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Trae todos los empelados registrados
		public function getEmpleado()
		{
			$query  ="SELECT usuarios.email, usuarios.clave, usuarios.id, empleado.documentoEmp, empleado.nombreEmp,empleado.apellidoEmp, empleado.telefonoEmp,empleado.direccionEmp,empleado.tipoDocumentoEmp,empleado.fechaInscripcionEmp,empleado.horario,empleado.estadoEmp FROM empleado INNER JOIN usuarios ON empleado.id = usuarios.id";
			$result =mysqli_query($this->link,$query);					
			return $result;
		}

		//Crea un nuevo empleado
		public function newEmpleado($data){
			$passHash = password_hash($_POST["clave"], PASSWORD_DEFAULT);
			$queryUsu = "INSERT INTO usuarios (id,email,clave,cargo) VALUES ('".$data['id']."','".$data['email']."','"."$passHash"."','2')";
			$resultUsu =mysqli_query($this->link,$queryUsu);
			
			$id= "SELECT MAX(id) as id FROM usuarios";
			$idUsu=mysqli_query($this->link,$id);
			$lastId = $idUsu->fetch_array(MYSQLI_ASSOC);
		
			if(isset($lastId['id'])) {				
				$fechaInscripcionEmp=getdate();
				$today = $fechaInscripcionEmp['mday'].'/'.$fechaInscripcionEmp['mon'].'/'.$fechaInscripcionEmp['year'];		
				$query  ="INSERT INTO empleado (documentoEmp,nombreEmp,apellidoEmp,telefonoEmp,direccionEmp,tipoDocumentoEmp,fechaInscripcionEmp, horario, id, estadoEmp) VALUES ('".$data['documentoEmp']."','".$data['nombreEmp']."','".$data['apellidoEmp']."','".$data['telefonoEmp']."','".$data['direccionEmp']."','".$data['tipoDocumentoEmp']."','".$today."','".$data['horario']."',".$lastId['id'].",'Activo')";
				$result =mysqli_query($this->link,$query);
				
				if(mysqli_affected_rows($this->link)>0){
					return true;			
				}else{
					return false;
				}
			}
			
		}

		//Obtiene el usuario por documento
		public function getEmpleadoByDocument($documentoEmp=NULL){
			if(!empty($documentoEmp)){
				$query  ="SELECT usuarios.email, usuarios.clave, usuarios.id, empleado.documentoEmp, empleado.nombreEmp,empleado.apellidoEmp, empleado.telefonoEmp,empleado.direccionEmp,empleado.tipoDocumentoEmp,empleado.horario,empleado.fechaInscripcionEmp,empleado.estadoEmp FROM empleado INNER JOIN usuarios ON empleado.id = usuarios.id WHERE documentoEmp =".$documentoEmp;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por documento
		public function setEditEmpleado($data){
			$queryUsu = "UPDATE usuarios SET email='".$data['email']."',clave='".$data['clave']."' WHERE id=".$data['id'];
			$resultUsu =mysqli_query($this->link,$queryUsu);
			if(!empty($data['documentoEmp'])){
				$query  ="UPDATE empleado SET nombreEmp='".$data['nombreEmp']."',apellidoEmp='".$data['apellidoEmp']."',telefonoEmp='".$data['telefonoEmp']."',direccionEmp='".$data['direccionEmp']."',tipoDocumentoEmp='".$data['tipoDocumentoEmp']."',fechaInscripcionEmp='".$data['fechaInscripcionEmp']."',horario='".$data['horario']."',estadoEmp='".$data['estadoEmp']."',id='".$data['id']."' WHERE documentoEmp=".$data['documentoEmp'];
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Borra el usuario por documento
		/*public function deleteEmpleado($documentoEmp=NULL){
			if(!empty($documentoEmp)){
				$query  ="DELETE FROM usuarios, empleado WHERE empleado.documentoEmp=".$documentoEmp."AND usuarios.id=".$id;
				$result =mysqli_query($this->link,$query);
				var_dump($query);
				var_dump($result);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}*/

		//Filtro de busqueda
		public function getEmpleadoBySearch($data=NULL){ 
			if(!empty($data)){
				$query  ="SELECT * FROM empleado, usuarios WHERE nombreEmp LIKE'%".$data."%' OR apellidoEmp LIKE'".$data."' OR documentoEmp LIKE'%".$data."%' OR estadoEmp LIKE'".$data."' OR direccionEmp LIKE'".$data."' OR email LIKE'".$data."' OR tipoDocumentoEmp LIKE'".$data."' OR fechaInscripcionEmp LIKE'".$data."'";
				$result =mysqli_query($this->link,$query);
				//$data   =array();	
				return $result;
			}else{
				return false;
			}
		}
	}

/*Obtiene el usuario por documento
		public function setEditEmpleado($data){
			$queryUsu = "UPDATE usuarios SET email='".$data['email']."',clave='".$data['clave']."' WHERE id=".$data['id'];
			$resultUsu =mysqli_query($this->link,$queryUsu);
			if(!empty($data['documentoEmp'])){
				$query  ="UPDATE empleado SET tipoDocumentoEmp='".$data['tipoDocumentoEmp']."',nombreEmp='".$data['nombreEmp']."',apellidoEmp='".$data['apellidoEmp']."',telefonoEmp='".$data['telefonoEmp']."',direccionEmp='".$data['direccionEmp']."',fechaInscripcionEmp='".$data['fechaInscripcionEmp']."',horario='".$data['horario']."',estadoEmp='".$data['estadoEmp']."',id='".$data['id']."' WHERE documentoEmp=".$data['documentoEmp'];
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}*/