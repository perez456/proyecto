<?php
include './config/conexion.php';
$query=mysqli_query($mysqli,"SELECT id_ser,nombre_ser,precio_ser FROM servicio"); 
$query1=mysqli_query($mysqli,"SELECT id_ser,nombre_ser,precio_ser FROM servicio");
$query2=mysqli_query($mysqli,"SELECT id_ser,nombre_ser,precio_ser FROM servicio");

	//include 'toolbar.php';
 
?>
<div>
    <br>
    <h3>Ingresa tus datos y pide tu cita</h3>
</div>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<form action="./controllers/users_controller.php" method="POST">
    <div class="form-group">
     <!–CodigoCita–>
    <input type="hidden" class="form-control" id="codigoCita" name="codigoCita" autofocus required>
  </div>

    <div class="form-group">
    <input type="number" class="form-control" id="documentoCli" name="documentoCli" placeholder="Tu documento*" required >
    </div> 

    <div class="form-group" style="display:none;">
       <label for="documentoEmp ">Documento Empleado*</label>
      <input type="number" value="1" class="form-control" id="documentoEmp" name="documentoEmp" placeholder="1">
    </div>  
    
    <div class="form-group">
         <label for="fecha">Fecha y Hora de tu cita*</label>
        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" min="2020-01-01" max="2030-12-31" required>
    </div> 

    <div class="form-group">
        <input type="time"  class="form-control" id="hora" name="hora" placeholder="Hora" max="22:00:00" min="08:00:00"  step="1" required>
    </div> 

    <div class="form-group" style="display:none;">
         <label for="estadoCita">Estado Cita</label>
        <input type="text" value="Espera" class="form-control" id="estadoCita" name="estadoCita">
    </div>

    <div class="form-group">
         <select  Class="form-control" id="nombreServicio" name="nombreServicio">
            <option value="vacio">Escoge tu servicio</option>
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
     <select  Class="form-control" id="Servicio2" name="Servicio2">
        <option value="vacio">Escoge tu segundo servicio</option>
        <?php 
        while($datos = mysqli_fetch_array($query1)){
               ?>
         <option value="<?php echo $datos['nombre_ser'] ?>"><br> <?php echo $datos['nombre_ser']?> </option>
                    <?php
                        }
                    ?>
 </select>
  </div>
  <div class="form-group">
     <select  Class="form-control" id="Servicio3" name="Servicio3">
        <option value="vacio">Escoge tu tercer servicio</option>
        <?php 
        while($datos = mysqli_fetch_array($query2)){
               ?>
         <option value="<?php echo $datos['nombre_ser'] ?>"><br> <?php echo $datos['nombre_ser']?> </option>
                    <?php
                        }
                    ?>
 </select>
  </div>
  <?php 

 ?>
  <div class="form-group text-center">
  	<input type="submit" name="create" value="Registrar" class="btn btn-primary">
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
