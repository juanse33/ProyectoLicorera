<?php
$filtro = $_GET['filtro'];
$producto = new Producto();
$productos = $producto -> buscar($filtro);
if(count($productos)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Cantidad Disponible</th>
			<th>Precio</th>

			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($productos as $p) {
			
	        echo "<tr>";
	        echo "<td>" . $p -> getNombre() . " - ". $p -> getTamaño() -> getNombre() . "</td>";
	        echo "<td>" . $p -> getCantidad() . "</td>";
			echo "<td>" . $p -> getPrecio() . "</td>";
			echo "<td>";
				echo "<a href='#modal' data-toggle='modal' >";
					echo "<i id='icono".$p->getId()."' class='far fa-edit' data-toggle='tooltip' data-placement='left' title='Editar producto'></i>";
				echo "</a>";
				echo "</td>";
				echo "</tr>";
				echo "<div class='modal fade'  id='modal'>";
			$pEdit = new Producto($p -> getId());
				$pEdit -> consultar();
				echo "<div class='modal-dialog' role='document'>";
				echo "<div class='modal-content'>";
				echo "<div class='modal-header'>";
				echo "<h5 class='Editar Producto'>EDITAR PRODUCTO</h5>";
				echo "</div>";
				echo "<div class='modal-body'>";
				echo "<form method='post'  action='' >";
				echo "<div class='form-group'>";
				echo "<label>Nombre</label>"; 
                echo "<input name='nombre' type='text'
								class='form-control' value=" . $pEdit -> getNombre() ."
								required='required'>";
			    echo "</div>";
				echo "<div class='form-group'>";
				echo "<label>Apellido</label> <input name='cantidad' type='text'
								class='form-control' value=" . $pEdit -> getCantidad() ."
								required='required'>"; 
				echo "</div>";
				echo "<div class='form-group'>";
				echo "<label>Correo</label> <input name='precio' type='text'
								class='form-control' value= ". $pEdit -> getPrecio() . "
								required='required'>";						
				echo "</div>";
				echo "<button type='submit' name='actualizar' class='btn text-white' style='background-color:#4F066C;'>Actualizar Datos</button>";
				echo "</form>";
				echo "</div>";
				echo " <div class='modal-footer'>";
				echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
				echo " <button type='button' class='btn btn-primary'>Save changes</button>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
		

		
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


    


         
        
      
      
        
      

        
       
