<?php
include 'presentacion/menuAdministrador.php';
$error = 0;
$idVenta = "";
if(isset($_POST["confirmar"])){
	//header("Location:index.php?pid=" . base64_encode("presentacion/venta/confirmarVenta.php"));
	$venta = new Venta("",$_SESSION['id'],$_POST["idCliente"],"");
	$venta -> insertar(); 
	$ventaUltimo = new Venta();
	$ventaUltimo -> consultarUltimo();
	$idVenta = $ventaUltimo -> getId();
	$detalle = new Detalle();
	$detalles = $detalle -> consultar();
	foreach ($detalles as $d) {
			$detalleactualizar = new Detalle("", $ventaUltimo -> getId());
			$detalleactualizar -> actualizar();
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
				<?php 
					if(isset($_POST["confirmar"])){
						echo "<div class='alert alert-success alert-dismissible fade show'
						role='alert'>
						Venta registrada
						<button type='button' class='close' data-dismiss='alert'
						aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
						</button>
						</div>";
					}
				?>
				<div class="card-header  text-white" style="background-color:#4F066C;">Crear venta</div><br/>
					<form method="post">
						<div class="form-group">
							<label>Seleccione el Cliente</label>
							<input type="text" class="form-control" placeholder="Digite Nombre " name="cliente" id="cliente">
							<input name="idCliente" id="idCliente" type="hidden" class="form-control">
							<div id="resultados"></div>
						</div> 
							<button id="confirmar" type="submit" name="confirmar" class="btn text-white" style="background-color:#4F066C;">Confirmar compra</button>				
							<br/>
							<div class="row">
							<a class="nav-link" href='index.php?pid=<?php echo base64_encode("presentacion/generarFactura.php") ."&idVenta=" . $idVenta ?>'><img src="img/pdf.png">
								Generar PDF
		     				</a>
							</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<br/>
<br/>

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

});
</script>