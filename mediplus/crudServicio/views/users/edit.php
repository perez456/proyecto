<?php

  include './models/users.php';
  $title="Listado de Servicios";

  $servicio     = new Servicio();
  $id_ser       = isset($_GET['id_ser'])?$_GET['id_ser']:null;
  $servicios    = $servicio->getServicioById($id_ser); 
  $nombre_ser   = '';
  $precio_ser   = '';
  if($servicios){
    $nombre_ser    =$servicios[0]['nombre_ser'];
    $precio_ser    =$servicios[0]['precio_ser'];
  }

	include 'toolbar.php';
?>
<form action="./controllers/users_controller.php" method="POST">
  <div class="form-group">
     <label for="id_ser">Id servicio</label>
    <input type="text" class="form-control" id="id_ser" name="id_ser" readonly required value="<?php echo $id_ser; ?>">
  </div>
  <div class="form-group">
     <label for="nombre_ser">Nombre servicio </label>
    <input type="text" class="form-control" id="nombre_ser" name="nombre_ser" autofocus required value="<?php echo $nombre_ser; ?>">
  </div>

   <div class="form-group">
     <label for="precio_ser">precio servicio</label>
    <input type="number" class="form-control" id="precio_ser" name="precio_ser" autofocus required value="<?php echo $precio_ser; ?>">
  </div>

  <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				La informacion ha sido actualizada.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar la información, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
  <input type="hidden" name="id_ser" value="<?php echo $id_ser ?>">
</form>