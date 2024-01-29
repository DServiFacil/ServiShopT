<?php
require('../Perfile.php');

// Consulta para obtener los productos de la base de datos
$consultaProductos = "SELECT * FROM catproductos where idEstatusProducto = '1'";
$resultadoProductos = mysqli_query($conn, $consultaProductos);
?>
<!DOCTYPE html>
<html lang="en">
<script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';

            // Convertir las horas al formato de 12 horas
            hours = hours % 12;
            hours = hours ? hours : 12; // Si hours es 0, establecerlo a 12

            // Agregar ceros a la izquierda para minutos y segundos si son menores a 10
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById('clock').innerHTML = timeString;

            setTimeout(updateClock, 1000); // Actualizar cada segundo
        }

        // Iniciar el reloj cuando la página se carga
        window.onload = function () {
            updateClock();
        };
    </script>
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

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="../ventas" class="logo d-flex align-items-center">
        <img src="../assets/img/Tortillas.png" alt="">
        <span><?php print($NombreComercio); ?> | Ventas</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="getstarted scrollto" style="background: green;" href="../Historial"><i class="ri-time-line"></i>&nbsp;Historial de ventas</a></li> 
        <li><a class="getstarted scrollto" style="background: red;" href="../Caja"><i class="ri-cash-fill"></i>&nbsp;&nbsp;Corte Caja</a></li>
        <li><a class="getstarted scrollto" href="../Login/Validador">Panel de Control</a></li>
        <li><a class="getstarted scrollto" style="background: black;" href="../Login/BackSession">Salir</a></li>
      </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
            <span id="clock"></span>
                <p>Selecciona el producto</p>
            </header>

            <div class="row gy-4">
                <?php
                // Iterar sobre los resultados de la consulta
                $colores = ['blue', 'orange', 'green', 'red', 'purple', 'pink'];
                $colorIndex = 0;

                while ($fila = mysqli_fetch_assoc($resultadoProductos)) {
                    $color = $colores[$colorIndex % count($colores)];

                    echo '<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">';
                    echo '<a href="TipoVenta.php?Clp=' . $fila['IdTipoProducto'] . '">';
                    echo '<div class="service-box ' . $color . '">';
                    echo '<i class="ri-shopping-cart-2-line icon"></i>';
                    echo '<h3>' . $fila['TipoProducto'] . '</h3>';
                    echo '<p>' . '$' . ' ' . $fila['PrecioKg'] . ' ' . 'Kg' . '</p>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';

                    $colorIndex++;
                }
                ?>
            </div>
        </div>
    </section><!-- End Services Section -->



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