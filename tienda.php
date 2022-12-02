<?php
	include 'conexion.php';
    include 'producto.php';
    include 'cliente.php';
    include 'venta.php';
    include 'factura.php';

    class tienda{
        //Atributos
        private $db;
        private $clientes;
        private $productos;

        //Constructor
        public function __construct(){
            //Clientes
            $cliete1 = new cliente("Jorge");
            $cliete2 = new cliente("Sam");
            $cliete3 = new cliente("Dana");
            //Productos
            $producto1 = new producto("Piña",4000,30);
            $producto2 = new producto("Manzana",1500,12);
            $producto3 = new producto("Tomate",500,20);
            
            //Base de datos
            $this->db = new DB();
            $this->db->connect();
            
            //Atributos iniciales
            $this->clientes=array(
                1 => $cliete1,
                2 => $cliete2,
                3 => $cliete3,
            );
            $this->productos=array(
                1 => $producto1,
                2 => $producto2,
                3 => $producto3,
            );
        }

        public confirmar_venta($factura){

            

        }
    }
?>