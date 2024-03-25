<?php
// incluir el archivo de conexión a la base de datos
include("conexion.php");
include("includes/header.php");
// verificar si se ha enviado el formulario con el código del empleado
if (isset($_POST['codigoEmpleado'])) {
    // obtener el código del empleado desde el formulario
    $codigoEmpleado = $_POST['codigoEmpleado'];

    // consulta SQL para obtener los datos del empleado con el código especificado
    $query = "SELECT * FROM empleados WHERE codigo = $codigoEmpleado";
    $resultado = mysqli_query($conn, $query);

    // verificar si se encontraron resultados
    if (mysqli_num_rows($resultado) > 0) {
        // mostrar los datos del empleado encontrado
        $empleado = mysqli_fetch_assoc($resultado);
?>
        <div class="container">
            <div class="row">
                <h2>Datos del Empleado</h2>
                <table class="table table-hover table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Foto</th>
                            <!-- Puedes agregar más columnas si es necesario -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $empleado['Codigo']; ?></td>
                            <td><?php echo $empleado['Nombre']; ?></td>
                            <td><?php echo $empleado['Apellidos']; ?></td>
                            <td><?php echo $empleado['Documento']; ?></td>
                            <td><?php echo $empleado['Direccion']; ?></td>
                            <td><?php echo $empleado['Telefono']; ?></td>
                            <td><img src="<?php echo $empleado["Foto"] ?>" width="80"></td>
                            <!-- Agrega más celdas si es necesario -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
<?php
    } else {
        echo "No se encontraron empleados con ese código.";
    }

    // liberar el resultado
    mysqli_free_result($resultado);
}

// cerrar la conexión a la base de datos
mysqli_close($conn);
?>