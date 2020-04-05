<?php

  include './models/users.php';
  $title="Listado de Clientes";

  $cliente     = new Cliente();
  $documentoCli       = isset($_GET['documentoCli'])?$_GET['documentoCli']:null;
  $clientes    = $cliente->getClienteByDocument($documentoCli);
  $nombreCli   = '';
  $apellidoCli   = '';
  $telefonoCli= '';
  $direccionCli= '';
  $email   = '';
  $clave   = '';
  $tipoDocumentoCli   = '';
  $fechaInscripcionCli   = '';
  $id   = '';
  if($clientes){
    $nombreCli           =$clientes[0]['nombreCli'];
    $apellidoCli           =$clientes[0]['apellidoCli'];
    $telefonoCli =$clientes[0]['telefonoCli'];
    $direccionCli        =$clientes[0]['direccionCli'];
    $email =$clientes[0]['email'];
    $clave =$clientes[0]['clave'];
    $tipoDocumentoCli =$clientes[0]['tipoDocumentoCli'];
    $fechaInscripcionCli =$clientes[0]['fechaInscripcionCli']; 
    $id =$clientes[0]['id'];
  }

	include 'toolbar.php';
?>
<form action="./controllers/users_controller.php" method="POST">
  <div class="form-group">
     <label for="tipoDocumentoCli">Tipo Documento</label> <br>
      <select class="form-control" id="tipoDocumentoCli" name="tipoDocumentoCli" required value="<?php echo $tipoDocumentoCli; ?>">
        <option value="vacio"><?php echo $tipoDocumentoCli; ?></option>
        <option value="tarjetaIdentidad">Tarjeta de Identidad</option>
        <option value="cedula">Cedula</option>
        <option value="pasaporte">Pasaporte</option>
        <option value="cedulaExtranjeria">Cedula de Extranjeria</option>
      </select>
  </div>
  <div class="form-group">
     <!–Id Usuario–>
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" autofocus required>
  </div>
     <div class="form-group">
    <input type="number" class="form-control" id="documentoCli" name="documentoCli" value="<?php echo $documentoCli; ?>" required readonly>
  </div>
  <div class="form-group">
     <label for="nombreCli">Nombre</label>
    <input type="text" class="form-control" id="nombreCli" name="nombreCli" autofocus required value="<?php echo $nombreCli; ?>">
  </div>
  <div class="form-group">
     <label for="apellidoCli">Apellido</label>
    <input type="text" class="form-control" id="apellidoCli" name="apellidoCli"  required value="<?php echo $apellidoCli; ?>">
  </div>
   <div class="form-group">
     <label for="telefonoCli">Telefono</label>
    <input type="tel" class="form-control" id="telefonoCli" name="telefonoCli" required value="<?php echo $telefonoCli; ?>">
  </div>
  <div class="form-group">
     <label for="direccionCli">Direccion</label>
    <input type="text" class="form-control" id="direccionCli" name="direccionCli" required value="<?php echo $direccionCli; ?>">
  </div>
  <div class="form-group">
     <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <input type="clave" class="form-control" id="clave" name="clave" value="<?php echo $clave; ?>" required> 
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="fechaInscripcionCli" name="fechaInscripcionCli" required value="<?php echo $fechaInscripcionCli; ?>">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="id" name="id" required value="<?php echo $id; ?>"  readonly >
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