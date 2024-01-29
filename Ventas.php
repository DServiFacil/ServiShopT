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
$sql_1 = "SELECT SUM(Costo) AS GananciasTotales
FROM VENTAS;
";
$res_1 = mysqli_query($conn, $sql_1);{
    $row1 = mysqli_fetch_array($res_1);
    $GananciasTotales = $row1['GananciasTotales']; 
}

// Consulta para obtener kg vendidos
$sql_1 = "SELECT SUM(Cantidad) AS KilogramosVendidos FROM VENTAS ";
$res_1 = mysqli_query($conn, $sql_1);{
    $row1 = mysqli_fetch_array($res_1);
    $KilogramosVendidosT = $row1['KilogramosVendidos']; 
}

?>
<div class="col-lg-3 col-md-6">
            <div class="count-box">
            <i class="bi bi-currency-dollar" style="color: #15be56"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php print($GananciasDelDia); ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Venta del día</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
            <i class="bi bi-basket2" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php print($KilogramosVendidos); ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Venta Kg del día</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
            <i class="bi bi-cash-coin" style="color: #15be96;"></i>
              <div>
              <span data-purecounter-start="0" data-purecounter-end="<?php print($GananciasTotales); ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Venta totales</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
            <i class="bi bi-basket3" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php print($KilogramosVendidosT); ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Venta total Kg</p>
              </div>
            </div>
          </div>

        </div>