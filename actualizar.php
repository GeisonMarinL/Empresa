<?php
// Incluye el archivo de conexión a la base de datos
include("conexion.php");
// Incluye el archivo de encabezado para la página
include("includes/header.php");

// Verifica si el formulario se ha enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario enviados
    $codigo = $_POST['codigo']; // Código del empleado
    $nombre = $_POST['nombre']; // Nombre del empleado
    $apellidos = $_POST['apellidos']; // Apellidos del empleado
    $documento = $_POST['documento']; // Documento del empleado
    $direccion = $_POST['direccion']; // Dirección del empleado
    $telefono = $_POST['telefono']; // Teléfono del empleado

    // Verifica si se ha subido una nueva foto y si no hay errores en el archivo
    $ruta_destino = isset($_FILES['foto']) && $_FILES['foto']['error'] == 0 ? "imagenes/" . $_FILES['foto']['name'] : "";
    // Si se ha subido una nueva foto, procede con la eliminación de la antigua y la subida de la nueva
    if ($ruta_destino) {
        // Consulta SQL para obtener la ruta de la foto existente
        $query = "SELECT Foto FROM empleados WHERE Codigo = '$codigo'";
        $result = mysqli_query($conn, $query);
        // Si se encuentra la foto existente, la elimina
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (file_exists($row['Foto'])) unlink($row['Foto']);
        }
        // Mueve la nueva foto al directorio de imágenes
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino);
    }

    // Consulta SQL para actualizar el registro con los nuevos datos y la nueva foto (si se ha subido)
    $query = "UPDATE empleados SET Nombre='$nombre', Apellidos='$apellidos', Documento='$documento', Direccion='$direccion', Telefono='$telefono', Foto='$ruta_destino' WHERE Codigo='$codigo'";
    // Ejecuta la consulta y redirige al usuario si la actualización es exitosa
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        // Muestra un mensaje de error si la actualización falla
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
}

// Recoge el código del empleado desde la URL
$codigo = $_GET['codigo'];
// Consulta SQL para obtener los datos del empleado
$query = "SELECT * FROM empleados WHERE Codigo = '$codigo'";
$result = mysqli_query($conn, $query);
// Verifica si se encontraron resultados
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    // Muestra un mensaje de error si no se encuentra el registro
    echo "No se encontró el registro.";
    exit();
}
// Cierra la conexión a la base de datos
mysqli_close($conn);
?>

<!-- Contenedor principal del formulario -->
<div class="container">
    <!-- Título del formulario -->
    <h1 class="mt-5">Formulario de Datos</h1>
    <!-- Formulario para actualizar datos, la acción se dirige a "actualizar.php" con un parámetro de código obtenido de la URL -->
    <form action="actualizar.php?codigo=<?php echo $_GET['codigo']?>" method="post" enctype="multipart/form-data">
        <!-- Grupo de formulario para el código, el valor se obtiene de la base de datos y es de solo lectura -->
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row['Codigo']; ?>" readonly>
        </div>
        <!-- Grupo de formulario para el nombre, el valor se obtiene de la base de datos -->
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>">
        </div>
        <!-- Grupo de formulario para los apellidos, el valor se obtiene de la base de datos -->
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $row['Apellidos']; ?>">
        </div>
        <!-- Grupo de formulario para el documento, el valor se obtiene de la base de datos -->
        <div class="form-group">
            <label for="documento">Documento</label>
            <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $row['Documento']; ?>">
        </div>
        <!-- Grupo de formulario para la dirección, el valor se obtiene de la base de datos -->
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['Direccion']; ?>">
        </div>
        <!-- Grupo de formulario para el teléfono, el valor se obtiene de la base de datos -->
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $row['Telefono']; ?>">
        </div>
        <!-- Grupo de formulario para la foto, permite subir un archivo -->
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>

        <!-- Botón para enviar el formulario -->
        <div class="form-group mt-3"> 
            <button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
        </div>
    </form>
</div>
<!-- Incluye el pie de página del sitio -->
<?php include("includes/footer.php");?>