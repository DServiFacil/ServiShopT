<!doctype html>
<html lang="en">
 <!-- Realizar la conexión al servidor -->
<?php  require ('../../Perfile.php'); ?>
<?php $ID = $_GET['id']; ?>
<?php
            $sql = "SELECT * from [dbo].[CatGruposPrincipales] cg inner join users us on cg.IdUsuario = us.IdUsuario where cg.IdGrupo = '$ID'";
            $result = sqlsrv_query($con , $sql);
            while($row = sqlsrv_fetch_array($result)){
                $IdGrupo = $row['IdGrupo'];
                $Grupo = $row['Grupo'];
                $Link = $row['Link'];
            }

?>
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
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Inicio <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                    <li class="nav-item">
                                            <a class="nav-link" href="../">Usuarios</a>
                                        </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="../UpdateEventos/">Eventos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../UpdateEventos/">Acerca de</a>
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                            <a class="nav-link active" href="../Integrar/"><i class="fa fa-fw fa-user-circle"></i> BLOQUE SSYS</a>
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
                                <h2 class="pageheader-title">Editar elemento</h2>
                                <p class="pageheader-text">Acceso a editar el portal web.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="../Integrar" class="breadcrumb-link">BLOQUE SSYS</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">EDITAR BLOQUE SSYS</li>
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
        <h4 class="card-title">Editar</h4>
    </div>
    <div class="card-body">
   <div class="table-responsive">
   <form action="up2.php?Id='<?php echo $ID; ?>'" method="POST" class="login-email" enctype="multipart/form-data" >
   <div class="input-group">
          <span class="input-group-text">Nombre</span>
          <input type="text" aria-label="Last name" class="form-control" name="Grupo" placeholder="Nombre" value="<?php print($Grupo) ?>">
          <span class="input-group-text">Liga</span>
          <input type="text" aria-label="Last name" class="form-control" name="Link" placeholder="Liga de SharePoint: EJEMPLO https://deacero0.sharepoint.com/sites/PACC/SSYS etc." value="<?php print($Link) ?>">          
          &nbsp;&nbsp;&nbsp;&nbsp;

          </br>
          <div class="d-grid gap-2">
             <button class="btn btn-outline-success" type="submit">Actualizar</button>
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
        <h4 class="card-title">Ultima Actualización</h4>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table" style=" height: 50%; overflow-y: auto;">
        <thead class="bg-light">
            <tr class="border-0">
            <th class="border-0"  style="width: 15px;">#</th> 
            <th class="border-0">Registro</th>
            <th class="border-0">Nombre Grupo</th>
            <th class="border-0">Liga</th>
            <th class="border-0">Editar</th>
            </tr>
        </thead>
        <tbody class="BusquedaRapida">
            <?php
            $consulta = "SELECT * from [dbo].[CatGruposPrincipales] cg inner join users us on cg.IdUsuario = us.IdUsuario where cg.IdGrupo != '$ID'";
            $resultado = sqlsrv_query($con , $consulta);
            $contador=0;

            while($fila = sqlsrv_fetch_array($resultado)){
                $contador++;
                echo "<tr>";
                echo "<td>"; echo $fila['IdGrupo']; echo "</td>";
                echo "<td>"; echo $fila['username']; echo "</td>";
                echo "<td>"; echo $fila['Grupo']; echo "</td>";
                echo "<td>"; echo $fila['Link']; echo "</td>";
                echo "<td>"; echo "<a href='Edit.php?id=" . $fila['IdGrupo'] . "'><button class='button-75' role='button'><span class='text'>Editar</span></button></a>"; echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
                </div>
    </div>
</div>
</div>
<style>
/* CSS */
.button-75 {
  align-items: center;
  background-image: linear-gradient(135deg, #f34079 40%, #fc894d);
  border: 0;
  border-radius: 10px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: flex;
  flex-direction: column;
  font-family: "Codec cold",sans-serif;
  font-size: 16px;
  font-weight: 700;
  height: 30px;
  justify-content: center;
  letter-spacing: .4px;
  line-height: 1;
  max-width: 100%;
  padding-left: 20px;
  padding-right: 20px;
  padding-top: 3px;
  text-decoration: none;
  text-transform: uppercase;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-75:active {
  outline: 0;
}

.button-75:hover {
  outline: 0;
}

.button-75 span {
  transition: all 200ms;
}

.button-75:hover span {
  transform: scale(.9);
  opacity: .75;
}

@media screen and (max-width: 991px) {
  .button-75 {
    font-size: 15px;
    height: 50px;
  }

  .button-75 span {
    line-height: 50px;
  }
}
</style>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

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