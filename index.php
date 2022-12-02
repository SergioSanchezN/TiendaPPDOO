<?php
	include 'conexion.php';
	include 'include/nav.php';
	$db = new DB();
	$db->connect();
?>


	

<div class="container px-4 py-3" id="custom-cards">
    <h2 class="pb-2 border-bottom">Productos</h2>

    <div class="row row-cols-1 row-cols-lg-5 align-items-stretch g-4 py-5">
		<?php
			$user = $_GET['id'];	
			$db->productos($user);	
		?>         	
    </div>
</div>

<!-- Footer -->
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