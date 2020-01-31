<?php
require 'presentacion/menuAdministrador.php';
$error = 65;
$producto = new Producto($_GET["idProducto"]);

if (isset($_POST['actualizar'])) {
	$productoActualizar = new Producto($_GET["idProducto"], $_POST['nombre'], "", $_POST['tamaño'], $_POST['cantidad'], $_POST['precio']);
	$productoActualizar -> actualizar();
	//header("Location: index.php?pid=" . base64_encode("presentacion/producto/editarProducto.php") . "&idProducto=" . $productoActualizar -> getId());
	$error = 15;
}

$producto -> consultarTodos();

?>
<br/>
<br/>

<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header  text-white" style="background-color:#4F066C;">Actualizar datos producto</div>
				<div class="card-body">
				<?php 
				if (isset($_POST['actualizar'])){
					echo "<div class='alert alert-success alert-dismissible fade show'
					role='alert'>
					Actualizacion realizada
					<button type='button' class='close' data-dismiss='alert'
					aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					</div>";
			}
				?>
					<form method="post" >
						<div class="form-group">
							<label>Nombre</label> 
                            <input name="nombre" type="text"
								class="form-control" value="<?php echo $producto -> getNombre() ?> "
								required="required">
						</div>
						<div class="form-group">
						<label>Tamaño del producto</label>
						<select class="custom-select" name="tamaño">
								
								<?php
									echo "<option value=". $producto -> getTamaño() -> getId() ." >". $producto -> getTamaño() -> getNombre() ."</option>";
									$tamaño = new Tamano();
									$tamaños = $tamaño -> consultarTodos();
									foreach($tamaños as $t){
										if($producto -> getTamaño() -> getId() != $t -> getId()){
											echo "<option value=". $t -> getId() .">". $t -> getNombre() ."</option>";
										}
									}  
								
								?>
						</select>
						</div>
						<div class="form-group">
							<label>Cantidad Disponible</label> <input name="cantidad" type="text"
								class="form-control" value="<?php echo $producto -> getCantidad() ?> "
								required="required">
						</div>
						<div class="form-group">
							<label>Precio</label> <input name="precio" type="text"
								class="form-control" value="<?php echo $producto -> getPrecio() ?> "
								required="required">
						</div>
						<button type="submit" name="actualizar" class="btn text-white" style="background-color:#4F066C;">Actualizar Datos</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>