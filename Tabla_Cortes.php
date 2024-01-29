<?php include 'perfile.php' ?>

<table class="table">
    <thead class="bg-light">
        <tr class="border-0">
            <th class="border-0">#</th>
            <th class="border-0">Caja Inicial</th>
            <th class="border-0">Ganancias</th>
            <th class="border-0">En caja</th>
            <th class="border-0">Variación</th>
            <th class="border-0">Responsable</th>
            <th class="border-0">Fecha Corte</th>
        </tr>
    </thead>
    <tbody class="BusquedaRapida">
        <?php
        $consulta = "SELECT *, cc.FechaRegistro as fech FROM cortecaja cc LEFT JOIN usuarios us ON cc.IdUsuario = us.IdUsuario ORDER BY cc.IdCorteCaja DESC";
        $resultado = mysqli_query($conn, $consulta);
        $contador = 0;

        while ($row = mysqli_fetch_array($resultado)) {
            ?>
                    <td><?php echo $row['IdCorteCaja']; ?></td>
                    <td><?php echo $row['TotalMonto']; ?></td>
                    <td><?php echo $row['Ganancias']; ?></td>
                    <td><?php echo $row['Efectivo']; ?></td>
                    <td><?php echo $row['Variacion']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo date("Y/m/d H:i:s a", strtotime($row['fech'])); ?></td>
                </tr>
<?php } ?>
    </tbody>
</table>
