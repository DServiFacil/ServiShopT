<?php
require('../Perfile.php');
$Producto = $_GET['Clp'];
$TipoVenta = $_GET['Cltv'];

// Consulta para obtener los productos de la base de datos
 $consultaprd = "SELECT * FROM catproductos WHERE IdTipoProducto = '$Producto'";
$resprd = mysqli_query($conn, $consultaprd);{
    $rows = mysqli_fetch_array($resprd);
    $IdProductof = $rows['IdTipoProducto']; 
    $ProductoF = $rows['TipoProducto'];
    $PrecioKgF = $rows['PrecioKg'];

}

$consultaProductos = "SELECT * FROM CatTipoVentas";
$resultadoProductos = mysqli_query($conn, $consultaProductos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ventas - Tortillas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/Tortillas.png" rel="icon">
  <link href="../assets/img/Tortillas.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
  <script>
$(document).ready(function () {
    var Clp = <?php echo json_encode($_GET['Clp']); ?>;

    $.ajax({
        url: 'obtener_productos.php',
        method: 'GET',
        data: { Clp: Clp },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                var precioKg = parseFloat(response.data.PrecioKg) || 0;

                $("input[name='Monto'], input[name='subject'], input[name='email']").on('input', function () {
                    updateInfo();
                });

                function updateInfo() {
                    var monto = parseFloat($("input[name='Monto']").val()) || 0;
                    var kg = monto / precioKg;
                    var pagaCon = $("input[name='subject']").val();
                    var cambio = pagaCon ? parseFloat(pagaCon) - monto : '';
                    var idCliente = $("#cliente").val(); // Obtener el IdCliente del select

                    $("h3:contains('Kg') + p").text(kg.toFixed(2) + ' Kg');
                    $("h3:contains('Costo') + p").text('$' + monto.toFixed(2));
                    $("h3:contains('Paga con') + p").text(pagaCon);
                    $("h3:contains('Cambio') + p").text(cambio !== '' ? '$' + cambio.toFixed(2) : '');

                    updateLastForm(kg, monto, pagaCon, cambio, idCliente);

                    // Ocultar o mostrar el botón según la condición
                    if (parseFloat(pagaCon) >= monto && $("input[name='Cantidad']").val() !== "") {
                        $(".button-82-pushable").show();
                    } else {
                        $(".button-82-pushable").hide();
                    }
                }

                function updateLastForm(kg, costo, pagaCon, cambio, idCliente) {
                    $("#Cantidad").val(kg.toFixed(2));
                    $("#Costo").val(costo.toFixed(2));
                    $("#PagaCon").val(pagaCon);
                    $("#Cambio").val(cambio !== '' ? cambio.toFixed(2) : '');
                    $("#IdCliente").val(idCliente); // Llenar el campo IdCliente en el último formulario
                }

                updateInfo();
            } else {
                console.error('Error al obtener datos del producto.');
            }
        },
        error: function () {
            console.error('Error en la solicitud AJAX.');
        }
    });
});
</script>


<script>
    
</script>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="../ventas" class="logo d-flex align-items-center">
        <img src="../assets/img/Tortillas.png" alt="">
        <span><?php print($NombreComercio); ?> | Ventas </span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="getstarted scrollto" style="background: red;" href="../ventas"><i class="ri-close-circle-line"></i>&nbsp;Cancelar venta</a></li>
        <li><a class="getstarted scrollto" style="background: blue;" href="TipoVenta.php?Clp=<?php print($Producto); ?>"><i class="ri-arrow-go-back-line"></i>&nbsp;Cambiar venta</a></li>
        <li><a class="getstarted scrollto" style="background: green;" href="../Historial"><i class="ri-time-line"></i>&nbsp;Historial de ventas</a></li> 
          <li><a class="getstarted scrollto" href="../Login">Panel de Control</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <section id="contact" class="contact" style="margin-top:2%;">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Precio Kg : $<?php print($PrecioKgF); ?> </h2>
            <p>Venta de <?php print($ProductoF); ?></p>
        </header>

        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box orange">
                            <i class="bi bi-basket2" style="color: orange;"></i>
                            <h3>Kg</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box orange">
                            <i class="bi bi-cart-check" style="color: orange;"></i>
                            <h3>Costo</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box orange">
                            <i class="bi bi-cash-coin" style="color: orange;"></i>
                            <h3>Paga con</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box orange">
                            <i class="bi bi-cash-stack" style="color: orange;"></i>
                            <h3>Cambio</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
<!-- FORMULARIO DE LLENADO AUTOMATICO -->

            <form id="ventaForm" class="php-email-form">
        <div class="row gy-4">
            <div class="col-md-6">
                <label for="Monto">Cantidad $</label>
                <input type="number" name="Monto" id="Monto" class="form-control" placeholder="Ingrese la cantidad" required>
            </div>

            <div class="col-md-6">
                <label for="cliente">Cliente (opcional)</label>
                <select class="form-control" name="cliente" id="cliente">
                    <option value="">Selecciona un cliente</option>
                    <?php
                    // Output options for clients
                    $consultaClientes = "SELECT IdCliente, NombreCliente FROM clientes";
                    $resultClientes = mysqli_query($conn, $consultaClientes);
                    while ($filaCliente = mysqli_fetch_assoc($resultClientes)) {
                        echo '<option value="' . $filaCliente['IdCliente'] . '">' . $filaCliente['NombreCliente'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-12">
                <label for="subject">Paga con</label>
                <input type="number" class="form-control" name="subject" id="subject" placeholder="Ingrese la cantidad con la que paga" required>
            </div>
        </div>
    </form>
<!-- FIN FORMULARIO DE LLENADO AUTOMATICO -->

<!-- FORMULARIO DE LLENADO DE BASE DE DATOS -->

<!-- FIN FORMULARIO DE LLENADO DE BASE DE DATOS -->
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->


<form action="VentaMtf.php" method="POST">

<div class="form-group">
    <input type="hidden" class="form-control" id="IdProducto" name="IdProducto" value="<?php print($IdProductof); ?>">
</div>

<div class="form-group">
    <input type="hidden" class="form-control" id="IdCliente" name="IdCliente">
</div>


<div class="form-group">
    <input type="hidden" class="form-control" id="Cantidad" name="Cantidad" step="0.01">
</div>
<div class="form-group">
    <input type="hidden" class="form-control" id="Costo" name="Costo" >
</div>

<div class="form-group">
    <input type="hidden" class="form-control" id="PagaCon" name="PagaCon" step="0.01" >
</div>
<div class="form-group">
    <input type="hidden" class="form-control" id="Cambio" name="Cambio" required>
</div>

<div class="form-group">
    <input type="hidden" class="form-control" id="precioKg" name="IdEstatus" step="0.01" value="1" >
</div>

<div class="form-group">
    <input type="hidden" class="form-control" id="IdTipoVenta" name="IdTipoVenta" step="0.01" value="1" >
</div>


<center>

<button type="submit" class="button-82-pushable" role="button">
  <span class="button-82-shadow"></span>
  <span class="button-82-edge"></span>
  <span class="button-82-front text">
  <i class="bi bi-bag-check-fill"></i> Registrar venta
  </span>
</button>
</center>

</form>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>