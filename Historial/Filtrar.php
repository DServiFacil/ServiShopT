<?php
// Conexión a la base de datos (reemplaza con tus propios detalles de conexión)
require('../Perfile.php');

// Obtener fechas desde la solicitud AJAX
$fechaInicial = $_POST['fechaInicial'];
$fechaFinal = $_POST['fechaFinal'];

// Consulta SQL con filtro de fechas
$sql = "SELECT VS.IdVenta, Cantidad, Costo, PagaCon, Cambio, tipoproducto, precioKg, tipoventa, NombreCliente, vs.FechaVenta FROM VENTAS VS
        INNER JOIN catproductos CP ON VS.IdProducto = CP.IdTipoProducto 
        INNER JOIN cattipoventas CTV ON VS.IdTipoVenta = CTV.IdTipoVenta
        LEFT JOIN clientes CLS ON VS.IdCliente = CLS.IdCliente
        WHERE vs.FechaVenta BETWEEN '$fechaInicial' AND '$fechaFinal'
        ORDER BY VS.IdVenta DESC";

$result = mysqli_query($conn, $sql);

// Construir la tabla con los resultados
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['IdVenta']}</td>";
    echo "<td>{$row['NombreCliente']}</td>";
    echo "<td>{$row['tipoventa']}</td>";
    echo "<td>{$row['tipoproducto']}</td>";
    echo "<td>{$row['precioKg']}</td>";
    echo "<td>{$row['Cantidad']}</td>";
    echo "<td>{$row['Costo']}</td>";
    echo "<td>{$row['PagaCon']}</td>";
    echo "<td>{$row['Cambio']}</td>";
    echo "<td>" . date("Y/m/d H:i:s a", strtotime($row['FechaVenta'])) . "</td>";
    echo "</tr>";
}

$conn->close();
?>
