<?php
require 'persistencia/DetalleDAO.php';
class Detalle{
    private $conexion;
    private $iddetalle;
    private $idventa;
    private $idproducto;
    private $cantidad;
    private $precio;
    private $detalleDAO;
    
    function Detalle($iddetalle="", $idventa="", $idproducto="", $cantidad="",  $precio=""){
        $this -> iddetalle = $iddetalle;
        $this -> idventa = $idventa;
        $this -> idproducto = $idproducto;
        $this -> cantidad = $cantidad;
        $this -> precio = $precio;
        $this -> conexion = new Conexion();
        $this -> detalleDAO = new DetalleDAO($iddetalle, $idventa, $idproducto, $cantidad,  $precio);
    }

    function getId(){
        return $this -> iddetalle;
    }

    function getAdministrador(){
        return $this -> idadministrador;
    }
   
    function getVenta(){
        return $this -> idventa;
    }

    function getProducto(){
        return $this -> idproducto;
    }

    function getCantidad(){
        return $this -> cantidad;
    }

    function getPrecio(){
        return $this -> precio;
    }

    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalleDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalleDAO -> consultar());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $producto = new Producto($registro[2]);
            $producto -> consultarTodos(); 
            $registros[$i] = new Detalle($registro[0], $registro[1], $producto, $registro[3], $registro[4]);
        }
        return $registros;
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalleDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $producto = new Producto($registro[2]);
            $producto -> consultarTodos(); 
            $registros[$i] = new Detalle($registro[0], $registro[1], $producto, $registro[3], $registro[4]);
        }
        return $registros;
    }

    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> detalleDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
       
}
    