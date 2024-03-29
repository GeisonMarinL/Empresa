<div class="row">
    <div class="col-md-3"> 
        <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
            <form action="buscar_empleado.php" method="POST" class="w-100"> <!-- Utiliza el 100% del ancho -->
                <div class="input-group">
                    <input type="number" class="form-control" placeholder="Ingrese el código del empleado" name="codigoEmpleado" required>
                    <button class="btn btn-info" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-hover  table-bordered ">
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
        <tbody>
            <?php

            $query = "SELECT * FROM empleados";
            $result_empleado = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result_empleado)) { ?>
                <tr>
                    <td><?php echo $row["Codigo"] ?></td>
                    <td><?php echo $row["Nombre"] ?></td>
                    <td><?php echo $row["Apellidos"] ?></td>
                    <td><?php echo $row["Documento"] ?></td>
                    <td><?php echo $row["Direccion"] ?></td>
                    <td><?php echo $row["Telefono"] ?></td>
                    <td><img src="<?php echo $row["Foto"] ?>" width="80"></td>
                    <td>
                        <a href="editar.php" class="btn btn-primary">Editar</a>
                        <a href="eliminar.php" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                </tr>

            <?php } ?>
        </tbody>

    </table>
</div>