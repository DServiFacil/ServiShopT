<?php include 'perfile.php' ?>

<table class="table">
    <thead class="bg-light">
        <tr class="border-0">
            <th class="border-0">Responsable</th>
            <th class="border-0">Caja</th>
            <th class="border-0">Fecha Corte</th>
        </tr>
    </thead>
    <tbody class="BusquedaRapida">
        <?php
        $consulta = "SELECT ci.*, uss.*, ci.FechaRegistro AS fech
        FROM cajainicial ci
        LEFT JOIN usuarios uss ON ci.IdUsuario = uss.IdUsuario;
        ";
        $resultado = mysqli_query($conn, $consulta);
        $contador = 0;

        while ($row = mysqli_fetch_array($resultado)) {
            ?>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['TotalMonto']; ?></td>
                    <td><?php echo date("Y/m/d", strtotime($row['fech'])); ?></td>
                </tr>
<?php } ?>
    </tbody>
</table>
