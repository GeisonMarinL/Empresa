<div class="container pt-5">
    <!-- Contenedor para el formulario de búsqueda de empleados -->
    <div class="col-md-3">
        <!-- Formulario para buscar empleados por código -->
        <form action="buscar_empleado.php" method="POST" class="d-flex justify-content-end">
            <!-- Grupo de entrada para el código del empleado -->
            <div class="input-group">
                <input type="number" class="form-control" placeholder="Ingrese el código del empleado" name="codigoEmpleado" required>
                <!-- Botón para enviar el formulario de búsqueda -->
                <button class="btn btn-info" type="submit">Buscar</button>
            </div>
        </form>
    </div>

    <!-- Tabla para mostrar los datos de los empleados -->
    <table class="table table-hover table-bordered mt-3">
        <!-- Encabezado de la tabla con los nombres de las columnas -->
        <thead class="table-dark">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Foto</th>
                <th>Funciones</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla donde se mostrarán los datos de los empleados -->
        <tbody>
            <?php
            // Consulta SQL para obtener todos los empleados
            $query = "SELECT * FROM empleados";
            $result_empleado = mysqli_query($conn, $query);

            // Bucle para recorrer cada empleado y mostrar sus datos en la tabla
            while ($row = mysqli_fetch_array($result_empleado)) { ?>
                <tr>
                    <!-- Mostrar los datos de cada empleado en las celdas de la tabla -->
                    <td><?php echo $row["Codigo"] ?></td>
                    <td><?php echo $row["Nombre"] ?></td>
                    <td><?php echo $row["Apellidos"] ?></td>
                    <td><?php echo $row["Documento"] ?></td>
                    <td><?php echo $row["Direccion"] ?></td>
                    <td><?php echo $row["Telefono"] ?></td>
                    <!-- Mostrar la foto del empleado -->
                    <td><img src="<?php echo $row["Foto"] ?>" width="80"></td>
                    <!-- Botones para actualizar y eliminar el empleado -->
                    <td>
                        <a href="actualizar.php?codigo=<?php echo $row['Codigo']; ?>" class="btn btn-primary">Actualizar</a>
                        <a href="eliminar.php?codigo=<?php echo $row['Codigo']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
