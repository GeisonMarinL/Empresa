<?php

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

    // Insertar datos en la base de datos
    $sql = "INSERT INTO empleados (codigo, nombre, apellidos, documento, direccion, telefono, foto) 
                VALUES ('$codigo', '$nombre', '$apellidos', '$documento', '$direccion', '$telefono', '$foto_destino')";

    $conn->query($sql);

    /*if ($conn->query($sql) === TRUE) {
            echo "Registro creado satisfactoriamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
       } */
}
// Cerrar conexión
$conn->close();
header("Location: index.php");
exit;
?>
