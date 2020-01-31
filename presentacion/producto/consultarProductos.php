<?php
include 'presentacion/menuAdministrador.php';
?>
<br/>
<br/>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
			<div class="card-header text-white" style="background-color:#4F066C;">Productos</div>
			
				<div class="card-body">
					<div class="form-group">
						<label>Productos a buscar</label> <input name="filtro" id="filtro" type="text"
							class="form-control" placeholder="Ingrese un valor" >
					</div>
					<div id="resultados"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#filtro").keyup(function(){
		if($("#filtro").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/producto/consultarProductosAjax.php"); ?>&filtro="+$("#filtro").val();
			$("#resultados").load(ruta);
		}
	});
});
</script>k 