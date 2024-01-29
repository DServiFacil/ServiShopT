<?php
require('../Perfile.php');
// Asegúrate de incluir tu archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    date_default_timezone_set("America/Monterrey");
    $FechaRegistro = date("Y/m/d H:i:s a");
    // Recoger los valores del formulario
    $TotalMonto = $_POST['Cajainicial'];
    $Ganancias = $_POST['Gananciasdeldía'];
    $Efectivo = $_POST['Encaja'];
    $Variacion = $_POST['Variacion'];
    $IdUsuario = $_POST['IdUsuario'];

    // Consulta SQL para insertar en la tabla cortecaja
     $consulta = "INSERT INTO cortecaja (TotalMonto, Ganancias, Efectivo, Variacion, FechaRegistro, IdUsuario) 
                 VALUES ('$TotalMonto', '$Ganancias', '$Efectivo', '$Variacion','$FechaRegistro', '$IdUsuario')";

    if (mysqli_query($conn, $consulta)) {
        echo "";
    } else {
        echo "" . mysqli_error($conn);
    }
}

mysqli_close($conn); // Cierra la conexión a la base de datos
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<style>
    body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
}

#animation-container {
    display: none;
}

#circle-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #4caf50; /* Green */
    color: white;
    padding: 20px;
    border-radius: 50%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

#circle-container i {
    font-size: 3em;
}

#circle-container p {
    margin-top: 10px;
    font-weight: bold;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corte de Caja</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <center>
    <div id="animation-container">
        <div id="circle-container">
            <i class="fas fa-cash-register"></i>
            <p>Corte Finalizado</p>
        </div>
    </div>
    </center>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
<script>
    $(document).ready(function () {
    $("#animation-container").fadeIn(1000, function () {
        // Aquí se puede realizar cualquier otra acción después de la animación

        // Redirige a la página de ventas después de 3 segundos
        setTimeout(function () {
            window.location.href = "../ventas";
        }, 1000);
    });
});

</script>