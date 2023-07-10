<?php
include_once "head.php";
include_once "../funciones/funcionesProducto.php";

$descripcion = "";
if (isset($_GET['descripcion'])) {
  $descripcion = $_GET['descripcion'];
}

$datos = getAllProductos();
?>

<div class="row">
  <div class="col-12">
    <div class="card">
    <div class="card-header">
  <h3 class="card-title">Tabla de Productos</h3>
  <div class="card-tools d-flex justify-content-between">
    <form method="GET" action="">
      <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="descripcion" class="form-control float-right" placeholder="Search" value="<?php echo isset($_GET['descripcion']) ? $_GET['descripcion'] : ''; ?>">
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i> Search
          </button>
        </div>
      </div>
    </form>
    <a href="pronuevo.php" type="button" class="btn btn-primary">Nuevo Producto</a>
  </div>
</div>


      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>DESCRIPCIÓN</th>
              <th>P. COSTO</th>
              <th>MARCA</th>
              <th>CATEGORÍA</th>
              <th>AZÚCAR</th>
              <th>IVA</th>
              <th>FOTO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!empty($datos)) {
              $descripcion = isset($_GET['descripcion']) ? $_GET['descripcion'] : '';

              foreach ($datos as $row) {
                $prod_desc = $row['prod_desc'];
                if (stripos($prod_desc, $descripcion) !== false) {
            ?>
                  <tr>
                    <td><?php echo $row['id_prod']; ?></td>
                    <td><?php echo $prod_desc; ?></td>
                    <td><?php echo $row['prod_precio_c']; ?></td>
                    <td><?php echo $row['mar_nombre']; ?></td>
                    <td><?php echo $row['cat_desc']; ?></td>
                    <td>
                      <?php
                      switch ($row['prod_nivel_azucar']) {
                        case "A":
                          echo "Alto";
                          break;
                        case "M":
                          echo "Medio";
                          break;
                        case "B":
                          echo "Bajo";
                          break;
                        case "N":
                          echo "Ninguno";
                          break;
                      }
                      ?>
                    </td>
                    <td><?php echo ($row['prod_aplica_iva'] == 1) ? "Si" : "No"; ?></td>
                    <td>
                      <img src="../img/<?php echo $row['prod_imagen']; ?>" width="100px" alt="">
                    </td>
                    <td>
                      <a href="#" class="btn btn-primary">Ver</a>
                      <a href="proeditar.php?id_prod=<?php echo $row['id_prod']; ?>" class="btn btn-warning">Editar</a>
                      <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                  </tr>
                <?php
                }
              } // foreach

              if (empty($descripcion)) {
                // Si no se ingresó una descripción, se muestran todos los resultados
                foreach ($datos as $row) {
                ?>
                  <tr>
                    <td><?php echo $row['id_prod']; ?></td>
                    <td><?php echo $row['prod_desc']; ?></td>
                    <td><?php echo $row['prod_precio_c']; ?></td>
                    <td><?php echo $row['mar_nombre']; ?></td>
                    <td><?php echo $row['cat_desc']; ?></td>
                    <td>
                      <?php
                      switch ($row['prod_nivel_azucar']) {
                        case "A":
                          echo "Alto";
                          break;
                        case "M":
                          echo "Medio";
                          break;
                        case "B":
                          echo "Bajo";
                          break;
                        case "N":
                          echo "Ninguno";
                          break;
                      }
                      ?>
                    </td>
                    <td><?php echo ($row['prod_aplica_iva'] == 1) ? "Si" : "No"; ?></td>
                    <td>
                      <img src="../img/<?php echo $row['prod_imagen']; ?>" width="100px" alt="">
                    </td>
                    <td>
                      <a href="#" class="btn btn-primary">Ver</a>
                      <a href="proeditar.php?id_prod=<?php echo $row['id_prod']; ?>" class="btn btn-warning">Editar</a>
                      <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                  </tr>
              <?php
                }
              }
            } else {
              ?>
              <tr>
                <td colspan="9">No se encontraron resultados.</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>


<?php include_once "footer.php"; ?>