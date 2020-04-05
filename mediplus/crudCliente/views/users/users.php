<?php

	include './models/users.php';
	$cliente  = new Cliente();

	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$clientes = $cliente->getClienteBySearch($dataSearch);
	}else{
		//Trae todos los usuarios
		$dataSearch=NULL;
		$clientes =$cliente->getCliente();
	}

	$title="Listado de Clientes";
?>
<br>
<div class="row">
	<div class="col text-center">
		<h3>Clientes</h3>
	</div>
</div>
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
				<th class="text-center">Telefono</th>
				<th class="text-center">Direccion</th>
				<th class="text-center">Email</th>
				<th class="text-center">Tipo Documento</th>
				<th class="text-center">Fecha Inscripcion</th>
				<th class="text-center">Id</th>
				<!--<th>&nbsp;</th>-->
			</thead>
			<tbody>
				<?php

					if($clientes>NULL){

						foreach ($clientes as $column =>$value) {
				?>

							<tr documentoCli="row<?php echo $value['documentoCli']; ?>">
								<td><?php echo $value['documentoCli']; ?></td>
								<td><?php echo $value['nombreCli']; ?></td>
								<td><?php echo $value['apellidoCli']; ?></td>
								<td><?php echo $value['telefonoCli']; ?></td>
								<td><?php echo $value['direccionCli']; ?></td>
								<td><?php echo $value['email']; ?></td>
								<td><?php echo $value['tipoDocumentoCli']; ?></td>
								<td><?php echo $value['fechaInscripcionCli']; ?></td>
								<td><?php echo $value['id']; ?></td>
								<!---<td class="text-center">
									<a href="./index.php?page=edit&documentoCli=<?php //echo $value['documentoCli'] ?>" 
										title="Editar Cliente: <?php //echo $value['documentoCli'] ?>">
										<i class="material-icons btn_edit">edit</i>
									</a>
								</td>
								<td class="text-center">
									<a href="#" onclick="btnDeleteServicio(<?php //echo $value["id_ser"] ?>)" id="btnDeleteServicio" title="Borrar servicio: <?php //echo $value['id_ser'] ?>">
										<i class="material-icons btn_delete">delete_forever</i>
									</a>
								</td>-->
							</tr>
				<?php
						}
					}else{
				?>
					<tr>
						<td colspan="11">
							<div class="alert alert-info">
								No se encontraron clientes.
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

	function btnDeleteServicio(documentoCli){
		if(confirm("Esta seguro de eliminar el cliente?")){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response   = JSON.parse(this.responseText);
				var msgSuccess = document.getElementById('msgSuccess');
				var msgDanger   = document.getElementById('msgDanger');
				if(response.success){
					// alert("el cliente" ha sido borrado de la base de datos.");
					msgSuccess.style.display = 'inherit';
					msgSuccess.innerHTML     = 'el cliente ha sido borrada de la base de datos.';
					msgDanger.style.display  = 'none';

					//Elimina el registro de la tabla
					var row    = document.getElementById('row'+documentoCli);
					var parent = row.parentElement;
        			parent.removeChild(row);

					location.reload(true);
				}else if(response.error){
					// alert("No se ha podido eliminar el registro");
					msgDanger.style.display  = 'inherit';
					msgDanger.innerHTML      = 'No se ha podido eliminar el registro';
					msgSuccess.style.display = 'none';
				}
			}
			};
			xhttp.open("GET", "./controllers/users_controller.php?delete=true&documentoCli="+documentoCli, true);
			xhttp.send();
		}
	}


</script>