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
			$query  ="SELECT  cliente.direccionCli, cita.codigoCita, cita.documentoCli, cita.documentoEmp, cita.fecha,cita.hora, cita.estadoCita,cita.nombreServicio,cita.Servicio2,cita.Servicio3 FROM empleado INNER JOIN cita ON cita.documentoEmp = empleado.documentoEmp INNER JOIN cliente ON cita.documentoEmp = cliente.documentoEmp WHERE estadoCita = 'Finalizada'";
			$result =mysqli_query($this->link,$query);
			return $result;
		}

		public function getCitaLibre()
		{
			$query  ="SELECT cliente.direccionCli, cita.codigoCita, cita.documentoCli, cita.documentoEmp, cita.fecha,cita.hora, cita.estadoCita,cita.nombreServicio,cita.Servicio2,cita.Servicio3 FROM cliente INNER JOIN cita ON cita.documentoCli = cliente.documentoCli WHERE estadoCita = 'Finalizada'";
			$result =mysqli_query($this->link,$query);
			return $result;
		}

		//Crea un nueva cita
		public function newCita($data){
			$query  ="INSERT INTO cita (codigoCita,documentoCli, documentoEmp,fecha,hora,estadoCita,
			nombreServicio,Servicio2,Servicio3) VALUES ('".$data['codigoCita']."','".$data['documentoCli']."','".$data['documentoEmp']."','".$data['fecha']."','".$data['hora']."','".$data['estadoCita']."','".$data['nombreServicio']."','".$data['Servicio2']."','".$data['Servicio3']."')";
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
				$query  ="SELECT * FROM cita WHERE codigoCita LIKE'%".$data."%' OR documentoCli LIKE'".$data."%' OR documentoEmp LIKE'%".$data."%' OR fecha LIKE'".$data."%' OR hora LIKE'".$data."%' OR estadoCita LIKE'".$data."%' OR nombreServicio LIKE'%".$data."%' OR Servicio2 LIKE'".$data."%' OR Servicio3 
				LIKE'".$data."'";
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
