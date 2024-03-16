<div class="row">
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
                    <td><img src="<?php echo $row["Foto"] ?>" width="100"></td>
                </tr>

            <?php } ?>
        </tbody>

    </table>
</div>