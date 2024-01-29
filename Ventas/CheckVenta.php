<?php
require('../Perfile.php');

$Producto = $_GET['Clp'];
$TipoVenta = $_GET['Cltv'];

$sql = "SELECT * FROM cattipoventas WHERE IdTipoVenta='$TipoVenta'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row) {
    $id = $row['IdTipoVenta'];

    if ($id == 1) { // Monto
        header("Location: VentaMt.php?Clp=" . $Producto . "&Cltv=" . $TipoVenta);
        exit();
    } elseif ($id == 2) { // Kg
        header("Location: VentaKg.php?Clp=" . $Producto . "&Cltv=" . $TipoVenta);
        exit();
    }
}

// Redirigir a una página por defecto si no se encuentra el tipo de venta
header("Location: ../ventas");
exit();
?>
