<!-- Conexión con el servidor -->
<?php include 'Conexion/Index.PHP'; ?>
<!-- Fin conexión -->

<!-- Apartado que contiene toda la información de los elementos de texto clasificada por apartados dentro del layaut principal -->
<!-- Textos Hero -->
<!-- Texto Presentación -->
<?php
// Obtener la fecha actual en formato YYYY-MM-DD
 $fechaHoy = date("Y-m-d");

// Consulta MySQL para obtener el total de la cantidad registrada hoy
 $sql = "SELECT SUM(Cantidad) AS TotalCantidad FROM Ventas WHERE FechaVenta  = '$fechaHoy'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    
    // Obtener el total de la cantidad
    $totalCantidad = $row['TotalCantidad'];

}
?>
<?php
// Obtener la fecha actual en formato YYYY-MM-DD
 $fechaHoy = date("Y-m-d");

// Consulta MySQL para obtener el total de la cantidad registrada hoy
 $sql = "SELECT SUM(Costo) AS TotalCosto FROM Ventas WHERE FechaVenta  = '$fechaHoy'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    
    // Obtener el total de la cantidad
    $TotalCosto = $row['TotalCosto'];

}
?>

<?php 
$sql = "SELECT COUNT(*) AS TotalRegistros FROM Ventas WHERE FechaVenta  = '$fechaHoy'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    
    // Obtener el total de registros
    $totalRegistrosf = $row['TotalRegistros'];
}
?>

<?php 
$sql = "SELECT COUNT(*) AS TotalRegistros FROM Ventas";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    
    // Obtener el total de registros
    $totalRegistros = $row['TotalRegistros'];
}
?>

<?php 
// Consulta MySQL para obtener el total de cancelaciones del día actual
$sql = "SELECT COUNT(*) AS TotalCancelaciones FROM Ventas WHERE FechaRegistro = '$fechaHoy' AND IdEstatus = 2";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    
    // Obtener el total de cancelaciones
    $totalCancelaciones = $row['TotalCancelaciones'];
}
?>
<!-- FIN REGLAS CARDINALES -->

<!-- Fin apartdo de layaut -->

<?php
require('../Perfile.php');

// Consulta para obtener las ganancias del día
 $sql_1 = "SELECT SUM(Costo) AS GananciasDelDia FROM VENTAS WHERE DATE(FechaVenta) = CURDATE()";
$res_1 = mysqli_query($conn, $sql_1);{
    $row1 = mysqli_fetch_array($res_1);
    $GananciasDelDia = $row1['GananciasDelDia']; 
}

// Consulta para obtener kg vendidos del día
$sql_1 = "SELECT SUM(Cantidad) AS KilogramosVendidos FROM VENTAS WHERE DATE(FechaVenta) = CURDATE()";
$res_1 = mysqli_query($conn, $sql_1);{
    $row1 = mysqli_fetch_array($res_1);
    $KilogramosVendidos = $row1['KilogramosVendidos']; 
}

// Consulta para obtener las ganancias totales
$sql_1 = "SELECT SUM(Costo) AS TotalVentas FROM VENTAS;
;
";
$res_1 = mysqli_query($conn, $sql_1);{
    $row1 = mysqli_fetch_array($res_1);
    $TotalVentas = $row1['TotalVentas']; 
}

// Consulta para obtener kg vendidos
$sql_1 = "SELECT SUM(Cantidad) AS KilogramosVendidos FROM VENTAS ";
$res_1 = mysqli_query($conn, $sql_1);{
    $row1 = mysqli_fetch_array($res_1);
    $KilogramosVendidosT = $row1['KilogramosVendidos']; 
}

?>