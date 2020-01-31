<?php
include 'presentacion/menuAdministrador.php';

if(isset($_POST['consultar'])){
    $pid = base64_encode("presentacion/generarReporte.php");
		header('Location: index.php?pid='. $pid . '&idmes='. $_POST['mes']) ;
}
?>
<br/>
<br/>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header text-white" style="background-color:#4F066C;">Reporte del mes</div>
				<div class="card-body">
					<form method="post">
						<div class="form-group">
                            <label>Seleccione el mes: </label>
                            <select class='custom-select' name="mes">
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Nobiembre</option>
                                <option value="12">Diciembre</option>
                                </select>
							<div class="form-group">
									<br/>
								<button type="submit" name="consultar"  target="_blank" class="btn text-white" style="background-color:#4F066C;">Ver Reporte</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>