<?php
require 'logica/Administrador.php';
require 'logica/Producto.php';
require 'logica/Tamano.php';
require 'logica/Cliente.php';
require 'logica/Venta.php';
require 'logica/Detalle.php';
require 'persistencia/Conexion.php';
require 'pdf/class.pdf.php';
require 'pdf/class.ezpdf.php';

$estudiante = new Estudiante();
$estudiantes = $estudiante -> consultarTodos();

$pdf = new Cezpdf('LETTER');
$pdf -> selectFont('pdf/fonts/Helvetica.afm');
$pdf -> ezSetCmMargins(1, 1, 2, 1);

$pdf -> setColor(0,0,0);

$tletra=10;
foreach ($estudiantes as $e){
    $texto = $e -> getId() . ", " . $e -> getNombre() . ", " . $e -> getApellido();
    $pdf -> ezText($texto, $tletra, array('justification' => 'center'));    
}

$pdf -> ezStream();
//ob_end_flush();

?>