<?php
include './config/conexion.php';
$query=mysqli_query($mysqli,"SELECT id_ser, nombre_ser,precio_ser FROM servicio"); 
$query1=mysqli_query($mysqli,"SELECT id_ser, nombre_ser,precio_ser FROM servicio");
$query2=mysqli_query($mysqli,"SELECT id_ser, nombre_ser,precio_ser FROM servicio");

	include 'toolbar.php';
 
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<form action="./controllers/users_controller.php" method="POST">
    <div class="form-group">
     <!–CodigoCita–>
    <input type="hidden" class="form-control" id="codigoCita" name="codigoCita" autofocus required>
  </div>

    <div class="form-group">
     <label for="documentoCli">Documento Cliente</label>
    <input type="number" class="form-control" id="documentoCli" name="documentoCli" required >
  </div> 

  <div class="form-group" >
     <label for="documentoEmp" style="display:none;">Documento Empleado</label>
    <input type="number" value="1" class="form-control" id="documentoEmp" name="documentoEmp" placeholder="1"  style="display: none;">
  </div>  
    

<div class="form-group">
     <label for="fechaHora">fecha hora</label>
    <input type="datetime-local" class="form-control" id="fechaHora" name="fechaHora" min="16-03-2020"
                    max="30-05-2020" step="3"
                    min="12:00"
                    max="20:00" step="7200" required>
</div> 

<div class="form-group">
     <label for="estadoCita"style="display:none;">Estado Cita</label>
    <input type="text" value="Espera" class="form-control" id="estadoCita" name="estadoCita"   style="display:none;">
  </div>

<div class="form-group">
     <label for="nombreServicio">Nombre Servicio</label>
      <select  Class="form-control" id="nombreServicio" name="nombreServicio">
        <option value="vacio">Elija una opcion</option>
        <?php 
        while($datos = mysqli_fetch_array($query)){
               ?>
         <option value="<?php echo $datos['nombre_ser'] ?>"><br> <?php echo $datos['nombre_ser']?> </option>
                    <?php
                        }
                    ?>
      </select>
  </div>

  <div class="form-group">
     <label for="Servicio2"> Servicio 2</label>
     <select  Class="form-control" id="Servicio2" name="Servicio2">
        <option value="vacio">Elija una opcion</option>
        <?php 
        while($datos = mysqli_fetch_array($query1)){
               ?>
         <option value="<?php echo $datos1['nombre_ser'] ?>"><br> <?php echo $datos['nombre_ser'].' $

         '.$datos['precio_ser']?> </option>
                    <?php
                        }
                    ?>
 </select>
  </div>
  <div class="form-group">
     <label for="Servicio3">Servicio 3</label>
     <select  Class="form-control" id="Servicio3" name="Servicio3">
        <option value="vacio">Elija una opcion</option>
        <?php 
        while($datos = mysqli_fetch_array($query2)){
               ?>
         <option value="<?php echo $datos['nombre_ser'] ?>"><br> <?php echo $datos['nombre_ser'].' $

         '.$datos['precio_ser']?> </option>
                    <?php
                        }
                    ?>
 </select>
  </div>
  <?php 

 ?>



  <div class="form-group text-center">
  	<input type="submit" name="create" value="Crear" class="btn btn-primary">
  </div>
  <div class="form-group text-center">

  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				La Cita ha sido creada.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al crear la Cita, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>