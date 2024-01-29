 <!-- Realizar la conexión al servidor -->
 <?php  require ('../../Perfile.php'); ?>
<!-- Conexión con el servidor -->
<?php
    
    date_default_timezone_set("America/Monterrey");
    $F_Update = date("m/d/Y H:i:s a");



	$Texto_1 = $_POST['Texto_1'];
	$sql1 = "UPDATE dbo.TabTextSSYS SET  Texto='$Texto_1', FechaUpdate = '$F_Update', IdUsuario = '$ClaveActiva' where IdTexto = '1' ";
	$resultado1 = sqlsrv_query($con, $sql1);

	$Texto_2 = $_POST['Texto_2'];
	$sql2 = "UPDATE dbo.TabTextSSYS SET  Texto='$Texto_2', FechaUpdate = '$F_Update', IdUsuario = '$ClaveActiva' where IdTexto = '2'";
	$resultado2 = sqlsrv_query($con, $sql2);  

	$evento_1 = $_POST['evento_1'];
	$sql3 = "UPDATE dbo.TabTextSSYS SET  Texto='$evento_1', FechaUpdate = '$F_Update', IdUsuario = '$ClaveActiva' where IdTexto = '3'";
	$resultado3 = sqlsrv_query($con, $sql3);    

	$evento_2 = $_POST['evento_2'];
	$sql4 = "UPDATE dbo.TabTextSSYS SET  Texto='$evento_2', FechaUpdate = '$F_Update', IdUsuario = '$ClaveActiva' where IdTexto = '4'";
	$resultado4 = sqlsrv_query($con, $sql4);

	$evento_3 = $_POST['evento_3'];
	$sql5 = "UPDATE dbo.TabTextSSYS SET  Texto='$evento_3', FechaUpdate = '$F_Update', IdUsuario = '$ClaveActiva' where IdTexto = '5'";
	$resultado5 = sqlsrv_query($con, $sql5);  

	$Desc_evento_1 = $_POST['Desc_evento_1'];
	$sql6 = "UPDATE dbo.TabTextSSYS SET  Texto='$Desc_evento_1', FechaUpdate = '$F_Update', IdUsuario = '$ClaveActiva' where IdTexto = '6'";
	$resultado6 = sqlsrv_query($con, $sql6);    

	$Desc_evento_2 = $_POST['Desc_evento_2'];
	$sql7 = "UPDATE dbo.TabTextSSYS SET  Texto='$Desc_evento_2', FechaUpdate = '$F_Update', IdUsuario = '$ClaveActiva' where IdTexto = '7' ";
	$resultado7 = sqlsrv_query($con, $sql7);

	$Desc_evento_3 = $_POST['Desc_evento_3'];
	$sql8 = "UPDATE dbo.TabTextSSYS SET  Texto='$Desc_evento_3', FechaUpdate = '$F_Update', IdUsuario = '$ClaveActiva' where IdTexto = '8' ";
	$resultado8 = sqlsrv_query($con, $sql8);  

?>

<!DOCTYPE html>
<html lang="es">
	<head>
	</head>
<style>
@import url(https://fonts.googleapis.com/css?family=Lato);
a {
  position: fixed;
  bottom: 2%;
  display: block;
  text-align: center;
  color: #fff;
  font-family: "Lato", sans-serif;
  text-decoration: none !important;
  width: 100%;
}

body, html {
  width: 100%;
  height: 100%;
  overflow: hidden;
}

body {
   background: linear-gradient(90deg, #00adb3, #00d6cb);
  box-shadow: inset 0px 0px 90px rgba(0, 0, 0, 0.5);
  margin: 0px;
  padding: 0px;
}

.demo {
  width: 100px;
  height: 102px;
  border-radius: 100%;
  position: absolute;
  top: 45%;
  left: calc(50% - 50px);
}

.circle {
  width: 100%;
  height: 100%;
  position: absolute;
}
.circle .inner {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  border: 5px solid rgba(0, 255, 170, 0.7);
  border-right: none;
  border-top: none;
  background-clip: padding;
  box-shadow: inset 0px 0px 10px rgba(0, 255, 170, 0.15);
}

@-webkit-keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
.circle:nth-of-type(0) {
  transform: rotate(0deg);
}
.circle:nth-of-type(0) .inner {
  -webkit-animation: spin 2s infinite linear;
          animation: spin 2s infinite linear;
}

.circle:nth-of-type(1) {
  transform: rotate(70deg);
}
.circle:nth-of-type(1) .inner {
  -webkit-animation: spin 2s infinite linear;
          animation: spin 2s infinite linear;
}

.circle:nth-of-type(2) {
  transform: rotate(140deg);
}
.circle:nth-of-type(2) .inner {
  -webkit-animation: spin 2s infinite linear;
          animation: spin 2s infinite linear;
}

.demo {
  -webkit-animation: spin 5s infinite linear;
          animation: spin 5s infinite linear;
}
</style>

	<body>
		<section class="Flex">
<div class='demo'>
  <div class='circle'>
    <div class='inner'></div>
  </div>
  <div class='circle'>
    <div class='inner'></div>
  </div>
  <div class='circle'>
    <div class='inner'></div>
  </div>
  <div class='circle'>
    <div class='inner'></div>
  </div>
  <div class='circle'>
    <div class='inner'></div>
  </div>
</div>
<a><?php if($resultado8) { ?>
				<h2>Modificación Completada</h2>
				<?php } else { ?>
				<h2>Error en Modificación</h2>
				<?php } ?>
</a>
<h1>&nbsp;</h1>
<a >Diseñado por TI Operaciónes Aceria Celaya</a>


				</section>



				<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../UpdateEventos">


	</body>
</html>
