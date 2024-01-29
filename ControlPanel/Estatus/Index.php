 <!-- Realizar la conexión al servidor -->
 <?php  require ('../../Perfile.php'); ?>
<!-- Conexión con el servidor -->
<?php

  $IdUsuario = $_GET['Clabe'];
	$Estatus = "display: none;";
	$sql1 = "UPDATE [dbo].[users] SET Estatus='$Estatus' where IdUsuario = '$IdUsuario' ";
	$resultado1 = sqlsrv_query($con, $sql1);


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
<a><?php if($resultado1) { ?>
				<h2>Modificación Completada</h2>
				<?php } else { ?>
				<h2>Error en Modificación</h2>
				<?php } ?>
</a>
<h1>&nbsp;</h1>
<a >Diseñado por TI Operaciónes Aceria Celaya</a>


				</section>



				<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../">


	</body>
</html>
