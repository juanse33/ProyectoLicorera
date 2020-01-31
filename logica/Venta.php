<?php
require 'persistencia/VentaDAO.php';
class Venta{
    private $conexion;
    private $idventa;
    private $idadministrador;
    private $idcliente;
    private $fecha;
    private $ventaDAO;
    
    function Venta($idventa="", $idadministrador="", $idcliente="",  $fecha=""){
        $this -> idventa = $idventa;
        $this -> idadminstrador = $idadministrador;
        $this -> idcliente = $idcliente;
        $this -> fecha = $fecha;
        $this -> conexion = new Conexion();
        $this -> ventaDAO = new VentaDAO($idventa, $idadministrador, $idcliente,  $fecha);
    }

    function getId(){
        return $this -> idventa;
    }

    function getAdministrador(){
        return $this -> idadministrador;
    }
   
    function getCliente(){
        return $this -> idcliente;
    }

    function getFecha(){
        return $this -> fecha;
    }

    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> consultar());
        echo "xd".$this -> ventaDAO -> consultar();
        $registro = $this -> conexion -> extraer();
        $this -> idventa = $registro[0];
        $administrador = new Administrador($registro[1]);
        $administrador -> consultar(); 
        $this -> idadministrador = $administrador;
        $cliente = new Cliente($registro[2]);
        $cliente -> consultar(); 
        $this -> fecha = $registro[3];
        $this -> conexion -> cerrar();
    }

    function consultarUltimo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> consultarUltimo());
        $registro = $this -> conexion -> extraer();
        $this -> idventa = $registro[0];
        $administrador = new Administrador($registro[1]);
        $administrador -> consultar(); 
        $this -> idadministrador = $administrador;
        $cliente = new Cliente($registro[2]);
        $cliente -> consultar(); 
        $this -> fecha = $registro[3];
        $this -> conexion -> cerrar();
    }

    function consultarMes($idmes){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> consultarMes($idmes));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new venta($registro[0], $registro[1], $registro[2], $registro[3]);
        }
        return $registros;
    }
       
}
