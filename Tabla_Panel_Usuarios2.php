<?php include 'perfile.php' ?>
<table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Foto</th>
                                                        <th class="border-0">Nombre</th>
                                                        <th class="border-0">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">
<?php

$consulta = "SELECT * FROM Usuarios ";
$resultado = sqlsrv_query($conn , $consulta);
$contador=0;

while($fila = sqlsrv_fetch_array($resultado)){ $contador++;
  echo "<tr>";
            echo "<td>"; echo $fila['IdUsuario']; echo "</td>";
            echo "<td>"; echo "<img src='".$fila['Foto']."' width='50' >"; echo "</td>";
            echo "<td>"; echo $fila['NombreUsuario']; echo "</td>";
            echo "<td><a href='../Update/?Clabe=".$fila['IdUsuario']."'> <button type='button' class='btn btn-warning'>Modificar</button> </a></td>";
          echo "</tr>";
        }
?>

</tbody>
      </table>