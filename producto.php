<?php
class producto
{
	private $nombre;
	private $precio;
	private $cantidad;

	//Constructor
	public function __construct($nombre)
	{
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->cantidad = $cantidad;
	}

	//GETs
	public function get_nombre(){
		return $nombre;
	}
	public function get_precio(){
		return $precio;
	}
	public function get_cantidad(){
		return $cantidad;
	}

	//Funcion para disminuir en inventario
	public function vender_producto($unidades){
		$cantidad = $cantidad - $unidades;
	}
}
?>