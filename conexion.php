<?php
class DB
{
	private $servidor;
	private $usuario;
	private $clave;
	private $baseDeDatos;
	private $enlace;

	//Constructor
	public function __construct()
	{
		$this->servidor="localhost:3307";
		$this->usuario="root";
		$this->clave="";
		$this->baseDeDatos="tienda";
	}

    //Función de conexion a la base de datos
	function connect(){		
		$this->enlace = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->baseDeDatos);		
		if(!$this->enlace){
			print_r('Error en la conexion con el servidor');
		}	
	}

}






























































	//Función para ver los productos
	function productos($user){
		$query = "SELECT * FROM productos";		
		$result = mysqli_query($this->enlace, $query);
		while ($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$nombre = $row["nombre"];
			$url = $row["url"];
			$precio = $row["precio"];
			
			echo '<div class="card bg-white zoom rounded-5 overflow-hidden card-cover">
			<img class="card-img-top" src="'.$url.'" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">'.$nombre.'</h5>
				<h6 class="card-text">'.$precio.'</h6>
				<form action="venta.php" method="get">
					<input name="id" value="'.$user.'" type="hidden">
					<button type="submit" name="producto" class="btn btn-dark" value="'.$id.'">Añadir a la cesta</button>
				</form>
			</div>           
		</div>';			
		}				
		$result->free();
	}

	//Función de registro de clientes
	function registrarCliente($correo, $password, $nombre, $apellido, $ciudad, $direccion, $telefono){
		try{
			$consulta = "INSERT INTO clientes( `correo`, `contraseña`, `nombre`, `apellidos`, `ciudad`, `direccion`, `telefono`) VALUES ( '$correo', '$password', '$nombre', '$apellido', '$ciudad', '$direccion', '$telefono')";	 
			mysqli_query($this->enlace, $consulta);		
		}catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        } 
	}

	//Función de login para el cliente
	public function userExists($correo, $password){
		$query = "SELECT * FROM clientes WHERE correo = '$correo' AND contraseña = '$password';";
		$result = mysqli_query($this->enlace, $query);
		$numrows = mysqli_num_rows($result);
		$finalresult = mysqli_fetch_array($result);

		if($numrows<1){			
			echo "<br>";
			echo "<div class='card'>";
			echo "<div class='card-body text-danger'>";
			echo "No ha podido ingresar";
			echo "</div>";
			echo "</div>";			
			return false;			
		}
		else{
			$id = $finalresult[0];
			echo "<br>";
			echo "<div class='card'>";
			echo "<div class='card-body text-success'>";
			echo "Ingreso con exito";
			echo "</div>";
			echo "</div>";
			header("Location: tienda.php?id=$id");
			return true;	
			exit();		
		}
		$result->free();
	}

	//Función para ver los datos de un producto
	function verproducto($user,$prod){
		$prodquery = "SELECT * FROM productos WHERE id = '$prod'";
		$result = mysqli_query($this->enlace, $prodquery);
		$numrows = mysqli_num_rows($result);
		$finalresult = mysqli_fetch_array($result);

		$nombre = $finalresult["nombre"];
		$url = $finalresult["url"];
		$precio = $finalresult["precio"];
		$disponible = $finalresult["num_disponibles"];

		echo '<div class="card bg-white zoom rounded-5 overflow-hidden">
				<img class="card-left" src="'.$url.'" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">'.$nombre.'</h5>					
					<h5 class="card-text"> $'.$precio.'</h5>
					<p class="card-text">Disponibles: '.$disponible.' unidades</p>
				</div>           
			</div>';
	}

	//Función para guardar los datos de una compra en la base de datos
	function comprar($productos_id,$id,$cantidad,$medpago,$fecha,$distribiucion){		
		$consulta1 = "INSERT INTO ordenes( `cliente_id`, `estado`, `medpago`, `fecha`, `distribucion`) VALUES ( '$id', 'pendiente', '$medpago', '$fecha', '$distribiucion')";
		mysqli_query($this->enlace, $consulta1);
		$consulta2 = "SELECT max(id) FROM ordenes WHERE cliente_id = '$id' AND fecha = '$fecha';";
		$resp2 = mysqli_query($this->enlace, $consulta2);	
		$finalresp2 = mysqli_fetch_array($resp2);			
		$orden_id = $finalresp2[0];
		$consulta3 = "INSERT INTO productos_en_orden( `orden_id`, `productos_id`, `cantidad`) VALUES ( '$orden_id', '$productos_id', '$cantidad')";	 
		mysqli_query($this->enlace, $consulta3);
		echo '<form action="tienda.php" method="get">
					<button type="submit" name="id" class="btn btn-dark" value="'.$id.'">← Volver</button>
				</form>	';
		echo "<br>";
		echo "<div class='card'>";
		echo "<div class='card-body text-success'>";
		echo "Compra exitosa";
		echo "</div>";
		echo "</div>";	
		

	}

	//Función de login para el admin
	public function loginAdmin($correo, $password){
		$query = "SELECT * FROM administradores WHERE correo = '$correo' AND contraseña = '$password';";
		$result = mysqli_query($this->enlace, $query);
		$numrows = mysqli_num_rows($result);
		$finalresult = mysqli_fetch_array($result);

		if($numrows<1){			
			echo "<br>";
			echo "<div class='card'>";
			echo "<div class='card-body text-danger'>";
			echo "No ha podido ingresar";
			echo "</div>";
			echo "</div>";			
			return false;			
		}
		else{
			$id = $finalresult[0];
			echo "<br>";
			echo "<div class='card'>";
			echo "<div class='card-body text-success'>";
			echo "Ingreso con exito";
			echo "</div>";
			echo "</div>";
			header("Location: admin.php?id=$id");
			return true;	
			exit();		
		}
		$result->free();
	}

	//Función para vr la ordenes
	function ordenes($admin_id){
		$query = "SELECT * FROM ordenes";		
		$result = mysqli_query($this->enlace, $query);
		while ($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$cliente_id = $row["cliente_id"];
			$estado = $row["estado"];
			$medpago = $row["medpago"];
			$fecha = $row["fecha"];
			$distribucion = $row["distribucion"];

			$query1 = "SELECT * FROM productos_en_orden WHERE orden_id = '$id'";
			$result1 = mysqli_query($this->enlace, $query1);
			$finalresult1 = mysqli_fetch_array($result1);
			$productos_id = $finalresult1[2];
			$cantidad = $finalresult1[3];
		
			echo '
			<div class="card bg-white rounded-5">			
				<div class="container">
					<div class="row">
						<div class="col-sm">
						<h5> codigo del pedido: '.$id.'</h5>
						<h5> Estado del pedido: '.$estado.'</h5>
						</div>
						<div class="col-sm">
						<form action="detalles_venta.php" method="get">
							<input name="admin_id" value="'.$admin_id.'" type="hidden">
							<input name="cliente_id" value="'.$cliente_id.'" type="hidden">
							<input name="productos_id" value="'.$productos_id.'" type="hidden">
							<input name="cantidad" value="'.$cantidad.'" type="hidden">
							<button type="submit" name="orden" class="btn btn-dark" value="'.$id.'">Ver detalles</button>
						</form>
						</div>
					</div>
				</div>			         
			</div>';			
		}				
		$result->free();
	}

	//Función para ver los detalles de un pedido u orden
	function detallesOrden($orden,$admin_id,$cliente_id,$productos_id,$cantidad){
		$queryorden = "SELECT * FROM ordenes  WHERE id = '$orden'";		
		$resultorden = mysqli_query($this->enlace, $queryorden);
		$resultordenarray = mysqli_fetch_array($resultorden);

		$id = $resultordenarray["id"];
		$estado = $resultordenarray["estado"];
		$medpago = $resultordenarray["medpago"];
		$fecha = $resultordenarray["fecha"];
		$distribucion = $resultordenarray["distribucion"];

		$querycliente = "SELECT * FROM clientes WHERE id = '$cliente_id'";		
		$resultcliente = mysqli_query($this->enlace, $querycliente);
		$resultclientearray = mysqli_fetch_array($resultcliente);

		$correo = $resultclientearray["id"];
		$nombre = $resultclientearray["nombre"];
		$apellidos = $resultclientearray["apellidos"];
		$ciudad = $resultclientearray["ciudad"];
		$direccion = $resultclientearray["direccion"];
		$telefono = $resultclientearray["telefono"];
		
		echo '<div class="col-xs-1 col-sm-7 col-md-7 col-lg-3 mx-3 my-4">';
		echo '<h4> Datos del producto </h4>';
		$this->verproducto($admin_id,$productos_id);
		echo '</div>';
		echo '<div class="col-xs-1 col-lg-8 mx-3">
				<br>
				<h4> Datos de la orden </h4>
				<h6> Codigo del pedido:            '.$id.'</h6>
				<h6> Estado:                       '.$estado.'</h6>
				<h6> Fecha:                        '.$fecha.'</h6>
				<h6> Distribucion:                 '.$distribucion.'</h6>
				<h6> Cantidad:                 	   '.$distribucion.'</h6>
				<br>
				<h4> Datos del cliente </h4>
				<h6> correo:                       '.$correo.'</h6>
				<h6> nombre:                       '.$nombre.'</h6>
				<h6> apellido:                     '.$apellidos.'</h6>
				<h6> ciudad:                       '.$ciudad.'</h6>
				<h6> direccion:                    '.$direccion.'</h6>
				<h6> telefono:                     '.$telefono.'</h6>

			</div>';						
						
		$resultorden->free();
	}

}
?>
