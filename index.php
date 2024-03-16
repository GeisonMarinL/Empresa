<?php include("conexion.php") ?>
<?php include("includes/header.php") ?>
<div class="container">
    <form action="guardar_empleados.php" method="POST" enctype="multipart/form-data">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formulario Empleados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="codigo" class="form-label">Código:</label>
                                <input type="number" class="form-control" id="codigo" name="txtCodigo" required>
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="txtNombre" required>
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="apellidos" class="form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="txtApellidos" required>
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="documento" class="form-label">Documento:</label>
                                <input type="text" class="form-control" id="documento" name="txtDocumento" required>
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="direccion" class="form-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion" name="txtDireccion">
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="txtTelefono">
                            </div>
                            <br>
                            <div class="form-group col-md-14">
                                <label for="foto" class="form-label">Foto:</label>
                                <input type="file" accept="image/*" class="form-control" id="foto" name="txtFoto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-primary" value="Agregar " type="submit" name="btnAgregar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registro nuevo+</button>
        <br>
        <br>
    </form>
    <?php include("mostrar_tabla.php") ?>

</div>

<?php include("includes/footer.php") ?>