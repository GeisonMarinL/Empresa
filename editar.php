<?php
// Conecta a la base de datos
include("conexion.php");

// Verifica si se ha enviado el formulario de edición
if (isset($_POST['btnEditar'])) {
    // Recupera los datos del formulario
    $id = $_POST['txtId'];
    $codigo = $_POST['txtCodigo'];
    $nombre = $_POST['txtNombre'];
    $apellidos = $_POST['txtApellidos'];
    $documento = $_POST['txtDocumento'];
    $direccion = $_POST['txtDireccion'];
    $telefono = $_POST['txtTelefono'];
    // Aquí también manejarías la foto si se va a actualizar

    // Prepara la consulta SQL
    $sql = "UPDATE empleados SET codigo = ?, nombre = ?, apellidos = ?, documento = ?, direccion = ?, telefono = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Ejecuta la consulta con los datos del formulario
    $stmt->bind_param("ssssssi", $codigo, $nombre, $apellidos, $documento, $direccion, $telefono, $id);
    $stmt->execute();

    // Redirige o muestra un mensaje de éxito
    header("Location: index.php");
}
?>
