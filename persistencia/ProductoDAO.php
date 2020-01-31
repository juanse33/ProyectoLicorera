<?php
class ProductoDAO {
    private $idproducto;
    private $idtamaño;
    private $nombre;
    private $foto;
    private $cantidad;
    private $precio;

    
    function ProductoDAO($idproducto="", $nombre="", $foto="", $idtamaño="", $cantidad="", $precio=""){
        $this -> idproducto = $idproducto;
        $this -> idtamaño = $idtamaño;
        $this -> nombre = $nombre;
        $this -> foto = $foto;
        $this -> cantidad = $cantidad;
        $this -> precio = $precio;
    }
    
     
    function consultar(){        
        return "select *
                from producto p
                where p.idproducto = '" . $this -> idproducto . "'";
    }

    function consultarTodos(){
        return "select idproducto, nombre, idtamaño, cantidad, precio
                from producto";
    }

    function buscar($filtro){
        return "select idproducto, nombre, foto, idtamaño, cantidad, precio
                from producto
                where nombre like '" . $filtro . "%'";
                
    }

    function actualizar(){
        return "update producto
                set nombre='".$this -> nombre."', idtamaño='". $this -> idtamaño ."', cantidad='" . $this-> cantidad . "', precio='". $this -> precio ."'
                where idproducto = '" .$this -> idproducto . "'";
    }

    function insertar(){
        return "insert into `producto` (`nombre`, `idtamaño`, `cantidad`, `precio`) 
                values ('" . $this -> nombre . "', '" . $this -> idtamaño . "', '".  $this -> cantidad ."','" . $this -> precio ."')";
    }
    
}
?>