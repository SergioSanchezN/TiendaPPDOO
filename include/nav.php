<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laumila</title>
	<link rel="icon" href="img/Boutique.jpg">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/bootstrap.min.css"  />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
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
<body id="background1">
	<!-- Nav -->
	<nav class="navbar navbar-expand-lg navbar-light">
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