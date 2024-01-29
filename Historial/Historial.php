<?php
require('../Perfile.php');
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
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Bootstrap (JS) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- FontAwesome (CSS) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">


      <nav id="navbar" class="navbar">
        <ul>
        <li></li> 
        </ul>
        <i class=""></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <section id="counts" class="counts">
  </section>
  <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts" >
      <div class="container" data-aos="fade-up">


    </section><!-- End Counts Section -->
    <!-- ======= Services Section ======= -->
    <section id="contact" class="contact" >
    <div class="container" data-aos="fade-up">
        <header class="section-header">
        </header>

        <div class="row gy-4">
        <div class="container mt-4">
    <!-- Agrega el siguiente código para el buscador -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar..." id="myInput">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <!-- Agrega la tabla con estilos de Bootstrap -->
    <table class="table table-striped table-bordered mx-auto text-center">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Tipo Venta</th>
                <th>Producto</th>
                <th>Costo Kg</th>
                <th>Kg Comprados</th>
                <th>Costo total</th>
                <th>Pago con</th>
                <th>Cambio</th>
                <th>Fecha</th>
                <th>Ticket</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php
            $sql = "SELECT VS.IdVenta, Cantidad, Costo, PagaCon, Cambio, tipoproducto, precioKg, tipoventa, NombreCliente, vs.FechaRegistro FROM VENTAS VS
            INNER JOIN catproductos CP ON VS.IdProducto = CP.IdTipoProducto 
            INNER JOIN cattipoventas CTV ON VS.IdTipoVenta = CTV.IdTipoVenta
            LEFT JOIN clientes CLS ON VS.IdCliente = CLS.IdCliente
            ORDER BY VS.IdVenta DESC";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['IdVenta']; ?></td>
                    <td><?php echo $row['NombreCliente']; ?></td>
                    <td><?php echo $row['tipoventa']; ?></td>
                    <td><?php echo $row['tipoproducto']; ?></td>
                    <td><?php echo $row['precioKg']; ?></td>
                    <td><?php echo $row['Cantidad']; ?></td>
                    <td><?php echo $row['Costo']; ?></td>
                    <td><?php echo $row['PagaCon']; ?></td>
                    <td><?php echo $row['Cambio']; ?></td>
                    <td><?php echo date("Y/m/d H:i:s a", strtotime($row['FechaRegistro'])); ?></td>
                    <td><a class="" href="../TICKETS/ticket_VF.PHP?Tk=<?php echo $row['IdVenta']; ?>" target="_blank"><button class="btn btn-info">Generar</button></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Agrega el siguiente script para el filtro en tiempo real -->
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


        </div>
    </div>
</section><!-- End Historial Section -->



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