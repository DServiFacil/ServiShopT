<?php
session_start();
include '../../Conexion/Index.PHP';
error_reporting(0);

$sql = "SELECT * FROM usuarios WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$ClaveActiva = $row['IdUsuario'];
$Nombre = $row['username'];
$TipoUsuarioA = $row['IdTipoUsuario'];

$sqlComercio = "SELECT * FROM comercio ORDER BY IdNombreComercio DESC LIMIT 1";
$resultComercio = mysqli_query($conn, $sqlComercio);
$rowComercio = mysqli_fetch_array($resultComercio);
$NombreComercio = $rowComercio['NombreComercio'];

// Supongamos que ya tienes la conexión a la base de datos establecida

$tipoUsuario = $TipoUsuarioA;  // Aquí debes asignar el valor del tipo de usuario que proviene de la base de datos

$sqlRedireccion = "SELECT CASE
                        WHEN IdTipoUsuario = 1 THEN '../../ControlPanel'
                        WHEN IdTipoUsuario = 2 THEN '../../Ventas'
                        ELSE NULL
                    END AS RedireccionURL
                    FROM usuarios
                    WHERE IdTipoUsuario = $TipoUsuarioA";

$resultadoRedireccion = mysqli_query($conn, $sqlRedireccion);
$rowRedireccion = mysqli_fetch_array($resultadoRedireccion);

if ($rowRedireccion && $rowRedireccion['RedireccionURL']) {
    header("Location: " . $rowRedireccion['RedireccionURL']);
    exit;
} else {
    // Manejar el caso en el que el tipo de usuario no tenga una URL asociada
    echo "Tipo de usuario no válido";
}
?>
