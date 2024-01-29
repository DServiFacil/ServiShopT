<?php 
require('../Perfile.php');
?>

<?php
$Venta = $_GET['Tk'];

$sql = "SELECT VS.IdVenta,Cantidad,Costo,PagaCon,Cambio,tipoproducto,precioKg,tipoventa,NombreCliente,vs.FechaRegistro FROM VENTAS VS
INNER JOIN catproductos CP ON VS.IdProducto = CP.IdTipoProducto 
INNER JOIN cattipoventas CTV ON VS.IdTipoVenta = CTV.IdTipoVenta
LEFT JOIN clientes CLS ON VS.IdCliente = CLS.IdCliente
where IdVenta = '$Venta'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);{
$Folio = $row['IdVenta'];
$Kg = $row['Cantidad'];
$Costo = $row['Costo'];
$PagaCon = $row['PagaCon'];
$Cambio = $row['Cambio'];
$tipoproducto = $row['tipoproducto'];
$precioKg = $row['precioKg'];
$tipoventa = $row['tipoventa'];
$NombreCliente = $row['NombreCliente'];
$FechaRegistro = $row['FechaRegistro']= date("Y/m/d H:i:s a");
}
?>

<!DOCTYPE html>
<html lang="es">
	<title>Ticket</titel>
	<body>

<table>
	<tr>
	<tr><th>Folio:00<?php print($Folio); ?></th></tr>
		<tr><th>Tortilleria</th></tr>
		<tr><th>"<?php print($NombreComercio); ?>"</th></tr>
		<th>Venta</th>
		<tr><th>---------------------------------</th></tr>
    </tr>
	<tr><td>Tipo de venta: <?php print($tipoventa); ?></td></tr>
	
	<tr><td>Producto: <?php print($tipoproducto); ?></td></tr>
	<tr><td>Costo Kg: <?php print($precioKg); ?></td></tr>
	<tr><td>Cliente: <?php print($NombreCliente); ?></td></tr>
	<tr><td>---------------------------------</td></tr>
	<tr><td>Kg Comprados: <?php print($Kg); ?></td></tr>
	<tr><td>Costo: $ <?php print($Costo); ?></td></tr>
	<tr><td>Paga Con: $<?php print($PagaCon); ?></td></tr>
	<tr><td>Cambio: $<?php print($Cambio); ?></td></tr>
	<tr><td>---------------------------------</td></tr>
    
</table>
<p>Gracias por su compra!</p>
<!-- Fin del apartado de informacion -->
   </body>
   <footer>
  <table class="">
		<tr><td><p class="text">Fecha de compra</td></p></td></tr>
		<tr><td><p class="text"><?php print($FechaRegistro); ?></td></p></td></tr>
  </table>
	</footer>
</html>
<?php
$html=ob_get_clean();
if ( headers_sent()) {
    echo $html; }

require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml("$html");

$dompdf->setPaper('80mm', 'auto');


$dompdf->render();

$dompdf->stream("Ticket.pdf", array("Attachment" => false));

?>



