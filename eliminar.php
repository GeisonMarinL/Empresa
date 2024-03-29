<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

if(isset($_POST['codigo'])){
    $codigo = $_POST['codigo'];

    // Consulta para eliminar el registro con el código especificado
    $sql = "DELETE FROM tabla_usuarios WHERE codigo = '$codigo'";

    // Ejecutar la consulta
    if(mysqli_query($conn, $sql)){
        echo "Registro eliminado correctamente.";
    } else{
        echo "Error al intentar eliminar el registro: " . mysqli_error($conn);
    }
} else{
    echo "Código de registro no especificado.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>