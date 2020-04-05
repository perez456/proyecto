<div class="row">
	<div class="col text-center">
		<h3>Empleados</h3>
	</div>
</div>
<?php

	include './models/users.php';
	$empleado  = new Empleado();

	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$empleados = $empleado->getEmpleadoByDocument($dataSearch);
	}else{
		//Trae todos los usuarios
		$dataSearch=NULL;
		$empleados =$empleado->getEmpleado();
	}

	$title="Listado de Empleados";
	include 'toolbar.php';
?>
<div class="row">
	<div class="col">
		<form action="./index.php" method="post" accept-charset="utf-8" class="form-inline">
			<div class="form-group mx-sm-3 mb-2">
    			<input type="text" class="form-control" name="dataSearch" autofocus required placeholder="Buscar por Documento" value="<?php echo $dataSearch;  ?>">
  			</div>
  			<button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>
		</form>
	</div>
</div>
<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-dark">
				<th>Documento</th>
				<th class="text-center">Nombre</th>
				<th class="text-center">Apellido</th>
				<th class="text-center">Teléfono</th>
				<th class="text-center">Dirección</th>
				<th class="text-center">Email</th>
				<th class="text-center">Contraseña</th>
				<th class="text-center">Tipo Documento</th>
				<th class="text-center">Fecha Inscripción</th>
				<th class="text-center">Horario</th>
				<th class="text-center">Id</th>
				<th class="text-center">Estado</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				<?php

					if($empleados>NULL){

						foreach ($empleados as $column =>$value) {
				?>

							<tr documentoEmp="<?php echo $value['documentoEmp']; ?>">								
								<td><?php echo $value['documentoEmp']; ?></td>
								<td><?php echo $value['nombreEmp']; ?></td>
								<td><?php echo $value['apellidoEmp']; ?></td>
								<td><?php echo $value['telefonoEmp']; ?></td>
								<td><?php echo $value['direccionEmp']; ?></td>
								<td><?php echo $value['email']; ?></td>
								<td><?php echo $value['clave']; ?></td>
								<td><?php echo $value['tipoDocumentoEmp']; ?></td>
								<td><?php echo $value['fechaInscripcionEmp']; ?></td>
								<td><?php echo $value['horario']; ?></td>
								<td><?php echo $value['id']; ?></td>
								<td><?php echo $value['estadoEmp']; ?></td>
								<td class="text-center">
									<a href="./index.php?page=edit&documentoEmp=<?php echo $value['documentoEmp'] ?>" title="Editar empleado: <?php echo $value['documentoEmp'] ?>">
										<i class="material-icons btn_edit">edit</i>
									</a>
								</td>
								<!--<td class="text-center">
									<a href="#" onclick="btnDeleteEmpleado(<?php //echo $column["documentoEmp"] ?>)" id="btnDeleteEmpleado" title="Borrar empleado: <?php //echo $column['documentoEmp'] ?>">
										<i class="material-icons btn_delete">delete_forever</i>
									</a>
								</td>-->
							</tr>
				<?php
						}
					}else{
				?>
					<tr>
						<td colspan="13">
							<div class="alert alert-info">
								No se encontraron empleados.
							</div>
						</td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col">
			<div class="alert alert-success" id="msgSuccess" style="display: none;"></div>
			<div class="alert alert-danger" id="msgDanger" style="display: none;"></div>
		</div>
	</div>
<script type="text/javascript">

	function btnDeleteEmpleado(documentoEmp){
		if(confirm("Esta seguro de eliminar el empleado?")){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response   = JSON.parse(this.responseText);
				var msgSuccess = document.getElementById('msgSuccess');
				var msgDanger   = document.getElementById('msgDanger');
				if(response.success){
					// alert("El usuario ha sido borrado de la base de datos.");
					msgSuccess.style.display = 'inherit';
					msgSuccess.innerHTML     = 'El empleado ha sido borrado de la base de datos.';
					msgDanger.style.display  = 'none';

					//Elimina el registro de la tabla
					var row    = document.getElementById('row'+documentoEmp);
					var parent = row.parentElement;
        			parent.removeChild(row);

					// location.reload(true);
				}else if(response.error){
					// alert("No se ha podido eliminar el registro");
					msgDanger.style.display  = 'inherit';
					msgDanger.innerHTML      = 'No se ha podido eliminar el registro';
					msgSuccess.style.display = 'none';
				}
			}
			};
			xhttp.open("GET", "./controllers/users_controller.php?delete=true&documentoEmp="+documentoEmp, true);
			xhttp.send();
		}
	}


</script>