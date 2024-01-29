<!doctype html>
<html lang="en">
 <!-- Realizar la conexión al servidor -->
<?php  require ('../../Perfile.php'); ?>
<!-- Conexión con el servidor -->
<!-- Fin conexión -->

<!-- Apartado que contiene toda la información de los elementos de texto clasificada por apartados dentro del layaut principal -->
<!-- Textos Hero -->
<!-- Texto Presentación -->
<?php
         $sql = "SELECT * from TabTextSSYS where IdTexto = '9'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Cb_NOSOTROS = $row['IdTexto'];
		 $NOSOTROS = $row['Texto'];
?>
<?php
         $sql = "SELECT * from TabTextSSYS where IdTexto = '10'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Cb_NOSOTROS_2 = $row['IdTexto'];         
		 $NOSOTROS_2 = $row['Texto'];
?>
<!-- Titulos de eventos -->
<?php
         $sql = "SELECT * from TabTextSSYS where IdTexto = '11'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Cb_MISION = $row['IdTexto'];   
		 $MISION = $row['Texto'];
?>
<?php
         $sql = "SELECT * from TabTextSSYS where IdTexto = '12'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Cb_OBJETIVO = $row['IdTexto'];
		 $OBJETIVO = $row['Texto'];
?>
<?php
         $sql = "SELECT * from TabTextSSYS where IdTexto = '13'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Cb_POLITICA = $row['IdTexto'];
		 $POLITICA = $row['Texto'];
?>
<!-- Descripción de eventos -->
<?php
         $sql = "SELECT * from TabTextSSYS where IdTexto = '6'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Cb_Desc_evento_1 = $row['IdTexto'];
		 $Desc_evento_1 = $row['Texto'];
?>
<?php
         $sql = "SELECT * from TabTextSSYS where IdTexto = '7'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Cb_Desc_evento_2 = $row['IdTexto'];
		 $Desc_evento_2 = $row['Texto'];
?>
<?php
         $sql = "SELECT * from TabTextSSYS where IdTexto = '8'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Cb_Desc_evento_3 = $row['IdTexto'];
		 $Desc_evento_3 = $row['Texto'];
?>

<?php
$sql = "SELECT * FROM EstatusSeguridad WHERE IdSeguridadSem = '1'";
$result = sqlsrv_query($con, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

if ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $IdSemaforo_1 = $row['IdSemaforo'];
    $Fecha_evento = $row['FechaRegistro']->format("Y-m-d");
} else {
    // Manejar el caso en que no se encuentren resultados
    $IdSemaforo_1 = null;
    $Fecha_evento = null;
}

// Resto del código...
?>


<?php
         $sql = "SELECT * from Semaforo where IdSemaforo  = $IdSemaforo_1";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
         $Semaforo = $row['Semaforo'];
?>

<?php
         $sql = "SELECT * from FechaEventos where IdFecha  = '1'";
	     $result = sqlsrv_query($con, $sql);
		 $row = sqlsrv_fetch_array($result);
		echo $FechaEvento = $row['FechaEvento'] ->format("Y-m-d");
?>

<!-- Fin textos Hero -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link href="../../assets/img/sponsor/LogoSSyS-L.png" rel="icon">
    <link href="../../assets/img/sponsor/LogoSSyS-L.png" rel="apple-touch-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>GESTWEB | SSYS</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" style="color: black;" href="../../"><img src="../../assets/img/sponsor/LogoSSyS-L.png" height="40" width="40"> SSYS DEACERO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="../../" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-list"></i> <span class="indicator"></span></a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php

$consulta = "SELECT * FROM users where IdUsuario = '$ClaveActiva'";
$resultado = sqlsrv_query($con , $consulta);
$contador=0;

while($fila = sqlsrv_fetch_array($resultado)){ 
  echo "<img src='" . $fila['Foto'] . "' class='user-avatar-md rounded-circle' alt=''>";
}
?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php print($Nombre) ?> </h5>
                                    <span class="status"></span><span class="ml-2">Activo</span>
                                </div>
                                <a class="dropdown-item" href="../../Access/BackSession/"><i class="fas fa-power-off mr-2"></i>Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Inicio</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Inicio <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="../">Inicio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../UpdateEventos/">Eventos</a>
                                        </li>     
                                        <li class="nav-item">
                                            <a class="nav-link" href="../UpdateAcercade/">Acerca de</a>
                                        </li>                                                                                     
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Integrar/"><i class="fa fa-fw fa-user-circle"></i> BLOQUE SSYS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://deacero0.sharepoint.com/sites/PACC/SSYS/SitePages/Home.aspx" target='_blank'><i class="fa fa-fw fa-user-circle"></i> SharePoint SSYS</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Actualizar bloque 2</h2>
                                <p class="pageheader-text">Acceso a editar el portal web.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="../../ControlPanel" class="breadcrumb-link">Panel de control</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Contenido</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

<div class="row">
    <!-- ============================================================== -->

    <!-- ============================================================== -->

</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Actualizar Nosotros!</h4>
    </div>
    <div class="card-body">
   <div class="table-responsive">
   <form action="update.php" method="POST" class="login-email" enctype="multipart/form-data" >
   <div class="input-group">
   <input type="hidden" aria-label="Last name" class="form-control" name="IdUsuario" placeholder="IdUsuario" value="">
          <span class="input-group-text">NOSOTROS</span>
          <textarea class="form-control" id="exampleFormControlTextarea1"  name="NOSOTROS" required><?php echo isset($NOSOTROS) ? $NOSOTROS : ''; ?></textarea>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <span class="input-group-text">NOSOTROS 2</span>
          <textarea class="form-control" id="exampleFormControlTextarea1"  name="NOSOTROS_2" required><?php echo isset($NOSOTROS_2) ? $NOSOTROS_2 : ''; ?></textarea>          
         </div>
          </br>
         <div class="input-group">
          <span class="input-group-text">MISIÓN</span>
          <textarea class="form-control" id="exampleFormControlTextarea1"  name="MISION" required><?php echo isset($MISION) ? $MISION : ''; ?></textarea>                 
          &nbsp;&nbsp;&nbsp;&nbsp;
          <span class="input-group-text">OBJETIVO</span>
          <textarea class="form-control" id="exampleFormControlTextarea1"  name="OBJETIVO" required><?php echo isset($OBJETIVO) ? $OBJETIVO : ''; ?></textarea>                 
         </div>
         <br>
         <div class="input-group">
          <span class="input-group-text">POLITICA</span>
          <textarea class="form-control" id="exampleFormControlTextarea1"  name="POLITICA" required><?php echo isset($POLITICA) ? $POLITICA : ''; ?></textarea>            
                  </div>
          </br>
          <div class="d-grid gap-2">
             <button class="btn btn-outline-danger" type="submit">Actualizar</button>
          </div>
          </br>
        </form>
    </div>
   </div>
</div>
</div>



<div class="ecommerce-widget">

<div class="row">
    <!-- ============================================================== -->

    <!-- ============================================================== -->

</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Ultimas Actualizaciones</h4>
    </div>
    <div class="card-body">
    <div class="table-responsive">
                    <?php include '../../Eventos_Header.php' ?>
                </div>
    </div>
</div>
</div>

                </div>
            </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        © Copyright DEACERO.
                        </div>
                    </div>
                </div>
            </div>
    </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>