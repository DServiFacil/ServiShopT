<?php include 'perfile.php' ?>
<table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Producto</th>
                                                        <th class="border-0">Compras</th>
                                                        <th class="border-0">Monto $</th>
                                                        <th class="border-0">Estatus Producto</th>
                                                        <th class="border-0">Modificar</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">
<?php

$consulta = "SELECT * FROM clientes cp
INNER JOIN estatusproductos ep ON cp.IdEstatusProducto = ep.IdEstatusProducto;
";
$resultado = mysqli_query($conn , $consulta);
$contador=0;

while($fila = mysqli_fetch_array($resultado)){ $contador++;
  echo "<tr>";
            echo "<td>"; echo $fila['IdCliente']; echo "</td>";
            echo "<td>"; echo $fila['NombreCliente']; echo "</td>";
            echo "<td>"; echo $fila['NumCompras']; echo "</td>";
            echo "<td>"; echo $fila['NumCompras']; echo "</td>";
            echo "<td>"; echo $fila['EstatusProducto']; echo "</td>";
            echo "<td><a href='../Update/Update_Cliente.php?Clabe=".$fila['IdCliente']."'> <button type='button' class='btn btn-warning'>Modificar</button> </a></td>";
            
          echo "</tr>";
        }
?>

</tbody>
      </table>