<?php 
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';
$administrador = new Administrador($_SESSION['id']);
$administrador -> consultar();
$producto = new Producto();
$productos = $producto -> consultarTodos();
foreach ($productos as $p){
	

			echo "<div class='card-group'>";
			echo "<div class='card-body'>";
			echo "<strong>" . $p -> getNombre() . "</strong>";
			echo "</div>";
			echo "<div class='row'>";
			echo "<div class='card-body'>";
			echo "<h6> Cantidad Disponible:      " . $p -> getCantidad() . "</h6>";
			echo "<h6> Precio unitario:      " . $p -> getPrecio(). "</h6>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}    
	
				


?>
<br/>
<br/>
