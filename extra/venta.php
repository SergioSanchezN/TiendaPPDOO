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
	<title>Laumila</title>
	<link rel="icon" href="img/Boutique.jpg">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/bootstrap.min.css"  />
	<link rel="stylesheet" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    $('.zoom').hover(function() {
	        $(this).addClass('transition');
	    }, function() {
	        $(this).removeClass('transition');
	    });
	});
	</script>
</head>
<body>

<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-light px-4">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#"><img src="img/Boutique.jpg"  width="50em" height="50em" ></a>
	    <a class="navbar-brand" href="#"><h2>Laumila</h2></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>


	    <div class="collapse navbar-collapse" id="navbarNavDropdown">
	      <ul class="navbar-nav">

	        <li class="nav-item dropdown text-light">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            FLORES
	          </a>
	          <ul class="dropdown-menu background1" aria-labelledby="navbarDropdownMenuLink">
	            <li><a class="dropdown-item" href="#">Rosas</a></li>
	            <li><a class="dropdown-item" href="#">Girasoles</a></li>
	            <li><a class="dropdown-item" href="#">Orquídeas</a></li>
                <li><a class="dropdown-item" href="#">Lirios</a></li>
	          </ul>
	        </li>
	      </ul>
          <ul class="navbar-nav">

	        <li class="nav-item dropdown text-light">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            OCASIONES
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	            <li><a class="dropdown-item" href="#">Bodas</a></li>
	            <li><a class="dropdown-item" href="#">Cumpleaños</a></li>
	            <li><a class="dropdown-item" href="#">Día de la madre</a></li>
	          </ul>
	        </li>
	      </ul>
          
          
	    </div>
	  </div>
	</nav>
	<hr>

<div class="container px-6 py-3" id="custom-cards">
	<h2 class="pb-2">Finaliza tu compra</h2>
	<hr>
	<p>Por favor Ingrese sus datos a continuación para completar su compra.</p>
	<br>

	<div class="row">
		<div class="col-xs-1 col-sm-7 col-md-7 col-lg-3 mx-3 my-4">			
			<?php
			$id = $_GET['id'];
			$prod = $_GET['producto'];
			$db->verproducto($id,$prod);
			?>	
			</div>
			<div class="col-xs-1 col-lg-8 mx-3">
			<form class="form-signin bg-light" action="" method="POST">
						
				<div class="form-row">
				<div class="form-group col-md-10 mx-3 my-3">
					<br>
					<label for="inputState">Cantidad</label>				
					<input type="number" value="1" name="cantidad" class="form-control col" id="inputEmail4" placeholder="Digite la fecha de envio">	
				</div>
					
				<div class="form-group col-md-10 mx-3 my-3">	
					<label for="inputState">Medio de pago</label>
					<select id="inputState" name="medpago" class="form-control">
						<option selected>Elija un medio de pago</option>
						<option>Tarjeta</option>
						<option>Efectivo</option>
						<option>Nequi</option>
					</select>
				</div>
				<div class="form-group col-md-10 mx-3 my-3">
					<label for="inputState">Fecha</label>
					<input type="date" name="fecha" class="form-control" id="inputEmail4" placeholder="Digite la fecha de envio">
				</div>
				<div class="form-group col-md-10 mx-3 my-3">
					<label for="inputState">Entrega</label>
					<select id="inputState" name="distribiucion" class="form-control">
						<option selected>Elegir...</option>
						<option>local</option>
						<option>domicilio</option>
					</select>
				</div>
			</div>
			<div class=" mx-3 my-3">
				<button type="submit" name="comprar" class="btn btn-dark">Comprar</button>
			</div>
			<br>
						
			</form>	
			<?php
			if(isset($_POST['comprar'])){
				if (strlen($_POST['cantidad']) > 0 && strlen($_POST['medpago']) > 0 && strlen($_POST['fecha']) > 0 && strlen($_POST['distribiucion']) > 0) {
					$productos_id = $_GET['producto'];
					//$cliente_id = $_GET['id'];
					$cantidad = $_POST['cantidad'];
					$medpago = $_POST['medpago'];
					$fecha = $_POST['fecha'];
					$distribiucion = $_POST['distribiucion'];
					$db->comprar($productos_id,$id,$cantidad,$medpago,$fecha,$distribiucion);
				}
			}else
			{
				echo "<br>";
				echo "<div class='card'>";
				echo "<div class='card-body text-danger'>";
				echo "Por favor ingrese todos los datos";
				echo "</div>";
				echo "</div>"; 
			}			
		?>	
		</div>
	</div>	    
</div>
  


<footer class="footer">
	<div id="qrcode">
		<img src="https://www.codigos-qr.com/qr/php/qr_img.php?d=file%3A%2F%2F%2FC%3A%2FUsers%2FUserPc%2FDesktop%2Ftecnology%2Findex.html&s=4&e=m" alt="Generador de Códigos QR Codes" />
		<br/>
		<a href="https://www.codigos-qr.com/en/qr-code-generator/" target="_blank" id "qrgenerator"></a>
		<h3>Copyright © 2022 LAUMILA Todos los derechos reservados.</h3>
	</div>
</footer>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="js/main.js"></script>
<script src="js/lightbox.js"></script>

</body>
</html>
