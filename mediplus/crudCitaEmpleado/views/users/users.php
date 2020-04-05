<div class="row">
	<div class="col text-center">
		<h3>Citas Pendientes</h3>
	</div>
</div>
<?php

	include './models/users.php';
	$cita  = new Cita();

	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$citas = $cita->getCitaBySearch($dataSearch);
	}else{
		//Trae todos los usuarios
		$dataSearch=NULL;
		$citas =$cita->getCita();
	}
$title="Listado de Citas";

	include 'toolbar.php';
?>
<div class="row">
	<div class="col text-center">
		
	</div>
</div>
<!--<div class="row">
	<div class="col">
		<form action="./index.php" method="post" accept-charset="utf-8" class="form-inline">
			<div class="form-group mx-sm-2 mb-2">
    			<input type="text" class="form-control" name="dataSearch" autofocus required placeholder="Buscar" value="<?php //echo $dataSearch;  ?>">
  			</div>
  			<button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>
		</form>
	</div>
</div>-->


<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-dark">
					<th class="text-center">Codigo Cita</th>
				<th class="text-center">Documento Cliente</th>
				<th class="text-center">Direccion Cliente</th>
				<th class="text-center">Documento Empleado</th>
				<th class="text-center">Fecha </th>
				<th class="text-center">Hora</th>
				<th class="text-center">Estado Cita</th>
				<th class="text-center">Servicio 1</th>
				<th class="text-center">Servicio 2</th>
				<th class="text-center">Servicio 3</th>
				<th>&nbsp;</th>
			
				
			</thead>
			<tbody>
				<?php

					if($citas>NULL){

						foreach ($citas as $column =>$value) {
				?>

							<tr codigoCita="row<?php echo $value['codigoCita']; ?>">
								<td><?php echo $value['codigoCita']; ?></td>
								<td><?php echo $value['documentoCli']; ?></td>
								<td><?php echo $value['direccionCli']; ?></td>
								<td ><?php echo $value['documentoEmp']; ?></td>
								<td><?php echo $value['fecha']; ?></td>
								<td><?php echo $value['hora']; ?></td>
								<td><?php echo $value['estadoCita']; ?></td>
								<td><?php echo $value['nombreServicio']; ?></td>
								<td><?php echo $value['Servicio2']; ?></td>
								<td><?php echo $value['Servicio3']; ?></td>
							
								<td class="text-center">
									<a name="editt" href="./controllers/users_controller.php?codigoCita=<?php echo $value['codigoCita'] ?>" class=""><i class="material-icons btn_delete">done</i></a>
									<!--<form action="./controllers/users_controller.php" method="POST">
										<button type="submit" name="editt" title="Finalizar cita: <?php// echo $value['codigoCita'] ?>" class="btn btn-primary mb-2">Finalizar</button>
									</form>-->
								</td>
								<!--<td class="text-center">
									<a href="#" onclick="btnDeleteCita(<?php /*echo $value["codigoCita"] ?>)" id="btnDeleteCita" title="Borrar cita: <?php echo $value['codigoCita'] */?>">
										<i class="material-icons btn_delete">delete_forever</i>
									</a>
								</td>-->
							</tr>
									<?php
						}
					}else{
				?>
					<tr>
						<td colspan="10">
							<div class="alert alert-info">
								No se encontraron citas.
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

	function btnDeleteCita(codigoCita){
		if(confirm("Esta seguro de eliminar la cita?")){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response   = JSON.parse(this.responseText);
				var msgSuccess = document.getElementById('msgSuccess');
				var msgDanger   = document.getElementById('msgDanger');
				if(response.success){
					// alert("La Cita ha sido borrado de la base de datos.");
					msgSuccess.style.display = 'inherit';
					msgSuccess.innerHTML     = 'La cita ha sido borrada de la base de datos.';
					msgDanger.style.display  = 'none';

					//Elimina el registro de la tabla
					var row    = document.getElementById('row'+codigoCita);
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
			xhttp.open("GET", "./controllers/users_controller.php?delete=true&codigoCita="+codigoCita, true);
			xhttp.send();
		}
	}


</script>

