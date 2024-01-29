<?php include 'perfile.php' ?>
<table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Producto</th>
                                                        <th class="border-0">Precio x Kg</th>
                                                        <th class="border-0">Estatus Producto</th>
                                                        <th class="border-0">Modificar</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">
<?php

$consulta = "SELECT * FROM catproductos cp
INNER JOIN estatusproductos ep ON cp.IdEstatusProducto = ep.IdEstatusProducto;
";
$resultado = mysqli_query($conn , $consulta);
$contador=0;

while($fila = mysqli_fetch_array($resultado)){ $contador++;
  echo "<tr>";
            echo "<td>"; echo $fila['IdTipoProducto']; echo "</td>";
            echo "<td>"; echo $fila['TipoProducto']; echo "</td>";
            echo "<td>"; echo $fila['PrecioKg']; echo "</td>";
            echo "<td>"; echo $fila['EstatusProducto']; echo "</td>";
            echo "<td><a href='../Update/Update_Product.php?Clabe=".$fila['IdTipoProducto']."'> <button type='button' class='btn btn-warning'>Modificar</button> </a></td>";
            
          echo "</tr>";
        }
?>

</tbody>
      </table>