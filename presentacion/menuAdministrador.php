<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador -> consultar();    
?>
<nav class="navbar navbar-expand-lg navbar-light text-light " style="background-color: #ffe7b2  ;">

<ul class="navbar-nav mr-auto">
<li class="nav-item ">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php")?>"><img src="img/icon2.png" data-toggle='tooltip' data-placement='left' title='Inicio'>       Licores UD</a>
</li>
</ul> 
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">   
      <li class="nav-item ">
        <a class="nav-link" href='index.php?pid=<?php echo base64_encode("presentacion/producto/consultarProductos.php")?> 'tabindex="-1"><img src="img/consultar.png">
					Productos
		     </a>
      </li>
        <li class="nav-item ">
        <a class="nav-link" href='index.php?pid=<?php echo base64_encode("presentacion/producto/añadirProducto.php")?>'><img src="img/cestaxd.png">
					Añadir productos
		     </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href='index.php?pid=<?php echo base64_encode("presentacion/venta/crearVenta.php")?>'><img src="img/venta.png">
					Crear venta
		     </a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href='index.php?pid=<?php echo base64_encode("presentacion/venta/reporteMes.php")?>'><img src="img/pdf.png">
					Reporte de mes
		     </a>
         </li>
       </ul> 
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link disabled"   tabindex="-1" ><?php echo $administrador -> getNombre() . " " . $administrador -> getApellido(); ?></a>
      </li>
      
      </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?salir=1"  >Salida</a>
      </li>
      </ul>
      </ul>
  </div>
</nav>