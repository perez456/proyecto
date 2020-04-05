<?php
	include dirname(dirname(__FILE__))."/config/conexion.php";
	/**
	*
	*/
	class Servicio
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Trae todos los servicios registrados
		public function getServicio()
		{
			$query  ="SELECT * FROM servicio";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Crea un nuevo servicio
		public function newServicio($data){
		$query  ="INSERT INTO servicio (id_ser,nombre_ser,precio_ser) VALUES ('".$data['id_ser']."','".$data['nombre_ser']."','".$data['precio_ser']."')";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por documento
		public function getServicioById($id_ser=NULL){
			if(!empty($id_ser)){
				$query  ="SELECT * FROM servicio WHERE id_ser='".$id_ser."'";
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
		public function setEditServicio($data){
			if(!empty($data['id_ser'])){
				$query  ="UPDATE servicio SET nombre_ser='".$data['nombre_ser']."',precio_ser='".$data['precio_ser']."' WHERE id_ser=".$data['id_ser'];
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
		public function deleteServicio($id_ser=NULL){
			if(!empty($id_ser)){
				$query  ="DELETE FROM servicio WHERE id_ser=".$id_ser;
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
		
		public function getServicioBySearch($data=NULL){ 
			if(!empty($data)){
				$query  ="SELECT * FROM servicio WHERE id_ser LIKE '%".$data."%' OR nombre_ser LIKE'%".$data."%' OR precio_ser LIKE'%".$data."%'";
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
