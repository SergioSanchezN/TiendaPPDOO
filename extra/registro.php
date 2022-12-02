<?php
	include 'conexion.php';
	$db = new DB();
	$db->connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
  <title>Formulario Registro</title>
</head>
<body>
  <section class="form-register">
    <h4>Formulario Registro</h4>
      <form class="form-signin" action="" method="POST">
        <div class="form-row">
          <div class="form-group col">
              <input type="email" name="correo" class="controls" id="inputEmail4" placeholder="Ingrese su Correo">
          </div>
          <div class="form-group col">
              <input type="password" name="password" class="controls" id="inputEmail4" placeholder="Ingrese su contraseña">
          </div>
          <div class="form-group col">
              <input type="text" name="nombre" class="controls" id="inputEmail4" placeholder="Ingrese su nombre">
          </div>
          <div class="form-group col">
              <input type="text" name="apellido" class="controls" id="inputEmail4" placeholder="Ingrese su apellido">
          </div>
          <div class="form-group col">
              <input type="text" name="ciudad" class="controls" id="inputEmail4" placeholder="Ingrese su ciudad">
          </div>
          <div class="form-group col">
              <input type="text" name="direccion" class="controls" id="inputEmail4" placeholder="Ingrese su direccion">
          </div>
          <div class="form-group col">
              <input type="text" name="telefono" class="controls" id="inputEmail4" placeholder="Ingrese su telefono">
          </div>
          
        </div>
        <div class="mt-2 ml-2">
          <button type="submit" name="registrar" class="botons">Registrar</button>
        </div>
    </form>
    <p><a href="login.php">¿Ya tengo Cuenta?</a></p>

  </section>


  <?php	
    $control = 0;	
    if(isset($_POST['registrar'])){
      if (strlen($_POST['correo']) > 0 && strlen($_POST['password']) > 0 && strlen($_POST['nombre']) > 0 && strlen($_POST['apellido']) > 0 && strlen($_POST['ciudad']) > 0 && strlen($_POST['direccion']) > 0 && strlen($_POST['telefono']) > 0) {
        
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $db->registrarCliente($correo, $password, $nombre, $apellido, $ciudad, $direccion, $telefono);

        $correo = '';
        $password = '';
        $nombre = '';
        $apellido = '';
        $ciudad = '';
        $direccion = '';
        $telefono = '';
  
        echo "<br>";
        echo "<div class='card'>";
        echo "<div class='card-body text-success'>";
        echo "Registro con exito";
        echo "</div>";
        echo "</div>";
 
      }else
      {
          echo "<br>";
          echo "<div class='card'>";
          echo "<div class='card-body text-danger'>";
          echo "Por favor ingrese todos los datos";
          echo "</div>";
          echo "</div>"; 
      }
    }
	?> 
</body>
</html>