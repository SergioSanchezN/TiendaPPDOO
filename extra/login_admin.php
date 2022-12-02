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
    <h4>Login Admin</h4>
      <form class="form-signin" action="" method="POST">
        <div class="form-row">
          <div class="form-group col">
              <input type="email" name="correo" class="controls" id="inputEmail4" placeholder="Ingrese su Correo">
          </div>
          <div class="form-group col">
              <input type="password" name="password" class="controls" id="inputEmail4" placeholder="Ingrese su contraseña">
          </div>          
        </div>
        <div class="mt-2 ml-2">
          <button type="submit" name="ingresar" class="botons">Ingresar</button>
        </div>
    </form>
    <p><a href="admin.php">¿Quieres comprar?</a></p>

  </section>


  <?php	
    $control = 0;	
    if(isset($_POST['ingresar'])){
      if (strlen($_POST['correo']) > 0 && strlen($_POST['password']) > 0) {        
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $db->loginAdmin($correo, $password);

        $correo = '';
        $password = '';
      }else
      {
          echo "<br>";
          echo "<div class='card'>";
          echo "<div class='card-body text-danger'>";
          echo "Por favor ingrese todos los datos";
          echo "</div>";
          echo "</div>"; 
      }
      unset($_POST['ingresar']);
      unset($_POST['correo']);
      unset($_POST['password']);
    }
	?> 
</body>
</html>