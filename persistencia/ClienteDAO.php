<?php
class ClienteDAO {
    private $idcliente;
    private $nombre;
    private $apellido;
    private $direccion;

    
    function ClienteDAO($idcliente="", $nombre="", $apellido="", $direccion=""){
        $this -> idcliente = $idcliente;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> direccion = $direccion;
    }    
    
    function consultar(){        
        return "select *
                from cliente a
                where a.idcliente = '" . $this -> idcliente . "'";
    }
    
    function buscar($filtro){
        return "select idcliente, nombre, apellido, direccion
                from cliente
                where nombre like '" . $filtro . "%'";
     }
}
?>