<?php
	include dirname(dirname(__FILE__))."/config/conexion.php";
	/**
	*
	*/
	class Cliente
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Trae todos los servicios registrados
		public function getCliente() 
		{
			$query  ="SELECT usuarios.email, usuarios.clave, usuarios.id, cliente.documentoCli, cliente.nombreCli,cliente.apellidoCli, cliente.telefonoCli,cliente.direccionCli,cliente.tipoDocumentoCli,cliente.fechaInscripcionCli FROM cliente INNER JOIN usuarios ON cliente.id = usuarios.id";
			$result =mysqli_query($this->link,$query);
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Crea un nuevo servicio
		/*public function newCliente($data){
		$query  ="INSERT INTO servicio (id_ser,nombre_ser,precio_ser) VALUES ('".$data['id_ser']."','".$data['nombre_ser']."','".$data['precio_ser']."')";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}*/

		//Obtiene el usuario por documento
		public function getClienteById($documentoCli=NULL){
			if(!empty($documentoCli)){
				$query  ="SELECT * FROM cliente WHERE documentoCli='".$documentoCli."'";
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
		public function setEditCliente($data){
			$queryUsu = "UPDATE usuarios SET email='".$data['email']."',clave='".$data['clave']."' WHERE id=".$data['id'];
			$resultUsu =mysqli_query($this->link,$queryUsu);
			if(!empty($data['documentoCli'])){
				$query  ="UPDATE cliente SET tipoDocumentoCli='".$data['tipoDocumentoCli']."',nombreCli='".$data['nombreCli']."',apellidoCli='".$data['apellidoCli']."',telefonoCli='".$data['telefonoCli']."',direccionCli='".$data['direccionCli']."',fechaInscripcionCli='".$data['fechaInscripcionCli']."',id='".$data['id']."' WHERE documentoEmp=".$data['documentoEmp'];
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
		public function deleteCliente($documentoCli=NULL){
			if(!empty($documentoCli)){
				$query  ="DELETE FROM cliente WHERE documentoCli=".$documentoCli;
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Filtro de busqueda
		public function getClienteBySearch($data=NULL){ 
			if(!empty($data)){
				$query  ="SELECT usuarios.email, usuarios.clave, usuarios.id, cliente.documentoCli, cliente.nombreCli,cliente.apellidoCli, cliente.telefonoCli,cliente.direccionCli,cliente.tipoDocumentoCli,cliente.fechaInscripcionCli FROM cliente INNER JOIN usuarios ON cliente.id = usuarios.id WHERE documentoCli LIKE '%".$data."%'";
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}
	}
