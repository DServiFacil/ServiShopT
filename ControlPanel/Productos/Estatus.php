<?php
include 'perfile.php';

$ClaveUser = $_GET['Clabe'];

// Verificar el estatus actual
$consultaActual = "SELECT IdEstatusProducto FROM estatusproductos WHERE IdEstatusProducto = $ClaveUser";
$resultado = mysqli_query($conn, $consultaActual);

if ($resultado) {
    $registro = mysqli_fetch_assoc($resultado);
    $estatusActual = $registro['IdEstatusProducto'];

    // Cambiar el estatus
    $nuevoEstatus = ($estatusActual == 1) ? 2 : 1;
    $consultaUpdate = "UPDATE estatusproductos SET IdEstatusProducto = $nuevoEstatus WHERE IdEstatusProducto = $ClaveUser";
    $resultadoUpdate = mysqli_query($conn, $consultaUpdate);

    if ($resultadoUpdate) {
        echo "Estatus actualizado correctamente.";

        // Redirigir a la página anterior
        echo "<script>window.history.back();</script>";
        exit();
    } else {
        echo "Error al actualizar el estatus: " . mysqli_error($conn);
    }
} else {
    echo "Error al obtener el estatus actual: " . mysqli_error($conn);
}
?>
