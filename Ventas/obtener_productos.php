<?php
require('../Perfile.php');

// Obtener el valor de Clp desde $_GET
$Clp = $_GET['Clp'];

// Inicializar el array de respuesta
$response = array();

// Realizar la consulta a catproductos
$consulta = "SELECT * FROM catproductos WHERE IdTipoProducto = $Clp";
$resultado = mysqli_query($conn, $consulta);

// Verificar si la consulta fue exitosa
if ($resultado) {
    $producto = mysqli_fetch_assoc($resultado);

    // Almacenar los datos del producto en el array de respuesta
    $response['success'] = true;
    $response['data'] = $producto;
} else {
    // Si hay un error en la consulta, almacenar un mensaje de error en el array de respuesta
    $response['success'] = false;
    $response['error'] = mysqli_error($conn);
}

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
