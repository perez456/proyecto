<?php

  include './models/users.php';
  $title="Listado de Citas";

  $cita     = new Cita();
  $codigoCita  = isset($_GET['codigoCita '])?$_GET['codigoCita ']:null;
  $citas = $cita->GetCitaById($codigoCita );
$documentoCli= '';
  $documentoEmp= '';
  $fechaHora= '';
  $hora= '';
  $estadoCita= '';
  $nombreServicio= '';
  $Servicio2= '';
  $Servicio3= '';

  if($citas){
    $documentoCli =$citas[0]['documentoCli'];
    $documentoEmp =$citas[0]['documentoEmp'];

    $fechaHora =$citas[0]['fecha'];
    $hora =$citas[0]['hora'];
    $estadoCita =$citas[0]['estadoCita'];
    $nombreServicio =$citas[0]['nombreServicio'];
    $Servicio2 =$citas[0]['Servicio2'];
    $Servicio3 =$citas[0]['Servicio3'];

   
  }

	include 'toolbar.php';
?>
<form action="./controllers/users_controller.php" method="POST">
  <div class="form-group">
     <label for="codigoCita">Codigo Cita</label>
    <input type="text" class="form-control" id="codigoCita" name="codigoCita"  value="<?php echo $codigoCita; ?>">
  </div>


  <div class="form-group">
     <label for="documentoCli">Documento Cliente</label>
    <input type="text" class="form-control" id="documentoCli" name="documentoCli" autofocus required value="<?php echo $documentoCli; ?>">
  </div>

    <div class="form-group">
     <label for="documentoEmp">Documento Empleado</label>
    <input type="text" class="form-control" id="documentoEmp" name="documentoEmp" autofocus required value="<?php echo $documentoEmp; ?>">
  </div>



 <div class="form-group">
     <label for="fecha">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha" autofocus required value="<?php echo $fecha; ?>">
  </div> 

   <div class="form-group">
     <label for="hora">Hora</label>
    <input type="time" class="form-control" id="hora" name="hora" autofocus required value="<?php echo $hora; ?>">
  </div>

   <div class="form-group">
     <label for="documentoEmp">Estado Cita</label>
    <input type="text" class="form-control" id="documentoEmp" name="documentoEmp" autofocus required value="<?php echo $documentoEmp; ?>">

  </div>  

  <div class="form-group">
     <label for="nombreServicio">Nombre Servicio</label>
    <input type="text" class="form-control" id="nombreServicio" name="nombreServicio" autofocus required value="<?php echo $nombreServicio; ?>">
  </div>

  <div class="form-group">
     <label for="Servicio2">Servicio 2</label>
    <input type="text" class="form-control" id="Servicio2" name="Servicio2" autofocus required value="<?php echo $Servicio2; ?>">
  </div>
  <div class="form-group">
     <label for="Servicio3">Servicio 3</label>
    <input type="text" class="form-control" id="Servicio3" name="Servicio3" autofocus required value="<?php echo $Servicio3; ?>">
  </div>






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
  <input type="hidden" name="codigoCita" value="<?php echo $codigoCita ?>">
</form>