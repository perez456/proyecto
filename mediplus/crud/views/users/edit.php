<?php

  include './models/users.php';
  $title="Listado de Empleados";

  $empleado     = new Empleado();
  $documentoEmp       = isset($_GET['documentoEmp'])?$_GET['documentoEmp']:null;
  $empleados    = $empleado->getEmpleadoByDocument($documentoEmp);
  $nombreEmp   = '';
  $apellidoEmp   = '';
  $telefonoEmp= '';
  $direccionEmp= '';
  $email   = '';
  $clave   = '';
  $tipoDocumentoEmp   = '';
  $fechaInscripcionEmp   = '';
  $horario   = '';
  $id   = '';
  $estadoEmp = '';
  if($empleados){
    $nombreEmp           =$empleados[0]['nombreEmp'];
    $apellidoEmp           =$empleados[0]['apellidoEmp'];
    $telefonoEmp =$empleados[0]['telefonoEmp'];
    $direccionEmp =$empleados[0]['direccionEmp'];
    $email =$empleados[0]['email'];
    $clave =$empleados[0]['clave'];
    $tipoDocumentoEmp =$empleados[0]['tipoDocumentoEmp'];
    $fechaInscripcionEmp =$empleados[0]['fechaInscripcionEmp']; 
    $horario =$empleados[0]['horario']; 
    $id =$empleados[0]['id'];
    $estadoEmp =$empleados[0]['estadoEmp'];
  }

	include 'toolbar.php';
?>
<div>
    <br>
    <h2>Editar Empleado</h2>
</div>
<form action="./controllers/users_controller.php" method="POST">
  
    
  <div class="form-group">
     <!–Id Usuario–>
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" autofocus required>
  </div>
     <div class="form-group">
    <input type="number" class="form-control" id="documentoEmp" name="documentoEmp" value="<?php echo $documentoEmp; ?>" >
  </div>
  <div class="form-group">
     <label for="nombreEmp">Nombre</label>
    <input type="text" class="form-control" id="nombreEmp" name="nombreEmp" required value="<?php echo $nombreEmp; ?>">
  </div>
  <div class="form-group">
  	 <label for="apellidoEmp">Apellido</label>
    <input type="text" class="form-control" id="apellidoEmp" name="apellidoEmp"  required value="<?php echo $apellidoEmp; ?>">
  </div>
   <div class="form-group">
     <label for="telefonoEmp">Teléfono</label>
    <input type="tel" class="form-control" id="telefonoEmp" name="telefonoEmp" required value="<?php echo $telefonoEmp; ?>">
  </div>
  <div class="form-group">
  	 <label for="direccionEmp">Dirección</label>
    <input type="text" class="form-control" id="direccionEmp" name="direccionEmp" required value="<?php echo $direccionEmp; ?>">
  </div>
  <div class="form-group">
     <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <input type="clave" class="form-control" id="clave" name="clave" value="<?php echo $clave; ?>" required> 
  </div>
    <div class="form-group">
   <label for="tipoDocumentoEmp">Tipo Documento</label> <br>
      <select class="form-control" id="tipoDocumentoEmp" name="tipoDocumentoEmp" required value="<?php echo $tipoDocumentoEmp; ?>">
        <option value="vacio"><?php echo $tipoDocumentoEmp; ?></option>
        <option value="tarjetaIdentidad">Tarjeta de Identidad</option>
        <option value="cedula">Cedula</option>
        <option value="pasaporte">Pasaporte</option>
        <option value="cedulaExtranjeria">Cedula de Extranjeria</option>
      </select>
  </div>
  <div class="form-group">
      <select  class="form-control" id="horario" name="horario" value="<?php echo $horario; ?>"required>
        <option value="vacio">Horario</option>
        <option value="Mañana 8AM-2PM">Mañana 8AM-2PM</option>
        <option value="Tarde 2PM-10PM">Tarde 2PM-10PM</option>
      </select>  
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="fechaInscripcionEmp" name="fechaInscripcionEmp" required value="<?php echo $fechaInscripcionEmp; ?>">
  </div>
  <div class="form-group">
    
  </div>
  <div class="form-group">
      <select  class="form-control" id="estadoEmp" name="estadoEmp" value="<?php echo $estadoEmp; ?>" required>
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
      </select>  
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
  <input type="hidden" name="documentoEmp" value="<?php echo $documentoEmp ?>">
</form>