<?php
require 'persistencia/ClienteDAO.php';
class Cliente {
    private $conexion;
    private $idcliente;
    private $nombre;
    private $apellido;
    private $direccion;
    private $clienteDAO;
    
    function Cliente($idcliente="", $nombre="", $apellido="", $direccion=""){
        $this -> idcliente = $idcliente;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> direccion = $direccion;
        $this -> conexion = new Conexion();
        $this -> clienteDAO = new ClienteDAO($idcliente, $nombre, $apellido, $direccion);
    }

    function getId(){
        return $this -> idcliente;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function getApellido(){
        return $this -> apellido;
    }

    function getDireccion(){
        return $this -> direccion;
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();           
            $registros[$i] = new Cliente($registro[0], $registro[1], $registro[2], $registro[3]);
        }
        return $registros;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idcliente = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> direccion = $registro[3];
        $this -> conexion -> cerrar();
    }
        
}
