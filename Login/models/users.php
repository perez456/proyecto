<!doctype html>
<html lang="en">
  <head>
    <title>Crear cuenta en la base de datos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
<body>

<div class="container">
<?php
    
    //include '../config/conexion.php';
    include dirname(dirname(__FILE__))."/config/conexion.php";
    /*
    *
    */
    $conexion = mysqli_connect($host, $user, $password, $dataBase);

        // Check connection
        if (!$conexion) {
            die("Conexión Fallida: " . mysqli_connect_error());
        }
        
        // Query to check if the email already exist
        $checkEmail = "SELECT * FROM usuarios WHERE email = '$_POST[email]'";

        // Variable $result hold the connection data and the query
        $result = $conexion-> query($checkEmail);

        // Variable $count hold the result of the query
        $count = mysqli_num_rows($result);

        // If count == 1 that means the email is already on the database
        if ($count == 1) {
        echo "<div class='alert alert-warning mt-4' role='alert'>
                        <p>Este email ya está en la base de datos.</p>
                        <p><a href='../index.php'>Logueate aqui.</a></p>
                    </div>";
        } else {    
        
        
        //If the email don't exist, the data from the form is sended to the database and the account is created
        
        $nombreCli = $_POST['nombreCli'];
        $email = $_POST['email'];
        $pass = $_POST['clave'];

            class Cliente
            {
                private $conn;
                private $link;

                function __construct()
                {
                    $this->conn = new Conexion();
                    $this->link = $this->conn->conectarse();
                }

                    public function newCliente($data){
                    $passHash = password_hash($_POST["clave"], PASSWORD_DEFAULT);
                    $queryUsu = "INSERT INTO usuarios (email, clave, cargo) VALUES ('".$data['email']."','"."$passHash"."','3')"; 
                    $resultUsu =mysqli_query($this->link,$queryUsu);
                    $id= "SELECT MAX(id) as id FROM usuarios";
                    $idUsu=mysqli_query($this->link,$id);
                    $lastId = $idUsu->fetch_array(MYSQLI_ASSOC);
                    if(isset($lastId['id'])) {                
                        $fechaInscripcionCli=getdate();
                        $today = $fechaInscripcionCli['mday'].'/'.$fechaInscripcionCli['mon'].'/'.$fechaInscripcionCli['year'];
                        $query = "INSERT INTO cliente (documentoCli,nombreCli,apellidoCli,telefonoCli,direccionCli,tipoDocumentoCli,fechaInscripcionCli,id) VALUES ('".$data['documentoCli']."','".$data['nombreCli']."','".$data['apellidoCli']."','".$data['telefonoCli']."','".$data['direccionCli']."','".$data['tipoDocumentoCli']."','".$today."','".$lastId['id']."')";
                        $result =mysqli_query($this->link,$query);
                        if(mysqli_affected_rows($this->link)>0){
                            return true;            
                        }else{
                            return false;
                        }
                    }
                }
            }
        }
      
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
