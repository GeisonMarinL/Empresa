<?php
// Asegúrate de tener una conexión a la base de datos
include("conexion.php"); // Asume que tienes un archivo conexion.php con la conexión a la base de datos

// Recoger el Codigo del registro desde la URL
$codigo = $_GET['codigo'];

// Consulta SQL para obtener la ruta de la imagen antes de eliminar el registro
$query = "SELECT Foto FROM empleados WHERE Codigo = '$codigo'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $ruta_imagen = $row['Foto']; // Obtener la ruta de la imagen

    // Eliminar el archivo de imagen del servidor
    if (file_exists($ruta_imagen)) {
        unlink($ruta_imagen); // Eliminar el archivo
    }
}

// Consulta SQL para eliminar el registro
$query = "DELETE FROM empleados WHERE Codigo = '$codigo'";

// Ejecutar la consulta
if (mysqli_query($conn, $query)) {
    // Redirigir al usuario a la página original o a una página de confirmación
    header("Location: index.php"); // Asume que tienes un archivo index.php con la tabla
} else {
    echo "Error al eliminar el registro: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
