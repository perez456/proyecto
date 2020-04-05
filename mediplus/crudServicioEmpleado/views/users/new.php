<?php
	include 'toolbar.php';
?>
<form action="./controllers/users_controller.php" method="POST">
    <div class="form-group">
     <!–Id servicio–>
    <input type="hidden" class="form-control" id="id_ser" name="id_ser" autofocus required>
  </div>
    <div class="form-group">
     <label for="nombre_ser">Nombre Servicio</label>
    <input type="text" class="form-control" id="nombre_ser" name="nombre_ser" required>
  </div>

    <div class="form-group">
     <label for="precio_ser">Precio Servicio</label>
    <input type="number" class="form-control" id="precio_ser" name="precio_ser" required>
  </div>
  
  <div class="form-group text-center">
  	<input type="submit" name="create" value="Crear" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				el servicio ha sido creado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al crear el Servicio, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>