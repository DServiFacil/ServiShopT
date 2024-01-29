<?php
require('../Perfile.php');
// Tu código de conexión a la base de datos (asegúrate de tenerlo antes de este código)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recibir los datos del formulario
  date_default_timezone_set("America/Monterrey");
  $FechaRegistro = date("Y/m/d H:i:s a");
  $FechaVenta = date("Y/m/d");
  $HoraVenta = date("H:i:s a");
  $idProducto = $_POST['IdProducto'];
  $cantidad = $_POST['Cantidad'];
  $costo = $_POST['Costo'];
  $pagaCon = $_POST['PagaCon'];
  $cambio = $_POST['Cambio'];
  $idEstatus = $_POST['IdEstatus'];
  $idCliente = $_POST['IdCliente'];
  $IdUsuario = $ClaveActiva;
  $IdTipoVenta = $_POST['IdTipoVenta'];

  // Crear la consulta SQL para la inserción
  $consultaInsert = "INSERT INTO ventas (IdProducto, Cantidad, Costo, PagaCon, Cambio, IdEstatus, IdCliente, IdTipoVenta, FechaRegistro, FechaVenta, HoraVenta, IdUsuario)
    VALUES ('$idProducto', '$cantidad', '$costo', '$pagaCon', '$cambio', '$idEstatus', '$idCliente', '$IdTipoVenta','$FechaRegistro','$FechaVenta','$HoraVenta', '$IdUsuario')";

  // Ejecutar la consulta
  if (mysqli_query($conn, $consultaInsert)) {
    // Cerrar la conexión a la base de datos (asegúrate de hacerlo al final del script si es necesario)
    mysqli_close($conn);

    // Mostrar la animación y redirigir después de 5 segundos
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <style>
        @keyframes animation {
          0% { transform: scale(0); opacity: 0; }
          100% { transform: scale(1); opacity: 1; }
        }

        body {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
        }

        .animation {
          animation: animation 1s ease-out;
          text-align: center;
        }

        .circle {
          width: 100px;
          height: 100px;
          margin: 0 auto;
          background-color: white;
          border-radius: 50%;
          display: flex;
          justify-content: center;
          align-items: center;
          border: 5px solid #00cc00;
          animation: color-change 1s ease-out;
        }

        .icon {
          color: #00cc00;
        }

        .message {
          font-size: 24px;
          color: #00cc00;
        }

        /* CSS */
        .button-82-pushable {
          position: relative;
          border: none;
          background: transparent;
          padding: 0;
          cursor: pointer;
          outline-offset: 4px;
          transition: filter 250ms;
          user-select: none;
          -webkit-user-select: none;
          touch-action: manipulation;
        }
        
        .button-82-shadow {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border-radius: 12px;
          background: hsl(0deg 0% 0% / 0.25);
          will-change: transform;
          transform: translateY(2px);
          transition:
            transform
            600ms
            cubic-bezier(.3, .7, .4, 1);
        }
        
        .button-82-edge {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border-radius: 12px;
          background: linear-gradient(
            to left,
            hsl(340deg 100% 16%) 0%,
            hsl(340deg 100% 32%) 8%,
            hsl(340deg 100% 32%) 92%,
            hsl(340deg 100% 16%) 100%
          );
        }
        
        .button-82-front {
          display: block;
          position: relative;
          padding: 12px 27px;
          border-radius: 12px;
          font-size: 1.1rem;
          color: white;
          background: hsl(345deg 100% 47%);
          will-change: transform;
          transform: translateY(-4px);
          transition:
            transform
            600ms
            cubic-bezier(.3, .7, .4, 1);
        }
        
        @media (min-width: 768px) {
          .button-82-front {
            font-size: 1.25rem;
            padding: 12px 42px;
          }
        }
        
        .button-82-pushable:hover {
          filter: brightness(110%);
          -webkit-filter: brightness(110%);
        }
        
        .button-82-pushable:hover .button-82-front {
          transform: translateY(-6px);
          transition:
            transform
            250ms
            cubic-bezier(.3, .7, .4, 1.5);
        }
        
        .button-82-pushable:active .button-82-front {
          transform: translateY(-2px);
          transition: transform 34ms;
        }
        
        .button-82-pushable:hover .button-82-shadow {
          transform: translateY(4px);
          transition:
            transform
            250ms
            cubic-bezier(.3, .7, .4, 1.5);
        }
        
        .button-82-pushable:active .button-82-shadow {
          transform: translateY(1px);
          transition: transform 34ms;
        }
        
        .button-82-pushable:focus:not(:focus-visible) {
          outline: none;
        }
        
      </style>
    </head>
    <body>
      <div class="animation">
        <div class="circle">
          <i class="fas fa-shopping-bag" style="font-size: 40px;"></i>
        </div>
        <p class="message">Venta Realizada</p>
        <button onclick="generateTicket()" class="button-82-pushable" role="button">
        <span class="button-82-shadow"></span>
        <span class="button-82-edge"></span>
        <span class="button-82-front text">
        <i class="bi bi-bag-check-fill"></i> Generar Ticket
        </span>
      </button>

      </div>
      <script>
        function generateTicket() {
          window.open("../TICKETS/ticket_VA.PHP", "_blank");
        }

        setTimeout(function() {
          window.location.href = "../ventas";
        }, 5000); // Redirigir después de 5 segundos
      </script>
    </body>
    </html>';
  } else {
    echo "Error al insertar el registro: " . mysqli_error($conn);
  }
} else {
  echo "La solicitud no es válida.";
}
?>
