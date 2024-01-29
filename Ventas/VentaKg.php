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

                    // Configurar el evento 'input' para los campos relevantes
                    $("input[name='Monto'], input[name='subject'], input[name='email']").on('input', function () {
                        updateInfo(); // Actualizar la información en cada cambio
                    });

                    // Función para actualizar la información y cálculos
                    function updateInfo() {
                        var kg = parseFloat($("input[name='Monto']").val()) || 0;
                        var monto = kg * precioKg;
                        var pagaCon = $("input[name='subject']").val();
                        var cambio = pagaCon ? parseFloat(pagaCon) - monto : '';
                        var idCliente = $("#cliente").val();

                        // Actualizar la presentación de la información
                        $("h3:contains('Kg') + p").text(kg.toFixed(2) + ' Kg');
                        $("h3:contains('Costo') + p").text('$' + monto.toFixed(2));
                        $("h3:contains('Paga con') + p").text(pagaCon);
                        $("h3:contains('Cambio') + p").text(cambio !== '' ? '$' + cambio.toFixed(2) : '');

                        // Actualizar los campos ocultos en el formulario de venta
                        updateLastForm(kg, monto, pagaCon, cambio, idCliente);

                        // Ocultar o mostrar el botón según la condición
                        if (parseFloat(pagaCon) >= monto) {
                            $(".button-82-pushable").show();
                        } else {
                            $(".button-82-pushable").hide();
                        }
                    }

                    // Función para actualizar los campos ocultos en el formulario de venta
                    function updateLastForm(kg, costo, pagaCon, cambio, idCliente) {
                        $("#Cantidad").val(kg.toFixed(2));
                        $("#Costo").val(costo.toFixed(2));
                        $("#PagaCon").val(pagaCon);
                        $("#Cambio").val(cambio !== '' ? cambio.toFixed(2) : '');
                        $("#IdCliente").val(idCliente); // Llenar el campo IdCliente en el último formulario
                    }

                    updateInfo(); // Llamar a la función inicialmente
                } else {
                    console.error('Error al obtener datos del producto.');
                }
            },
            error: function () {
                console.error('Error en la solicitud AJAX.');
            }
        });
    });

    // Funciones relacionadas con el teclado numérico
    function abrirTecladoNumerico() {
        var tecladoNumerico = document.createElement('div');
        tecladoNumerico.className = 'teclado-numerico';

        for (var i = 1; i <= 9; i++) {
            var boton = document.createElement('button');
            boton.textContent = i;
            boton.addEventListener('click', function() {
                insertarValor(this.textContent);
            });
            tecladoNumerico.appendChild(boton);
        }

        var botonCero = document.createElement('button');
        botonCero.textContent = '0';
        botonCero.addEventListener('click', function() {
            insertarValor(botonCero.textContent);
        });
        tecladoNumerico.appendChild(botonCero);

        var botonBorrar = document.createElement('button');
        botonBorrar.textContent = 'Borrar';
        botonBorrar.addEventListener('click', function() {
            borrarValor();
        });
        tecladoNumerico.appendChild(botonBorrar);

        document.body.appendChild(tecladoNumerico);
    }

    function insertarValor(valor) {
        var inputMonto = document.getElementById('Monto');
        inputMonto.value += valor;

        // Desencadenar el evento 'input' para actualizar los cálculos
        $("input[name='Monto']").trigger('input');
    }

    function borrarValor() {
        var inputMonto = document.getElementById('Monto');
        inputMonto.value = inputMonto.value.slice(0, -1);

        // Desencadenar el evento 'input' para actualizar los cálculos
        $("input[name='Monto']").trigger('input');
    }
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
                <label for="Monto">Cantidad Kg</label>
                <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-control {
      width: 200px;
      padding: 10px;
      font-size: 16px;
      text-align: right;
    }

    .teclado-numerico {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 5px;
    }

    .teclado-numerico button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
    }
  </style>
</head>
<body>


<script>
  var tecladoNumericoAbierto = false;

  function abrirTecladoNumerico() {
    // Verificar si el teclado numérico ya está abierto
    if (tecladoNumericoAbierto) {
      return;
    }

    // Crear un teclado numérico
    var tecladoNumerico = document.createElement('div');
    tecladoNumerico.className = 'teclado-numerico';
    tecladoNumerico.id = 'tecladoNumerico';

    // Crear botones del 1 al 9 y 0
    for (var i = 1; i <= 9; i++) {
      var boton = document.createElement('button');
      boton.textContent = i;
      boton.addEventListener('click', function() {
        insertarValor(this.textContent);
      });
      tecladoNumerico.appendChild(boton);
    }

    // Botón 0
    var botonCero = document.createElement('button');
    botonCero.textContent = '0';
    botonCero.addEventListener('click', function() {
      insertarValor(botonCero.textContent);
    });
    tecladoNumerico.appendChild(botonCero);

    // Botón de borrar
    var botonBorrar = document.createElement('button');
    botonBorrar.textContent = 'Borrar';
    botonBorrar.addEventListener('click', function() {
      borrarValor();
    });
    tecladoNumerico.appendChild(botonBorrar);

    // Botón de pasar al siguiente input
    var botonSiguiente = document.createElement('button');
    botonSiguiente.textContent = 'Siguiente';
    botonSiguiente.addEventListener('click', function() {
      pasarAlSiguienteInput();
    });
    tecladoNumerico.appendChild(botonSiguiente);

    // Adjuntar el teclado al cuerpo del documento
    document.body.appendChild(tecladoNumerico);

    // Configurar un listener para el evento 'blur' en el input
    document.getElementById('Monto').addEventListener('blur', function(e) {
      // Eliminar el teclado numérico solo si el clic no proviene del teclado numérico
      if (!tecladoNumerico.contains(e.relatedTarget)) {
        eliminarTecladoNumerico();
      }
    });

    // Marcar que el teclado numérico está abierto
    tecladoNumericoAbierto = true;
  }

  function eliminarTecladoNumerico() {
    var tecladoNumerico = document.getElementById('tecladoNumerico');
    if (tecladoNumerico) {
      // Si el teclado numérico existe, eliminarlo del DOM
      document.body.removeChild(tecladoNumerico);

      // Marcar que el teclado numérico está cerrado
      tecladoNumericoAbierto = false;
    }
  }

  function insertarValor(valor) {
    // Insertar el valor en el input
    var inputMonto = document.getElementById('Monto');
    inputMonto.value += valor;

    // Actualizar los cálculos automáticos
    updateInfo();
  }

  function borrarValor() {
    // Borrar el último carácter del input
    var inputMonto = document.getElementById('Monto');
    inputMonto.value = inputMonto.value.slice(0, -1);

    // Actualizar los cálculos automáticos
    updateInfo();
  }

  function pasarAlSiguienteInput() {
    // Enfocar el siguiente input
    document.getElementById('subject').focus();
  }
</script>

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
    <input type="hidden" class="form-control" id="IdTipoVenta" name="IdTipoVenta" step="0.01" value="2" >
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