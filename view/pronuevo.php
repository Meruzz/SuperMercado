<?php
include_once "head.php";
?>
<!-- Agregar la librería de Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<?php
include_once "../funciones/funcionesMarcas.php";
include_once "../funciones/funcionesCategorias.php";
include_once "../funciones/funcionesProducto.php";

if (isset($_POST['btnGuardar'])) {
    // Obtener los datos del formulario
    $id_prod = $_POST['txtCodigo']; // Campo Código
    $prod_desc = $_POST['txtDesc']; // Campo Descripción
    $prod_precio_c = $_POST['txtPrecio']; // Campo Precio Costo
    $prod_precio_v = $_POST['txtPrecioV']; // Campo Precio Venta
    $prod_stock = $_POST['txtStock']; // Campo Stock
    $prod_fecha_elab = $_POST['txtFechaElab']; // Campo Fecha Elaboración
    $prod_nivel_azucar = $_POST['cboNivelAzucar']; // Campo Nivel de Azúcar

    $prod_aplica_iva = 0; // Valor predeterminado para el campo Checkbox Paga IVA

    if (isset($_POST['chkPagaIva2'])) {
        $prod_aplica_iva = 1; // Si el checkbox está marcado, se asigna el valor 1
    }

    $prod_especificacion = $_POST['txtEspecifi2']; // Campo Especificaciones

    // Manejo de la carga de la imagen
    $imgFile = $_FILES['imgProducto']['name'];
    $tmp_dir = $_FILES['imgProducto']['tmp_name'];
    $imgSize = $_FILES['imgProducto']['size'];
    $upload_dir = '../img/'; // Reemplaza con la ruta correcta en tu servidor

    if (!empty($imgFile)) {
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
        $numero = rand(1000, 9999);
        $prod_imagen = $numero . "." . $imgExt;

        $valid_extensions = array('jpeg', 'jpg', 'gif');

        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 1000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $prod_imagen);
            } else {
                $error[] = "El archivo es demasiado grande, debe ser menor a 1MB.";
            }
        } else {
            $error[] = "Extensión de archivo no permitida. Por favor, sube una imagen en formato JPEG, JPG o GIF.";
        }
    } else {
        $prod_imagen = "sinImagen.jpg";
    }

    $mar_id = $_POST['cboMarcas']; // Campo Marcas
    $cat_id = $_POST['cboCategorias']; // Campo Categorías

    // Insertar el producto en la base de datos
    if (insertProducto(
        $id_prod,
        $prod_desc,
        $prod_precio_c,
        $prod_precio_v,
        $prod_stock,
        $prod_fecha_elab,
        $prod_nivel_azucar,
        $prod_aplica_iva,
        $prod_especificacion,
        $prod_imagen,
        $mar_id,
        $cat_id
    ) == true) {
?>
        <script>
            Swal.fire(
                '',
                'Se guardó correctamente!',
                'success'
            )
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire(
                'No se pudo guardar',
                'Error',
                'error'
            )
        </script>
    <?php
    }
}
?>

<h3>Nuevo</h3>

<div class="container-fluid">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <label for="txtCodigo">Código:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-hashtag"></i></span>
                            <input type="text" name="txtCodigo" id="txtCodigo" class="form-control" aria-describedby="basic-addon1">
                        </div>

                        <label for="txtDesc">Descripción:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" name="txtDesc" id="txtDesc" class="form-control" aria-describedby="basic-addon2">
                        </div>

                        <label for="txtPrecio">Precio Costo:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" name="txtPrecio" id="txtPrecio" class="form-control" aria-describedby="basic-addon3">
                        </div>

                        <label for="txtPrecioV">Precio Venta:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon4"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" name="txtPrecioV" id="txtPrecioV" class="form-control" aria-describedby="basic-addon4">
                        </div>

                        <label for="txtStock">Stock:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon5"><i class="fas fa-hashtag"></i></span>
                            <input type="number" name="txtStock" id="txtStock" class="form-control" aria-describedby="basic-addon5">
                        </div>

                        <label for="txtFechaElab">Fecha Elaboración:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon6"><i class="fas fa-calendar-alt"></i></span>
                            <input type="date" name="txtFechaElab" id="txtFechaElab" class="form-control" aria-describedby="basic-addon6">
                        </div>

                        <label for="cboNivelAzucar">Nivel de Azúcar:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon7"><i class="fas fa-sort-amount-up"></i></span>
                            <select name="cboNivelAzucar" id="cboNivelAzucar" class="form-select" required>
                                <option value="A">Alto</option>
                                <option value="M">Medio</option>
                                <option value="B">Bajo</option>
                                <option value="N" selected>Ninguno</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <h3>Lado derecho</h3>

                        <div class="form-check">
                            <input type="checkbox" name="chkPagaIva2" id="chkPagaIva2" class="form-check-input">
                            <label class="form-check-label" for="chkPagaIva2"><strong>Paga IVA</strong></label>
                        </div>

                        <label for="txtEspecifi2" mt-2>Especificaciones:</label>
                        <br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon8"><i class="fas fa-comment"></i></span>
                            <textarea name="txtEspecifi2" id="txtEspecifi2" class="form-control" cols="10" rows="1"></textarea>
                        </div>

                        <!-- Sección para subir la imagen -->
                        <label for="imgProducto">Imagen del Producto:</label>
                        <div class="input-group mb-3">
                            <input type="file" name="imgProducto" id="imgProducto" class="form-control">
                        </div>

                        <!-- Vista previa de la imagen -->

                        <div id="vistaPreviaImagen">
                            <img id="imagenPrevia" src="#" alt="Vista previa de la imagen" style="max-width: 100%; max-height: 200px;">
                        </div>

                        <!-- Script para mostrar la vista previa de la imagen seleccionada -->
                        <script src="js/script.js"></script>

                        <?php
                        // Obtener todas las marcas disponibles
                        $marcas = getAllMarcas();
                        ?>
                        <label for="txtEspecifi2">Marcas:</label>
                        <select class="form-select" name="cboMarcas">
                            <option value="">Seleccione Marca</option>

                            <?php
                            if ($marcas != null) {
                                foreach ($marcas as $indice => $rowm) {
                            ?>
                                    <option value="<?php echo $rowm['mar_id']; ?>"> <?php echo $rowm['mar_nombre']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select><br>

                        <label for="txtEspecifi2">Categorías:</label>
                        <?php
                        // Obtener todas las categorías disponibles
                        $categorias = getAllCategorias();
                        ?>
                        <select class="form-select" name="cboCategorias">
                            <option value="">Seleccione Categoría</option>

                            <?php
                            if ($categorias != null) {
                                foreach ($categorias as $indice => $rowc) {
                            ?>
                                    <option value="<?php echo $rowc['cat_id']; ?>"> <?php echo $rowc['cat_desc']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <!-- -->
                        <button type="submit" name="btnGuardar" class="btn btn-primary btn-sm mt-2"><i class="fas fa-save"></i> Grabar</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Agregar la librería de Font Awesome (versión JS) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

<?php include_once "footer.php"; ?>
