<?php
class factura
{
	private $cliente;
	private $fecha;
	private $ventas;

	//Constructor
	public function __construct($cliente)
	{
		$this->cliente = $cliente;
	}

	public function añadir_venta($venta){
		$venta.add($venta);
	}
}
?>