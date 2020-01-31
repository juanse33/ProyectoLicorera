<?php
require 'persistencia/TamanoDAO.php';
class Tamano{
    private $conexion;
    private $idtamaño;
    private $nombre;
    private $tamañoDAO;
    
    function Tamano($idtamaño="",  $nombre=""){
        $this -> idtamaño = $idtamaño;
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> tamañoDAO = new TamanoDAO($idtamaño, $nombre);
    }

    function getId(){
        return $this -> idtamaño;
    }

    function getNombre(){
        return $this -> nombre;
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tamañoDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Tamano($registro[0], $registro[1]);
        }
        return $registros;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tamañoDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idtamaño = $registro[0];
        $this -> nombre = $registro[1];
        $this -> conexion -> cerrar();
    }

        
}
