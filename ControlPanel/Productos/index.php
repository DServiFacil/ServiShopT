<!doctype html>
<html lang="en">
 <!-- Realizar la conexión al servidor -->
 <?php
require('../../Perfile.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar valores del formulario
    $tipoProducto = $_POST["tipoProducto"];
    $precioKg = $_POST["precioKg"];
    $IdEstatusProducto = 1;

    // Preparar la consulta de inserción
    $sql = "INSERT INTO catproductos (TipoProducto, PrecioKg, IdEstatusProducto) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Vincular parámetros
        $stmt->bind_param("sdi", $tipoProducto, $precioKg, $IdEstatusProducto);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Registro exitoso. Nuevo producto agregado.";
        } else {
            echo "Error en la inserción: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link href="../../assets/img/Tortillas.png" rel="icon">
    <link href="../../assets/img/Tortillas.png" rel="apple-touch-icon">
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
    <title>Tortilleria</title>
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
                <a class="navbar-brand" style="color: black;" href="../"><img src="../../assets/img/Tortillas.png" height="40" width="40"> Tortilleria</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">

                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php print($Nombre) ?> </h5>
                                    <span class="status"></span><span class="ml-2">Activo</span>
                                </div>
                                <a class="dropdown-item" href="../../Login/BackSession/"><i class="fas fa-power-off mr-2"></i>Salir</a>
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
                        <li class="nav-divider"><a href="../../Login/BackSession/">
                                Usuario: <?php print($Nombre) ?></a> 
                            </li>
                        <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                            <a class="nav-link " href="../../ventas" aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Ventas <span class="badge badge-success">6</span></a>
                            </li>
                            <br>
                            <li class="nav-item ">
                            <a class="nav-link " href="../Historial.php" aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Historial <span class="badge badge-success">6</span></a>
                            </li>
                            <br>  
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Paneles <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="../Caja">Caja</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../Clientes/">Clientes</a>
                                        </li>                                                                                      
                                    </ul>
                                </div>
                            </li>
                          <!--  <li class="nav-item">
                                <a class="nav-link" href="Integrar/"><i class="fa fa-fw fa-user-circle"></i> BLOQUE SSYS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://deacero0.sharepoint.com/sites/PACC/SSYS/SitePages/Home.aspx" target='_blank'><i class="fa fa-fw fa-user-circle"></i> SharePoint SSYS</a>
                            </li>    -->                                    
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
                                <h2 class="pageheader-title">Panel de control | Productos y Costos</h2>
                                <p class="pageheader-text">Acceso a editar el portal web.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Panel de control</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
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


                    <div class="ecommerce-widget">
                    <div class="card">
    <div class="card-header">
        <h4 class="card-title">Agregar producto</h4>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <form action="" method="POST">

        <div class="form-group">
            <label for="tipoProducto">Tipo de Producto:</label>
            <input type="text" class="form-control" id="tipoProducto" name="tipoProducto" required>
        </div>

        <div class="form-group">
            <label for="precioKg">Precio por Kg:</label>
            <input type="number" class="form-control" id="precioKg" name="precioKg" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Producto</button>

    </form>
                </div>
    </div>
</div>
</div>
<div class="row">
    <!-- ============================================================== -->

    <!-- ============================================================== -->

</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Listado de productos</h4>
    </div>
    <div class="card-body">
    <div class="table-responsive">
                    <?php include '../../Tabla_Productos.php' ?>
                </div>
    </div>
</div>
</div>

                </div>
            </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

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