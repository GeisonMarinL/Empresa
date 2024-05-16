<?php
session_start();
include("conexion.php");
include("includes/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $documento = $_POST['documento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $ruta_destino = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $ruta_destino = "imagenes/" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino);
    }

    $query = "UPDATE empleados SET Nombre='$nombre', Apellidos='$apellidos', Documento='$documento', Direccion='$direccion', Telefono='$telefono', Foto='$ruta_destino' WHERE Codigo='$codigo'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = 'Empleado actualizado con éxito!';
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
}

$codigo = $_GET['codigo'];
$query = "SELECT * FROM empleados WHERE Codigo = '$codigo'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No se encontró el registro.";
    exit();
}

mysqli_close($conn);
?>

<div class="container">
    <h1 class="mt-5">Formulario de Datos</h1>
    <form action="actualizar.php?codigo=<?php echo $_GET['codigo'] ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row['Codigo']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $row['Apellidos']; ?>">
        </div>
        <div class="form-group">
            <label for="documento">Documento</label>
            <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $row['Documento']; ?>">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['Direccion']; ?>">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $row['Telefono']; ?>">
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
        </div>
    </form>
</div>

<?php include("includes/footer.php"); ?>