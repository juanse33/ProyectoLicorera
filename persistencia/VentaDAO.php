<?php
class VentaDAO {
    private $idventa;
    private $idadministrador;
    private $idcliente;
    private $fecha;

    
    function VentaDAO($idventa="", $idadministrador="", $idcliente="",  $fecha=""){
        $this -> idventa = $idventa;
        $this -> idadministrador = $idadministrador;
        $this -> idcliente = $idcliente;
        $this -> fecha = $fecha;
    }
     
    function consultar(){        
        return "select *
                from venta 
                where idventa = '" . $this -> idventa . "'";
    }

    function consultarTodos(){
        return "select idproducto, nombre, idtamaño, cantidad, precio
                from producto";
    }

    function buscar($filtro){
        return "select *
                from producto
                where nombre like '" . $filtro . "%'";        
    }
    
    function insertar(){
        return "insert into `venta` ( `idadministrador`, `idcliente`, `fecha`) 
                values ('" . $this -> idadministrador . "', '" . $this -> idcliente . "', '". date('y-m-d') ."')";
    }

    function consultarUltimo(){
        return "select * 
                from venta order by idventa desc limit 1";
    }

    function consultarMes($idmes){
        return "select * from venta where month(fecha) ='" . $idmes . "'";
    }
    
}
?>