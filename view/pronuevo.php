<?php
include_once "head.php";
include_once "../funciones/funcionesMarcas.php";
include_once "../funciones/funcionesCategorias.php";
?>

<h3>Nuevo</h3>

<div class="container-fluid">
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <label for="txtCodigo">Código:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">#</span>
                            <input type="text" name="txtCodigo" id="txtCodigo" class="form-control" aria-describedby="basic-addon1">
                        </div>

                        <label for="txtDesc">Descripción:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">#</span>
                            <input type="text" name="txtDesc" id="txtDesc" class="form-control" aria-describedby="basic-addon2">
                        </div>

                        <label for="txtPrecio">Precio Costo:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">$</span>
                            <input type="number" name="txtPrecio" id="txtPrecio" class="form-control" aria-describedby="basic-addon3">
                        </div>

                        <label for="txtPrecioV">Precio Venta:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon4">$</span>
                            <input type="number" name="txtPrecioV" id="txtPrecioV" class="form-control" aria-describedby="basic-addon4">
                        </div>

                        <label for="txtStock">Stock:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon5">#</span>
                            <input type="number" name="txtStock" id="txtStock" class="form-control" aria-describedby="basic-addon5">
                        </div>

                        <label for="txtFechaElab">Fecha Elaboración:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon6">#</span>
                            <input type="date" name="txtFechaElab" id="txtFechaElab" class="form-control" aria-describedby="basic-addon6">
                        </div>

                        <label for="cboNivelAzucar">Nivel de Azúcar:</label>
                        <div class="input-group mb-3">
                            <select name="cboNivelAzucar" id="cboNivelAzucar" class="form-select" required>
                                <option value="A">Alto</option>
                                <option value="M">Medio</option>
                                <option value="B">Bajo</option>
                                <option value="N" selected>Ninguno</option>
                            </select>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="chkPagaIva" id="chkPagaIva" class="form-check-input">
                            <label class="form-check-label" for="chkPagaIva"><strong>Paga IVA</strong></label>
                        </div>

                        <label for="txtEspecifi">Especificaciones:</label>
                        <br><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon7">#</span>
                            <textarea name="txtEspecifi" id="txtEspecifi" class="form-control" cols="10" rows="5"></textarea>
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

                        <label for="txtEspecifi2">Especificaciones:</label>
                        <br><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon8">#</span>
                            <textarea name="txtEspecifi2" id="txtEspecifi2" class="form-control" cols="10" rows="1"></textarea>
                        </div>

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


                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once "footer.php"; ?>
