<?php
$filtro = $_GET['producto'];
if($filtro != "-1"){
    $producto = new Producto();
    $productos = $producto -> buscar($filtro);
    if(count($productos)>0){
        echo "<div  class='list-group'>";
        foreach ($productos as $c){
            echo "<button type='button' id='c". $c  -> getId() ."' class='list-group-item list-group-item-action'>". $c -> getNombre()."-". $c -> getTamaño() -> getNombre() ."</button>";
		}
        echo "</div>";
    }
}else{
    echo "";
}
?>

<script type="text/javascript">
$(document).ready(function(){
	<?php 
	   foreach ($productos as $c){
	       echo "$(\"#c" . $c -> getId() . "\").click(function(){\n";
	       echo "$(\"#producto\").val(\"" . $c -> getNombre()."-". $c -> getTamaño() -> getNombre() . "\");\n";	       
		   echo "$(\"#idProducto\").val(\"" . $c-> getId() . "\");\n";
		   echo "$(\"#precioProducto\").val(\"" . $c-> getPrecio() . "\");\n";
	       echo "});\n";
	   }
	   //Aqui se oculta la lista.
	   foreach ($productos as $c){
	       echo "$(\"#c" . $c -> getId() . "\").click(function(){\n";
	       echo "$(\"#resultadosPro\").hide();\n";	       
	       echo "});\n";
	   }
	   
	?>
});
	
</script>