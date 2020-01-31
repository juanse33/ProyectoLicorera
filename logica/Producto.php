<?php
require 'persistencia/ProductoDAO.php';
class Producto{
    private $conexion;
    private $idproducto;
    private $nombre;
    private $foto;
    private $idtamaño;
    private $cantidad;
    private $precio;
    private $productoDAO;
    
    function Producto($idproducto="",  $nombre="", $foto="", $idtamaño="", $cantidad="", $precio=""){
        $this -> idproducto = $idproducto;
        $this -> nombre = $nombre;
        $this -> foto = $foto;
        $this -> idtamaño = $idtamaño;
        $this -> cantidad = $cantidad;
        $this -> precio = $precio;
        $this -> conexion = new Conexion();
        $this -> productoDAO = new ProductoDAO($idproducto, $nombre, $foto, $idtamaño, $cantidad, $precio);
    }

    function getId(){
        return $this -> idproducto;
    }

    function getTamaño(){
        return $this -> idtamaño;
    }

    function getCantidad(){
        return $this -> cantidad;
    }

    function getPrecio(){
        return $this -> precio;
    }

    function getNombre(){
        return $this -> nombre;
    }
    
    
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idproducto = $registro[0];
        $this -> nombre = $registro[1];
        $this -> foto = $registro[2];
        $tamaño = new Tamano($registro[3]);
        $tamaño -> consultar(); 
        $this -> idtamaño = $tamaño;
        $this -> cantidad = $registro[4];
        $this -> precio = $registro[5];
        $this -> conexion -> cerrar();
    
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $tamaño = new Tamano($registro[3]);
            $tamaño -> consultar(); 
            $registros[$i] = new Producto($registro[0], $registro[1], $registro[2], $tamaño, $registro[4], $registro[5]);
        }
        return $registros;
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultarTodos());
    
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $tamaño = new Tamano($registro[2]);
            $tamaño -> consultar(); 
            $registros[$i] = new Producto($registro[0], $registro[1], $tamaño, $registro[3], $registro[4]);
        }
        return $registros;
      }     

    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> productoDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
}
