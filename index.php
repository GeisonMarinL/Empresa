<?php
session_start();
include("conexion.php"); ?> <!-- Incluye el archivo de conexión a la base de datos -->
<?php include("includes/header.php"); ?> <!-- Incluye la cabecera de la página -->

<div class="container">
    <?php include("alert.php");?>
    <form action="guardar_empleados.php" method="POST" enctype="multipart/form-data">
        <!-- Botón para abrir el modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formulario Empleados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Campo para el código del empleado -->
                            <div class="form-group col-md-6">
                                <label for="codigo" class="form-label">Código:</label>
                                <input type="number" class="form-control" id="codigo" name="txtCodigo" required>
                            </div>
                            <!-- Campo para el nombre del empleado -->
                            <div class="form-group col-md-6">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="txtNombre" required>
                            </div>
                            <!-- Campo para los apellidos del empleado -->
                            <div class="form-group col-md-6">
                                <label for="apellidos" class="form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="txtApellidos" required>
                            </div>
                            <!-- Campo para el documento del empleado -->
                            <div class="form-group col-md-6">
                                <label for="documento" class="form-label">Documento:</label>
                                <input type="text" class="form-control" id="documento" name="txtDocumento" required>
                            </div>
                            <!-- Campo para la dirección del empleado -->
                            <div class="form-group col-md-6">
                                <label for="direccion" class="form-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion" name="txtDireccion">
                            </div>
                            <!-- Campo para el teléfono del empleado -->
                            <div class="form-group col-md-6">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="txtTelefono">
                            </div>
                            <!-- Campo para la foto del empleado -->
                            <div class="form-group col-md-6">
                                <label for="foto" class="form-label">Foto:</label>
                                <input type="file" accept="image/*" class="form-control" id="foto" name="txtFoto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- Botón para enviar el formulario -->
                            <input class="btn btn-primary" value="Agregar" type="submit" name="btnAgregar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Botón para abrir el modal -->
        <div class="row">
            <div class="col-md-9">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Registro nuevo
                </button>
            </div>
        </div>
    </form>



    <?php include("mostrar_tabla.php"); ?> <!-- Incluye el archivo para mostrar la tabla de empleados existentes -->
</div>

<?php include("includes/footer.php"); ?> <!-- Incluye el archivo de pie de página para mostrar el pie de página común en todas las páginas -->