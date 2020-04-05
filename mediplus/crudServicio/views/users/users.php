<div class="row">
	<div class="col text-center">
		<h3>Servicios</h3>
	</div>
</div>
<?php

	include './models/users.php';
	$servicio  = new Servicio();

	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$servicios = $servicio->getServicioBySearch($dataSearch);
	}else{
		//Trae todos los usuarios
		$dataSearch=NULL;
		$servicios =$servicio->getServicio();
	}

	$title="Listado de Servicios";
	include 'toolbar.php';
?>
<div class="row">
	<div class="col text-center">
		
	</div>
</div>
<div class="row">
	<div class="col">
		<form action="./index.php" method="post" accept-charset="utf-8" class="form-inline">
			<div class="form-group mx-sm-3 mb-2">
    			<input type="text" class="form-control" name="dataSearch" autofocus required placeholder="Buscar" value="<?php echo $dataSearch;  ?>">
  			</div>
  			<button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>
		</form>
	</div>
</div>
<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-dark">
				<th>Id Servicio</th>
				<th class="text-center">Nombre Servicio</th>
				<th class="text-center">Precio servicio</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				<?php

					if(count($servicios)>0){

						foreach ($servicios as $column =>$value) {
				?>

							<tr id_ser="row<?php echo $value['id_ser']; ?>">
								<td><?php echo $value['id_ser']; ?></td>
								<td><?php echo $value['nombre_ser']; ?></td>
								<td><?php echo $value['precio_ser']; ?></td>

								<td class="text-center">
									<a href="./index.php?page=edit&id_ser=<?php echo $value['id_ser'] ?>" 
										title="Editar servicio: <?php echo $value['id_ser'] ?>">
										<i class="material-icons btn_edit">edit</i>
									</a>
								</td>
								<td class="text-center">
									<a href="#" onclick="btnDeleteServicio(<?php echo $value["id_ser"] ?>)" id="btnDeleteServicio" title="Borrar servicio: <?php echo $value['id_ser'] ?>">
										<i class="material-icons btn_delete">delete_forever</i>
									</a>
								</td>
							</tr>
				<?php
						}
					}else{
				?>
					<tr>
						<td colspan="5">
							<div class="alert alert-info">
								No se encontraron servicios.
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

	function btnDeleteServicio(id_ser){
		if(confirm("Esta seguro de eliminar el servicio ?")){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response   = JSON.parse(this.responseText);
				var msgSuccess = document.getElementById('msgSuccess');
				var msgDanger   = document.getElementById('msgDanger');
				if(response.success){
					// alert("el servicio" ha sido borrado de la base de datos.");
					msgSuccess.style.display = 'inherit';
					msgSuccess.innerHTML     = 'el servicio ha sido borrada de la base de datos.';
					msgDanger.style.display  = 'none';

					//Elimina el registro de la tabla
					var row    = document.getElementById('row'+id_ser);
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
			xhttp.open("GET", "./controllers/users_controller.php?delete=true&id_ser="+id_ser, true);
			xhttp.send();
		}
	}


</script>