<?php
$detalle = new Detalle("1");
$detalles = $detalle -> consultar();

if(count($detalles)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Codigo Producto</th>
			<th>Nombre Producto</th>
			<th>Cantidad</th>
			<th>Precio</th>

			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($detalles as $d) {
			
	        echo "<tr>";
			echo "<td>" . $d -> getId() . "</td>";
			echo "<td>" . $d -> getNombre()."-". $d -> getTamaño() -> getNombre() . "</td>";
	        echo "<td>" . $p -> getCantidad() . "</td>";
			echo "<td>" . $p -> getPrecio() . "</td>";
			echo "</tr>";
		}
	     ?>

	</tbody>
</table>
<?php } else { ?>

<div class="alert alert-danger alert-dismissible fade show"
	role="alert">
	No se encontraron resultados
	<button type="button" class="close" data-dismiss="alert"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php } ?>


    


         
        
      
      
        
      

        
       
