<?php
include 'presentacion/menuAdministrador.php';
$error = 0;
if(isset($_POST['añadir'])){
    $producto = new Producto("", $_POST['nombre'], "", $_POST['tamaño'], $_POST['cantidad'], $_POST['precio']);
	$producto -> insertar();
	
}

?>
<br/>
<br/>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header text-white" style="background-color:#4F066C;">Añadir producto</div>
				<div class="card-body">
					<?php 
					if(isset($_POST['añadir'])){
						echo "<div class='alert alert-success alert-dismissible fade show'
						role='alert'>
						Producto añadido
						<button type='button' class='close' data-dismiss='alert'
						aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
						</button>
						</div>";
					}
					?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/producto/añadirProducto.php") ?>">
						<div class="form-group">
							<label>Nombre</label> 
                            <input name="nombre" type="text"
								class="form-control"  placeholder="Digite Nombre" required="required">
						</div>
						<div class="form-group">
						<label>Tamaño del producto</label>
						<select class="custom-select" name="tamaño">
								<?php
									$tamaño = new Tamano();
									$tamaños = $tamaño -> consultarTodos();
									foreach($tamaños as $t){
											echo "<option value=". $t -> getId() .">". $t -> getNombre() ."</option>";
										
									}  								
								?>
						</select>
						</div>
						<div class="form-group">
							<label>Cantidad Disponible</label> <input name="cantidad" type="text"
								class="form-control" placeholder="Digite Cantidad"
								required="required">
						</div>
						<div class="form-group">
							<label>Precio</label> <input name="precio" type="text"
								class="form-control" placeholder="Digite Precio"
								required="required">
						</div>
						<button type="submit" name="añadir" class="btn text-white" style="background-color:#4F066C;">Añadir </button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#programa").keyup(function(){
		if($("#programa").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/registroAjax.php"); ?>&programa="+$("#programa").val();
			$("#resultados").load(ruta);
		}
	});
 	$("#programa").focusout(function(){
		var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/registroAjax.php"); ?>&programa=-1";
 		$("#resultados").load();
 	});
});
</script>

