<?php
	include 'toolbar.php';
?>
<div>
    <br>
    <h3>Agregar Empleado</h3>
    <br>
</div>
<form action="./controllers/users_controller.php" method="POST">
  <div class="form-group">
      <select class="form-control" id="tipoDocumentoEmp" name="tipoDocumentoEmp" required>
        <option value="vacio">Tipo de Documento</option>
        <option value="tarjeta de identidad">Tarjeta de Identidad</option>
        <option value="cedula">Cedula</option>
        <option value="pasaporte">Pasaporte</option>
        <option value="cedula de extranjeria">Cedula de Extranjeria</option>
      </select>  
  </div>
  <div class="form-group">
     <!–Id Usuario–>
    <input type="hidden" class="form-control" id="id" name="id" autofocus required>
  </div>
    <div class="form-group">
    <input type="number" class="form-control" id="documentoEmp" name="documentoEmp" placeholder="Documento" required>
  </div>
    <div class="form-group">
    <input type="text" class="form-control" id="nombreEmp" name="nombreEmp" placeholder="Nombre" required>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="apellidoEmp" name="apellidoEmp" placeholder="Apellido" required>
  </div>
  <div class="form-group">
    <input type="tel" class="form-control" id="telefonoEmp" name="telefonoEmp" placeholder="Teléfono" required>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="direccionEmp" name="direccionEmp" placeholder="Dirección" required>
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave" required> 
    <input type="checkbox" onclick="myFunction()"> Mostrar Clave
    <script>
      function myFunction() {
      var x = document.getElementById("clave");
      if (x.type === "password") {
       x.type = "text";
      } else {
      x.type = "password";
      } 
    }
    </script>
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="fechaInscripcionEmp" name="fechaInscripcionEmp" required>
  </div>
  <div class="form-group">
      <select  class="form-control" id="horario" name="horario" required>
        <option value="vacio">Horario</option>
        <option value="Mañana 8AM-2PM">Mañana 8AM-2PM</option>
        <option value="Tarde 2PM-10PM">Tarde 2PM-10PM</option>
      </select>  
  </div> 
  <div class="form-group">
    <input type="text" class="form-control" id="direccionEmp" name="direccionEmp" placeholder="Estado: Activo" required readonly>
  </div>
  
  <div class="form-group text-center">
  	<input type="submit" name="create" value="Crear" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				El empleado ha sido creado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al crear el empleado, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>