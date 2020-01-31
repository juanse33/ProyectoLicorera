<?php
$filtro = $_GET['cliente'];
if($filtro != "-1"){
    $cliente = new Cliente();
    $clientes = $cliente -> buscar($filtro);
    if(count($clientes)>0){
        echo "<div  class='list-group'>";
        foreach ($clientes as $c){
            echo "<button type='button' id='c". $c  -> getId() ."' class='list-group-item list-group-item-action'> ". $c -> getId() ." - ". $c -> getNombre()." ". $c -> getApellido() ."</button>";
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
	   foreach ($clientes as $c){
	       echo "$(\"#c" . $c -> getId() . "\").click(function(){\n";
	       echo "$(\"#cliente\").val(\"" . $c -> getId() ." - ". $c -> getNombre()." ". $c -> getApellido() . "\");\n";	       
	       echo "$(\"#idCliente\").val(\"" . $c-> getId() . "\");\n";
	       echo "});\n";
	   }
	   //Aqui se oculta la lista.
	   foreach ($clientes as $c){
	       echo "$(\"#c" . $c -> getId() . "\").click(function(){\n";
	       echo "$(\"#resultados\").hide();\n";	       
	       echo "});\n";
	   }
	   
	?>
});
	
</script>