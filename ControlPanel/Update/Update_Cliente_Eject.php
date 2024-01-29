<?php

// Incluir el archivo de conexión
include '../../Conexion/Index.php';

// Llamar a la función de ModificarProducto con los datos del formulario
ModificarProducto($_POST['IdCliente'], $_POST['NombreCliente'], $_POST['IdEstatusProducto']);

// Función para modificar un producto en la base de datos
function ModificarProducto($IdCliente, $NombreCliente, $IdEstatusProducto)
{
    global $conn; // Hacer la conexión global para poder usarla dentro de la función

    // Sentencia SQL corregida: agregar comillas simples y corregir error de sintaxis
    $sentencia = "UPDATE clientes SET NombreCliente='" . $NombreCliente . "'
    , IdEstatusProducto='" . $IdEstatusProducto . "' WHERE IdCliente ='" . $IdCliente . "'";

    // Ejecutar la consulta y manejar errores
    $query = mysqli_query($conn, $sentencia);

    if (!$query) {
        die('Error en la consulta: ' . mysqli_error($conn));
    }

    // Cerrar la conexión
    mysqli_close($conn);
}

?>

<script type="text/javascript">
    // Mostrar un mensaje de alerta
    alert("Registro Actualizado");

    // Redireccionar a la página de control de productos
    window.location.href = '../../ControlPanel/Clientes';
</script>
