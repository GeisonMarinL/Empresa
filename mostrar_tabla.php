<div class="container mt-2">
    <!-- Formulario de búsqueda y tabla -->
    <div class="row">
        <div class="col-3">
            <!-- Formulario de búsqueda -->
            <form class="mb-3" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                <div class="input-group">
                    <input type="number" name="id" class="form-control" placeholder="Ingrese el ID del empleado">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Tabla para mostrar los datos de los empleados -->
            <div class="table-responsive h-100">
                <table class="table table-hover table-bordered w-100">
                    <!-- Encabezado de la tabla con los nombres de las columnas -->
                    <thead class="table-dark">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Foto</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla donde se mostrarán los datos de los empleados -->
                    <tbody>
                        <?php
                        // Verificar si se ha enviado el formulario de búsqueda
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT * FROM empleados WHERE Codigo = $id";
                        } else {
                            $query = "SELECT * FROM empleados";
                        }

                        $result_empleado = mysqli_query($conn, $query);

                        // Bucle para recorrer cada empleado y mostrar sus datos en la tabla
                        while ($row = mysqli_fetch_array($result_empleado)) {?>
                            <tr>
                                <!-- Mostrar los datos de cada empleado en las celdas de la tabla -->
                                <td><?php echo $row["Codigo"]?></td>
                                <td><?php echo $row["Nombre"]?></td>
                                <td><?php echo $row["Apellidos"]?></td>
                                <td><?php echo $row["Documento"]?></td>
                                <td><?php echo $row["Direccion"]?></td>
                                <td><?php echo $row["Telefono"]?></td>
                                <!-- Mostrar la foto del empleado -->
                                <td><img src="<?php echo $row["Foto"]?>" width="80"></td>
                                <!-- Botones para actualizar y eliminar el empleado -->
                                <td>
                                    <a href="actualizar.php?codigo=<?php echo $row['Codigo'];?>" class="btn btn-primary">Actualizar</a>
                                    <a href="eliminar.php?codigo=<?php echo $row['Codigo'];?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>