<?php
include 'presentacion/menuAdministrador.php';
$error = 0;
if(isset($_POST["añadir"])){
	$producto = new Producto ($_POST["idProducto"]);
	$producto -> consultarTodos();
	if($producto -> getCantidad() > $_POST["cantidad"]){
		$restaCantidad = $producto -> getCantidad() - $_POST["cantidad"];
		echo "resta: ". $restaCantidad;
		$precioTotal = $_POST["precioProducto"] * $_POST["cantidad"];
		$detalle = new Detalle("","",$_POST["idProducto"], $_POST["cantidad"], $precioTotal);
		$detalle -> insertar();
		$productoActualizar = new Producto ($_POST["idProducto"],"","","",$restaCantidad);
		$productoActualizar -> actualizar();
	}
	else{
		$error = 1;
	}
}
?>
<br/>
<div class="container">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<div class="card ">
				
				<div class="card-body">
				<div class="card-header  text-white" style="background-color:#4F066C;">Crear venta</div><br/>
					<form method="post" autocomplete="off">
					<div class="row">
						<div class="col">
							<label>Producto</label>
							<div class="col-xs-2"></div>
							<input type="text" class="form-control" placeholder="Digite Nombre " name="producto" id="producto">
							<div class="col-xs-2"></div>
							<input name="idProducto" id="idProducto" type="hidden" class="form-control">
							<input name="precioProducto" id="precioProducto" type="hidden" class="form-control">   
							<div id="resultadosPro"></div>
						</div>
						<div class="col">
							<label>Cantidad</label><input type="text" class="form-control"  placeholder="Ingrese cantidad" name="cantidad">
						</div>
						<div class="col">
							<button id="añadir" type="submit" name="añadir" class="btn text-white" style="background-color:#4F066C;">Agregar al carrito</button>
						</div>
						
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<br/>
<br/>
<div class="container">
<?php
if(isset($_POST["añadir"])){
$detalle = new Detalle();
$detalles = $detalle -> consultar();

if($error = 1){
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
			if($d -> getVenta() == 1){
				echo "<tr>";
				echo "<td>" . $d -> getProducto() -> getId() ."</td>";
				echo "<td>" . $d -> getProducto() -> getNombre() ."-". $d -> getProducto() -> getTamaño() -> getNombre() . "</td>";
				echo "<td>" . $d -> getCantidad() . "</td>";
				echo "<td>" . $d -> getPrecio() . "</td>";
				echo "</tr>";
			}
		}
	?>
	
	</tbody>
</table>
<div class="col text-center">
<?php echo "<a class='btn btn-outline-warning' href='index.php?pid=" . base64_encode("presentacion/venta/confirmarVenta.php") ."'>Continuar</a>";?>	
</div>
<?php } else { ?>

<div class="alert alert-danger alert-dismissible fade show"
	role="alert">
	No hay disponibilidad
	<button type="button" class="close" data-dismiss="alert"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php }} ?>

<script type="text/javascript">
$(document).ready(function(){
	$("#cliente").keyup(function(){
		if($("#cliente").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/cliente/buscarClienteAjax.php"); ?>&cliente="+$("#cliente").val();
			$("#resultados").load(ruta)
		}
	});
 	$("#cliente").focusout(function(){
		var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/cliente/buscarClienteAjax.php"); ?>&cliente=-1";
 		$("#resultados").load();
 	});
	
	 $("#producto").keyup(function(){
		if($("#producto").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/producto/buscarProductosAjax.php"); ?>&producto="+$("#producto").val();
			$("#resultadosPro").load(ruta)
		}
	});
 	$("#producto").focusout(function(){
		var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/producto/buscarProductosAjax.php"); ?>&producto=-1 ";
 		$("#resultadosPro").load();
 	});

	 $("#añadir").click(function(){
		if($("#añadir").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/producto/carritoAjax.php"); ?>&añadir="+$("#añadir").val();
			$("#resultadosAñadir").load(ruta)
		}
	});

});
</script>

