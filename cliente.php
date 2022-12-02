<?php
class cliente
{
	private $nombre;

	//Constructor
	public function __construct($nombre)
	{
		$this->nombre = $nombre;
	}

	//GET
	public function get_nombre(){
		return $nombre;
	}
	
}
?>