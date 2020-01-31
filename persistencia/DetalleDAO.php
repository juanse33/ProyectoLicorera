<?php
class DetalleDAO {
    private $iddetalle;
    private $idventa;
    private $idproducto;
    private $cantidad;
    private $precio;
    
    function DetalleDAO($iddetalle="", $idventa="", $idproducto="", $cantidad="",  $precio=""){
        $this -> iddetalle = $iddetalle;
        $this -> idventa = $idventa;
        $this -> idproducto = $idproducto;
        $this -> cantidad = $cantidad;
        $this -> precio = $precio;
    }
    
    function consultar(){        
        return "select *
                from detalle d";
    }

    function consultarTodos(){        
        return "select *
                from detalle where idventa='". $this -> idventa ."'";
    }


    function insertar(){
        return "insert into `detalle` (`idventa`,`idproducto`, `cantidad`, `precio`) 
        values ('1','" . $this -> idproducto . "', '". $this -> cantidad ."','". $this -> precio ."')";
    }

    function actualizar(){
        return "update detalle
                set idventa='" . $this-> idventa ."' where idventa='1'";
    }
    
}
?>