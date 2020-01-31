<?php
require 'pdf/class.pdf.php';
require 'pdf/class.ezpdf.php';


$pdf = new Cezpdf('LETTER');
$pdf -> selectFont('pdf/fonts/Helvetica.afm');
$pdf -> ezSetCmMargins(1, 1, 2, 1);
$pdf -> setColor(0,0,0);
$tletra1=22;
$tletra=12;
$texto ="Reporte de venta del mes de " . $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
$pdf -> ezText($texto, $tletra1, array('justification' => 'center'));
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$texto6="Ventas realizadas por el administrador ". $administrador->getNombre(). "\n";
$pdf -> ezText($texto6, 18, array('justification' => 'center'));
if($_POST['mes']=="enero"){
    echo $_POST['ano'];
    
    $Venta = new Venta();
    $fechainicial=$_POST['ano']."-01-01";
    $fechafinal=$_POST['ano']."-01-31";
    $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
    
    if(count($Ventas)>0){
        foreach ($Ventas as $e){
            $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
        }
        $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
        $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
    }else{
        $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
        $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
    }
    $factura2 = new venta();
    if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
        $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }else{
        $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }
}
if($_POST['mes']=="febrero"){
    echo $_POST['ano'];
    
    $Venta = new Venta();
    $fechainicial=$_POST['ano']."-02-01";
    $fechafinal=$_POST['ano']."-02-31";
    $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
    
    if(count($Ventas)>0){
        foreach ($Ventas as $e){
            $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
        }
        $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
        $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
    }else{
        $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
        $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
    }
    $factura2 = new venta();
    if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
        $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }else{
        $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }
}
if($_POST['mes']=="marzo"){
    echo $_POST['ano'];
    
    $Venta = new Venta();
    $fechainicial=$_POST['ano']."-03-01";
    $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
    
    if(count($Ventas)>0){
        foreach ($Ventas as $e){
            $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
        }
        $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
        $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
    }else{
        $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
        $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
    }
    $factura2 = new venta();
    if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
        $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }else{
        $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }
}
if($_POST['mes']=="abril"){
    echo $_POST['ano'];
    
    $Venta = new Venta();
    $fechainicial=$_POST['ano']."-04-01";
    $fechafinal=$_POST['ano']."-04-31";
    $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
    
    if(count($Ventas)>0){
        foreach ($Ventas as $e){
            $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
        }
        $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
        $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
    }else{
        $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
        $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
    }
    $factura2 = new venta();
    if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
        $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }else{
        $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }
}
if($_POST['mes']=="mayo"){
    echo $_POST['ano'];
    
    $Venta = new Venta();
    $fechainicial=$_POST['ano']."-05-01";
    $fechafinal=$_POST['ano']."-05-31";
    $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
    
    if(count($Ventas)>0){
        foreach ($Ventas as $e){
            $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
        }
        $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
        $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
    }else{
        $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
        $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
    }
    $factura2 = new venta();
    if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
        $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }else{
        $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }
}
if($_POST['mes']=="junio"){
    echo $_POST['ano'];
    
    $Venta = new Venta();
    $fechainicial=$_POST['ano']."-06-01";
    $fechafinal=$_POST['ano']."-06-31";
    $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
    
    if(count($Ventas)>0){
        foreach ($Ventas as $e){
            $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
        }
        $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
        $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
    }else{
        $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
        $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
    }
    $factura2 = new venta();
    if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
        $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }else{
        $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
        $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
    }
}
if($_POST['mes']=="julio"){
    echo $_POST['ano'];
    $Venta = new Venta();
    $fechainicial=$_POST['ano']."-07-01";
    $fechafinal=$_POST['ano']."-07-31";
    $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
    
    if(count($Ventas)>0){
        $pdf ->ezText("__________________________________________________________________________",25);
        $pdf ->ezText("                            LICORERA       ",25);
        $pdf ->ezText("");
        
        foreach ($Ventas as $e){
            $col[] = array('factura' => $e -> getIdVenta(), 'Fecha de compra'=>$e-> getFecha() , 'Nombre' => $e -> getNombre() , 'Cedula' => $e -> getCedula(), 'Precio' => $e -> getTotal());
        }
        $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
    }else{
        $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
        $pdf -> ezText($texto7, 18, array('justification' => 'center'));
    }
    $factura2 = new venta();
    if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
        $pdf ->ezText("Total general de Ventas Mensuales:---------------------------    $0 ----------------------------------",24);
    }else{
        $suma= ($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']));
        $pdf ->ezText("",12);
        $pdf ->ezText("",12);
        $pdf ->ezText("---------------------------------------   TOTAL  POR LA VENTA MENSUAL  ----------------------------------",12);
        $pdf ->ezText("",12);
        $pdf -> ezText("$". $suma, 18, array('justification' => 'center'));
        $pdf ->ezText("------------------------------------------------------------------------------------------------------------------------------",12);
        
    }
 }
 if($_POST['mes']=="agosto"){
     echo $_POST['ano'];
     
     $Venta = new Venta();
     $fechainicial=$_POST['ano']."-08-01";
     $fechafinal=$_POST['ano']."-08-31";
     $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
     
     if(count($Ventas)>0){
         foreach ($Ventas as $e){
             $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
         }
         $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'pre'=>"Precio" );
         $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
     }else{
         $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
         $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
     }
     $factura2 = new venta();
     if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
         $texto2="Total general de la venta:.............................................................................................$0";
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }else{
         $texto2="Total general de la venta:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }
 }
 if($_POST['mes']=="septiembre"){
     echo $_POST['ano'];
     
     $Venta = new Venta();
     $fechainicial=$_POST['ano']."-09-01";
     $fechafinal=$_POST['ano']."-09-31";
     $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
     
     if(count($Ventas)>0){
         foreach ($Ventas as $e){
             $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
         }
         $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
         $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
     }else{
         $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
         $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
     }
     $factura2 = new venta();
     if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
         $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }else{
         $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }
 }
 
 if($_POST['mes']=="octubre"){
     echo $_POST['ano'];
     
     $Venta = new Venta();
     $fechainicial=$_POST['ano']."-10-01";
     $fechafinal=$_POST['ano']."-10-31";
     $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
     
     if(count($Ventas)>0){
         foreach ($Ventas as $e){
             $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
         }
         $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
         $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
     }else{
         $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
         $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
     }
     $factura2 = new venta();
     if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
         $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }else{
         $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }
 }
 if($_POST['mes']=="noviembre"){
     echo $_POST['ano'];
     
     $Venta = new Venta();
     $fechainicial=$_POST['ano']."-11-01";
     $fechafinal=$_POST['ano']."-11-31";
     $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
     
     if(count($Ventas)>0){
         foreach ($Ventas as $e){
             $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
         }
         $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
         $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
     }else{
         $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
         $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
     }
     $factura2 = new venta();
     if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
         $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }else{
         $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }
 }
 if($_POST['mes']=="diciembre"){
     echo $_POST['ano'];
     
     $Venta = new Venta();
     $fechainicial=$_POST['ano']."-12-01";
     $fechafinal=$_POST['ano']."-12-31";
     $Ventas = $Venta-> consultarFecha($fechainicial,$fechafinal, $_SESSION['id']);
     
     if(count($Ventas)>0){
         foreach ($Ventas as $e){
             $col[] = array('fact' => $e -> getIdVenta(), 'fec'=>$e-> getFecha() , 'nom' => $e -> getNombre() , 'ced' => $e -> getCedula(), 'prod' => $e -> getTotal());
         }
         $titles = array('fact'=>"factura",'fec'=>"Fecha de compra" ,'nom'=>"Nombre",'ced'=>"Cedula",'prod'=>"Total Venta" );
         $pdf -> ezTable($col, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
     }else{
         $texto7="No se hicieron ventas en el mes de ". $_POST['mes'] . " del año " . $_POST['ano'] . "\n";
         $pdf -> ezText($texto7, $tletra, array('justification' => 'center'));
     }
     $factura2 = new venta();
     if($factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id'])==null){
         $texto2="Total general de Ventas Mensuales:.............................................................................................$0";
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }else{
         $texto2="Total general de Ventas Mensuales:.............................................................................................$" . $factura2-> getCount($fechainicial,$fechafinal, $_SESSION['id']);
         $pdf -> ezText($texto2, $tletra, array('justification' => 'left'));
     }
 }
$pdf -> ezStream();

?>