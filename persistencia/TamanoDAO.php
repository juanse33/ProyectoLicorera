<?php
class TamanoDAO {

    private $idtamaño;
    private $nombre;

    function TamanoDAO($idtamaño="",  $nombre=""){
        $this -> idtamaño = $idtamaño;
        $this -> nombre = $nombre;
    }
    
    function consultarTodos(){
        return "select idtamaño, nombre
                from tamaño";
    }

    function consultar(){
        return "select idtamaño, nombre
                from tamaño
                where idtamaño='".$this -> idtamaño ."'"; 
    }


}
?>