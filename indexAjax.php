<?php
require 'logica/Administrador.php';
require 'logica/Producto.php';
require 'logica/Tamano.php';
require 'logica/Cliente.php';
require 'logica/Venta.php';
require 'logica/Detalle.php';
require 'persistencia/Conexion.php';
include base64_decode($_GET['pid']);
?>
    <script type="text/javascript">
    $(function () {
    	  $('[data-toggle="tooltip"]').tooltip()
    	})
    </script>
