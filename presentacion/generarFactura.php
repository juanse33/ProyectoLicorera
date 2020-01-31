<?php
require 'pdf/class.pdf.php';
require 'pdf/class.ezpdf.php';

$tletra=12;
$pdf = new Cezpdf('LETTER');
$pdf -> selectFont('pdf/fonts/Helvetica.afm');
$pdf -> ezSetCmMargins(1, 1, 2, 1);
$pdf -> setColor(0,0,0);

$pdf -> setColor(0,0,0);

$suma = 0;
$total = 0;

$detalle = new Detalle("", $_GET["idVenta"]);
$detalles = $detalle -> consultarTodos();
$venta= new Venta($_GET["idVenta"]);
$venta -> consultar();
$pdf ->ezText("LICORES UD",25);

$pdf ->ezText("                                                                                   ", 12);
$pdf ->ezText("                                                                                   ", 12);
$fecha= "Fecha: ".$venta -> getFecha();
$numerofactura="Nro Factura: ".$venta -> getId();


$pdf ->ezText($numerofactura, $tletra, array('justification' => 'center'));

$pdf -> ezText($texto1, $tletra, array('justification' => 'center'));
$pdf -> ezText($fecha, $tletra, array('justification' => 'center'));
$pdf ->ezText("                                                                                   ", 12);
$pdf ->ezText("                                                                                   ", 12);
$pdf ->ezText("                                        Producto                         Cantidad               Precio",14);
$pdf ->ezText("____________________________________________________________________________", 12);
$pdf ->ezText("                                                                                   ", 12);
foreach($detalles as $d){
    $total = ($total + $d -> getPrecio());
    $texto = "              ".$d -> getProducto() -> getNombre()."". $d -> getProducto() -> getTamaño() -> getNombre() ."              " . $d -> getCantidad() . "                        " . $d -> getProducto() -> getPrecio()." ";
    $pdf -> ezText($texto, $tletra, array('justification' => 'rigt'));
    
}

$pdf ->ezText("",12);
$pdf ->ezText("",12);
$pdf ->ezText("",12);
$pdf ->ezText("TOTAL A PAGAR",11);
$pdf ->ezText("",12);
$pdf -> ezText("$". $total, 18, array('justification' => 'left'));


$texto = "Gracias por tu compra :)";
$pdf ->ezText("",12);
$pdf -> ezText( $texto, 14, array('justification' => 'center'));
$pdf -> ezStream();
//ob_end_flush();

?>