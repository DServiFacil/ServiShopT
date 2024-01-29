<?php
require('../Perfile.php');

// Consulta para obtener los datos de corte
 $consultaprd = "SELECT * FROM cajainicial";
$resprd = mysqli_query($conn, $consultaprd);{
    $rows = mysqli_fetch_array($resprd);
    $TotalMonto = $rows['TotalMonto']; 
}
$sql_1 = "SELECT SUM(Costo) AS GananciasDelDia FROM VENTAS WHERE DATE(FechaVenta) = CURDATE()";
$res_1 = mysqli_query($conn, $sql_1);{
    $row1 = mysqli_fetch_array($res_1);
    $GananciasDelDia = $row1['GananciasDelDia']; 

    $TotalCaja = $TotalMonto + $GananciasDelDia;
}
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
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="../ventas" class="logo d-flex align-items-center">
        <img src="../assets/img/Tortillas.png" alt="">
        <span><?php print($NombreComercio); ?> | Corte</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="getstarted scrollto" style="background: red;" href="../ventas">Ventas</a></li>
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
            <p>Registrar corte de caja</p>
        </header>
        <div class="row gy-4">
        <div class="col-lg-6">
            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="info-box orange">
                        <i class="bi bi-cash-stack" style="color: orange;"></i>
                        <h3>Caja inicial</h3>
                        <p id="cajaInicial"><?php print($TotalMonto); ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box orange">
                        <i class="bi bi-cash-stack" style="color: orange;"></i>
                        <h3>Ganancias del día</h3>
                        <p id="gananciasDia"><?php print($GananciasDelDia); ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box orange">
                        <i class="bi bi-cash-coin" style="color: orange;"></i>
                        <h3>En caja</h3>
                        <p id="enCaja"><?php print($TotalCaja); ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box orange">
                        <i class="bi bi-cash-stack" style="color: orange;"></i>
                        <h3>Variación</h3>
                        <p id="variacion">0</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- FORMULARIO DE LLENADO AUTOMATICO -->
            <form id="ventaForm" class="php-email-form">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <label for="subject">En caja</label>
                        <input type="text" class="form-control" name="subject" id="subject"
                            placeholder="Ingrese la cantidad que hay en caja" required>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
    $(document).ready(function () {
        // Actualizar en tiempo real al ingresar el valor en el formulario
        $("#subject").on("input", function () {
            var enCajaInput = $(this).val();
            var enCaja = parseFloat(enCajaInput);
            var cajaInicialText = $("#cajaInicial").text();
            var gananciasDiaText = $("#gananciasDia").text();

            // Verificar si los valores son válidos
            if (!isNaN(enCaja) && !isNaN(parseFloat(cajaInicialText)) && !isNaN(parseFloat(gananciasDiaText))) {
                var cajaInicial = parseFloat(cajaInicialText);
                var gananciasDia = parseFloat(gananciasDiaText);
                var variacion = enCaja - (cajaInicial + gananciasDia);

                // Actualizar los elementos HTML
                $("#enCaja").text(enCaja.toFixed(2));
                $("#variacion").text(variacion.toFixed(2));

                // Cambiar el color del texto de la variación
                if (variacion === 0) {
                    $("#variacion").css("color", "green");
                } else if (variacion > 0) {
                    $("#variacion").css("color", "orange");
                } else {
                    $("#variacion").css("color", "red");
                }

                // Actualizar los valores en el formulario
                $("#Cajainicial").val(cajaInicial.toFixed(2));
                $("#Gananciasdeldía").val(gananciasDia.toFixed(2));
                $("#Encaja").val(enCaja.toFixed(2));
                $("#Variacion").val(variacion.toFixed(2));
            } else {
                // Si hay algún valor no válido, dejar en blanco
                $("#enCaja, #variacion, #Cajainicial, #Gananciasdeldía, #Encaja, #Variacion").text("");
            }
        });
    });
</script>

<!-- FIN FORMULARIO DE LLENADO AUTOMATICO -->
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->

<!-- FORMULARIO DE LLENADO DE BASE DE DATOS -->
<form action="Corte.php" method="POST">
<div class="form-group">
    <input type="hidden" class="form-control"  name="IdUsuario" value="<?php print($ClaveActiva); ?>" step="0.01" required>
</div>
<div class="form-group">
    <input type="hidden" class="form-control" id="Cajainicial" name="Cajainicial" step="0.01" required>
</div>
<div class="form-group">
    <input type="hidden" class="form-control" id="Gananciasdeldía" name="Gananciasdeldía" required>
</div>

<div class="form-group">
    <input type="hidden" class="form-control" id="Encaja" name="Encaja" step="0.01" value="1" required>
</div>

<div class="form-group">
    <input type="hidden" class="form-control" id="Variacion" name="Variacion" step="0.01" value="1" >
</div>

<center>

<button type="submit" class="button-82-pushable" role="button">
  <span class="button-82-shadow"></span>
  <span class="button-82-edge"></span>
  <span class="button-82-front text">
  <i class="bi bi-wallet2"></i> Registrar Corte
  </span>
</button>
</center>

</form>
<!-- FIN FORMULARIO DE LLENADO DE BASE DE DATOS -->
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