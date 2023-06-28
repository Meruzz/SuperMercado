<?php

include_once "../funciones/funcionesProducto.php";
$datos = getAllProductos();

?>

<?php
include_once "head.php";

?>
<br>
<a href="nuevoProducto.php" type="button" class="btn btn-primary">Nuevo Producto</a>
<br>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">P. COSTO</th>
      <th scope="col">MARCA</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">AZUCAR</th>
      <th scope="col">IVA</th>
      <th scope="col">FOTO</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>

    <?php

    if ($datos != null) {
      foreach ($datos as $indice => $row) {


    ?>

        <tr>
          <th scope="row"><?php echo $row['id_prod']; ?></th>
          <td> <?php echo $row['prod_desc']; ?> </td>
          <td> <?php echo $row['prod_precio_c']; ?> </td>
          <td> <?php echo $row['mar_nombre']; ?> </td>
          <td> <?php echo $row['cat_desc']; ?> </td>
          <td> <?php
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
                } ?> </td>
          <td> <?php if ($row['prod_aplica_iva'] == 1)
                  echo "Si";
                else echo "No"; ?> </td>

          <td>
            <img src="../img/<?php echo $row['prod_imagen']; ?>" width="100px" alt="">
          </td>
          <td>
            <a href="#" type="button" class="btn btn-primary">Ver</a>
            <a href="#" type="button" class="btn btn-warning">Edit</a>
            <a href="#" type="button" class="btn btn-danger">Delete</a>
          </td>
        </tr>

    <?php

      } //foreach
    } //if

    ?>

  </tbody>
</table>

<?php
include_once "footer.php";

?>