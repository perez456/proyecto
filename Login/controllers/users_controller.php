 <?php
    include dirname(__file__,2).'/models/users.php';

    error_reporting(0);
    $clientes = new Cliente();

    //Request: creacion de nuevo cliente
    if(isset($_POST['create']))
    {
        if($clientes->newCliente($_POST)){
            echo "<div class='alert alert-success mt-4' role='alert'><h3>Tu cuenta ha sido creada.</h3>
        <a class='btn btn-outline-primary' href='../index.php' role='button'>Login</a></div>";  
              
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }   
    }   

    if (isset($_POST['create'])) {
        if ($clientes->newCliente($_POST)) {
            # code...
      }
    }
