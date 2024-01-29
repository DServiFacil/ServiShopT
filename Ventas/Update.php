<?pph
<form action="update.php" method="post" class="php-email-form">
        <div class="row gy-4">
            <div class="col-md-6">
                <label for="Monto">Cantidad $</label>
                <input type="number" name="Monto" id="Monto" class="form-control" placeholder="Ingrese la cantidad" required>
            </div>

            <div class="col-md-6">
                <label for="cliente">Cliente (opcional)</label>
                <select class="form-control" name="cliente" id="cliente">
                    <option value="">Selecciona un cliente</option>
                    <?php
                    // Output options for clients
                    $consultaClientes = "SELECT IdCliente, NombreCliente FROM clientes";
                    $resultClientes = mysqli_query($conn, $consultaClientes);
                    while ($filaCliente = mysqli_fetch_assoc($resultClientes)) {
                        echo '<option value="' . $filaCliente['IdCliente'] . '">' . $filaCliente['NombreCliente'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="subject">Paga con</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Ingrese la cantidad con la que paga" required>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" style="background: green;">Finalizar venta</button>
            </div>
        </div>
    </form>
