<?php
session_start();
include("conexion.php");
$ruta_destino = "imagenes/";

// Recibir datos del formulario
if (isset($_POST['btnAgregar'])) {
    $codigo = $_POST['txtCodigo'];
    $nombre = $_POST['txtNombre'];
    $apellidos = $_POST['txtApellidos'];
    $documento = $_POST['txtDocumento'];
    $direccion = $_POST['txtDireccion'];
    $telefono = $_POST['txtTelefono'];

    // Procesar la imagen (opcional)
    $foto = $_FILES['txtFoto']['name'];
    $foto_temp = $_FILES['txtFoto']['tmp_name'];
    $foto_destino = $ruta_destino . $foto;

    // Mover la imagen a la carpeta de destino
    move_uploaded_file($foto_temp, $foto_destino);

    // Verificar si los datos ya existen en la base de datos
    $sql_check = "SELECT * FROM empleados WHERE codigo = '$codigo' OR nombre = '$nombre' OR apellidos = '$apellidos' OR documento = '$documento' OR direccion = '$direccion' OR telefono = '$telefono'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // Si los datos ya existen, mostrar un mensaje de error
        $_SESSION['error'] = 'Los datos ingresados ya existen en la base de datos';
    } else {
        // Si los datos no existen, insertarlos en la base de datos
        $sql_insert = "INSERT INTO empleados (codigo, nombre, apellidos, documento, direccion, telefono, foto) 
            VALUES ('$codigo', '$nombre', '$apellidos', '$documento', '$direccion', '$telefono', '$foto_destino')";
        $conn->query($sql_insert);
        $_SESSION['success'] = 'Empleado agregado con éxito';
    }
}

// Cerrar conexión
$conn->close();
header("Location: index.php");
exit;
