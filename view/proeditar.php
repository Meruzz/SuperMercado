<?php
include_once "head.php";
include_once "../funciones/funcionesMarcas.php";
include_once "../funciones/funcionesCategorias.php";
include_once "../funciones/funcionesProducto.php";

$id_prod = isset($_GET['id_prod']) ? $_GET['id_prod'] : '';

echo "Código Recibido: " . $id_prod;

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
    $prod_imagen = "sinImagen.jpg"; // Valor predeterminado para el nombre de la imagen
    $mar_id = $_POST['cboMarcas']; // Campo Marcas
    $cat_id = $_POST['cboCategorias']; // Campo Categorías

    // Actualizar el producto en la base de datos
    if (updateProducto(
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
    )) {
        ?>
        <script>
            Swal.fire(
                '',
                'Se actualizó correctamente!',
                'success'
            )
        </script>
        <?php
    } else {
        ?>
        <script>
            Swal.fire(
                'No se pudo actualizar',
                'Error',
                'error'
            )
        </script>
        <?php
    }
} else {
    // Obtener los datos del producto para editar
    if (!empty($id_prod)) {
        $producto = getProductoById($id_prod);

        if ($producto) {
            $id_prod = $producto['id_prod'];
            $prod_desc = $producto['prod_desc'];
            $prod_precio_c = $producto['prod_precio_c'];
            $prod_precio_v = $producto['prod_precio_v'];
            $prod_stock = $producto['prod_stock'];
            $prod_fecha_elab = $producto['prod_fecha_elab'];
            $prod_nivel_azucar = $producto['prod_nivel_azucar'];
            $prod_aplica_iva = $producto['prod_aplica_iva'];
            $prod_especificacion = $producto['prod_especificacion'];
            $prod_imagen = $producto['prod_imagen'];
            $mar_id = $producto['mar_id'];
            $cat_id = $producto['cat_id'];
        }
    }
}
?>

<h3><?php echo !empty($id_prod) ? 'Editar' : 'Nuevo'; ?></h3>

<div class="container-fluid">
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <label for="txtCodigo">Código:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">#</span>
                            <input type="text" name="txtCodigo" id="txtCodigo" class="form-control" aria-describedby="basic-addon1" value="<?php echo $id_prod; ?>" <?php echo !empty($id_prod) ? 'readonly' : ''; ?>>
                        </div>

                        <label for="txtDesc">Descripción:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">#</span>
                            <input type="text" name="txtDesc" id="txtDesc" class="form-control" aria-describedby="basic-addon2" value="<?php echo $prod_desc; ?>">
                        </div>

                        <label for="txtPrecio">Precio Costo:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">$</span>
                            <input type="number" name="txtPrecio" id="txtPrecio" class="form-control" aria-describedby="basic-addon3" value="<?php echo $prod_precio_c; ?>">
                        </div>

                        <label for="txtPrecioV">Precio Venta:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon4">$</span>
                            <input type="number" name="txtPrecioV" id="txtPrecioV" class="form-control" aria-describedby="basic-addon4" value="<?php echo $prod_precio_v; ?>">
                        </div>

                        <label for="txtStock">Stock:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon5">#</span>
                            <input type="number" name="txtStock" id="txtStock" class="form-control" aria-describedby="basic-addon5" value="<?php echo $prod_stock; ?>">
                        </div>

                        <label for="txtFechaElab">Fecha Elaboración:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon6">#</span>
                            <input type="date" name="txtFechaElab" id="txtFechaElab" class="form-control" aria-describedby="basic-addon6" value="<?php echo $prod_fecha_elab; ?>">
                        </div>

                        <label for="cboNivelAzucar">Nivel de Azúcar:</label>
                        <div class="input-group mb-3">
                            <select name="cboNivelAzucar" id="cboNivelAzucar" class="form-select" required>
                                <option value="A" <?php echo $prod_nivel_azucar == 'A' ? 'selected' : ''; ?>>Alto</option>
                                <option value="M" <?php echo $prod_nivel_azucar == 'M' ? 'selected' : ''; ?>>Medio</option>
                                <option value="B" <?php echo $prod_nivel_azucar == 'B' ? 'selected' : ''; ?>>Bajo</option>
                                <option value="N" <?php echo $prod_nivel_azucar == 'N' ? 'selected' : ''; ?>>Ninguno</option>
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
                            <input type="checkbox" name="chkPagaIva2" id="chkPagaIva2" class="form-check-input" <?php echo $prod_aplica_iva == 1 ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="chkPagaIva2"><strong>Paga IVA</strong></label>
                        </div>

                        <label for="txtEspecifi2" mt-2>Especificaciones:</label>
                        <br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon8">#</span>
                            <textarea name="txtEspecifi2" id="txtEspecifi2" class="form-control" cols="10" rows="1"><?php echo $prod_especificacion; ?></textarea>
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
                        <?php
                        echo '<script src="js/script.js"></script>';
                        ?>

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
                                    $selected = $mar_id == $rowm['mar_id'] ? 'selected' : '';
                                    echo '<option value="' . $rowm['mar_id'] . '" ' . $selected . '>' . $rowm['mar_nombre'] . '</option>';
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
                                    $selected = $cat_id == $rowc['cat_id'] ? 'selected' : '';
                                    echo '<option value="' . $rowc['cat_id'] . '" ' . $selected . '>' . $rowc['cat_desc'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <!-- -->
                        <button type="submit" name="btnGuardar" class="btn btn-primary btn-sm mt-2">Guardar</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once "footer.php"; ?>
