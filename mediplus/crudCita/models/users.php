<?php
	include dirname(dirname(__FILE__))."/config/conexion.php";
	/**
	*
	*/
	class Cita
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Trae todos los citas registrados
		public function getCita()
		{
			$query  ="SELECT * FROM cita WHERE documentoEmp != 1";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		public function getCitaLibre()
		{
			$query  ="SELECT * FROM cita WHERE documentoEmp = 1";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Crea un nueva cita
		public function newCita($data){
			$query  ="INSERT INTO cita (codigoCita,documentoCli, documentoEmp,fechaHora,estadoCita,
			nombreServicio,Servicio2,Servicio3) VALUES ('".$data['codigoCita']."','".$data['documentoCli']."','".$data['documentoEmp']."','".$data['fechaHora']."','".$data['estadoCita']."','".$data['nombreServicio']."','".$data['Servicio2']."','".$data['Servicio3']."')";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por documento
		public function getCitaById($codigoCita=NULL){
			if(!empty($codigoCita)){
				$query  ="SELECT * FROM cita WHERE codigoCita='".$codigoCita."'";
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
		public function setEditCita($data){
			if(!empty($data['codigoCita'])){
				$query  ="UPDATE cita SET documentoCli='".$data['documentoCli']."',documentoEmp='".$data['documentoEmp']."',fecha='".$data['fecha']."',hora='".$data['hora']."',estadoCita='".$data['estadoCita']."',nombreServicio='".$data['nombreServicio']."',Servicio2='".$data['Servicio2']."',Servicio3='".$data['Servicio3']."' WHERE codigoCita=".$data['codigoCita'];
				$result =mysqli_query($this->link,$query);
				var_dump($query);
				var_dump($result);
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
		public function deleteCita($codigoCita=NULL){
			if(!empty($codigoCita)){
				$query  ="DELETE FROM cita WHERE codigoCita=".$codigoCita;
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
		public function getCitaBySearch($data=NULL){ 
			if(!empty($data)){
				$query  ="SELECT * FROM cita WHERE codigoCita LIKE'%".$data."%' OR documentoCli LIKE'".$data."%' OR documentoEmp LIKE'%".$data."%' OR fecha LIKE'".$data."%' OR estadoCita LIKE'".$data."%' OR nombreServicio LIKE'%".$data."%' OR Servicio2 LIKE'".$data."%' OR Servicio3 LIKE'".$data."'";
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
