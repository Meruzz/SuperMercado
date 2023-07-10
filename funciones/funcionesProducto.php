<?php

//RETORNA UNA LISTA (VARIOS REGISTROS)

include_once "../config/conectarDB.php";

function getAllProductos()
{
  try {
    // Consulta SQL para obtener todos los productos, incluyendo información de marcas y categorías
    $sql = "SELECT * FROM tab_productos p, tab_marcas m, tab_categoria c WHERE p.cat_id = c.cat_id and p.mar_id=m.mar_id 
     ORDER BY prod_desc";

    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $lista;
    } else {
      return null;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
    return null;
  }
}

// RETORNA UN REGISTRO
function getProductoById($idbusca)
{
  try {
    // Consulta SQL para obtener un producto por su ID
    $sql = "SELECT * FROM tab_productos WHERE id_prod=:pidbusca";
    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    $stmt->bindparam(":pidbusca", $idbusca);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $registro = $stmt->fetch(PDO::FETCH_ASSOC);
      return $registro;
    } else {
      return null;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
    return null;
  }
}

//EJECUTA COMANDOS SQL
function deleteProducto($codigo, $fecha)
{ //INSERT, UPDATE, DELETE
  try {
    // Consulta SQL para eliminar un producto basado en su código y fecha de elaboración
    $sql = "DELETE FROM mitabla WHERE codigo=:pcodigo AND pro_fecha < :pfecha";
    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    $stmt->bindparam(":pcodigo", $codigo);
    $stmt->bindparam(":pfecha", $fecha);
    $stmt->execute();
    return true; //OPCIONAL
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false; //OPCIONAL
  }
}

//EJECUTA COMANDOS SQL
function insertProducto(
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
)
{ //INSERT, UPDATE, DELETE
  try {
    // Consulta SQL para insertar un nuevo producto en la base de datos
    $sql = "INSERT INTO tab_productos
            (id_prod,
            prod_desc,
            prod_precio_c,
            prod_precio_v,
            prod_stock,
            prod_fecha_elab,
            prod_nivel_azucar,
            prod_aplica_iva,
            prod_especificacion,
            prod_imagen,
            mar_id,
            cat_id)
        VALUES (:pid_prod,
                :pprod_desc,
                :pprod_precio_c,
                :pprod_precio_v,
                :pprod_stock,
                :pprod_fecha_elab,
                :pprod_nivel_azucar,
                :pprod_aplica_iva,
                :pprod_especificacion,
                :pprod_imagen,
                :pmar_id,
                :pcat_id)";
    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);

    $stmt->bindparam(":pid_prod", $id_prod);
    $stmt->bindparam(":pprod_desc", $prod_desc);
    $stmt->bindparam(":pprod_precio_c", $prod_precio_c);
    $stmt->bindparam(":pprod_precio_v", $prod_precio_v);
    $stmt->bindparam(":pprod_stock", $prod_stock);
    $stmt->bindparam(":pprod_fecha_elab", $prod_fecha_elab);
    $stmt->bindparam(":pprod_nivel_azucar", $prod_nivel_azucar);
    $stmt->bindparam(":pprod_aplica_iva", $prod_aplica_iva);
    $stmt->bindparam(":pprod_especificacion", $prod_especificacion);
    $stmt->bindparam(":pprod_imagen", $prod_imagen);
    $stmt->bindparam(":pmar_id", $mar_id);
    $stmt->bindparam(":pcat_id", $cat_id);
    $stmt->execute();
    return true; //OPCIONAL
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false; //OPCIONAL
  }
}


// EJECUTA COMANDOS SQL
function updateProducto(
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
) {
  try {
      // Consulta SQL para actualizar un producto en la base de datos
      $sql = "UPDATE tab_productos SET
          prod_desc = :pprod_desc,
          prod_precio_c = :pprod_precio_c,
          prod_precio_v = :pprod_precio_v,
          prod_stock = :pprod_stock,
          prod_fecha_elab = :pprod_fecha_elab,
          prod_nivel_azucar = :pprod_nivel_azucar,
          prod_aplica_iva = :pprod_aplica_iva,
          prod_especificacion = :pprod_especificacion,
          prod_imagen = :pprod_imagen,
          mar_id = :pmar_id,
          cat_id = :pcat_id
          WHERE id_prod = :pid_prod";
      $conexion = conectaBaseDatos();
      $stmt = $conexion->prepare($sql);
      $stmt->bindParam(":pprod_desc", $prod_desc);
      $stmt->bindParam(":pprod_precio_c", $prod_precio_c);
      $stmt->bindParam(":pprod_precio_v", $prod_precio_v);
      $stmt->bindParam(":pprod_stock", $prod_stock);
      $stmt->bindParam(":pprod_fecha_elab", $prod_fecha_elab);
      $stmt->bindParam(":pprod_nivel_azucar", $prod_nivel_azucar);
      $stmt->bindParam(":pprod_aplica_iva", $prod_aplica_iva);
      $stmt->bindParam(":pprod_especificacion", $prod_especificacion);
      $stmt->bindParam(":pprod_imagen", $prod_imagen);
      $stmt->bindParam(":pmar_id", $mar_id);
      $stmt->bindParam(":pcat_id", $cat_id);
      $stmt->bindParam(":pid_prod", $id_prod);
      $stmt->execute();
      return true; //OPCIONAL
  } catch (PDOException $e) {
      echo $e->getMessage();
      return false; //OPCIONAL
  }
}
?>
