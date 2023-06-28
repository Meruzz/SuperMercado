<?php

//RETORNA UNA LISTA (VARIOS REGISTROS)

include_once "../config/conectarDB.php";
function getAllProductos()
{
  try {
    $sql = "SELECT * FROM tab_productos p, tab_marcas m, tab_categoria c WHERE p.cat_id = c.cat_id and p.mar_id=m.mar_id 
     ORDER BY prod_desc";

    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $lista;
    } else
      return null;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return null;
  }
}

// RETORNA UN REGISTRO
function getProductoById($idbusca)
{
  try {
    $sql = "SELECT * FROM tproductos
          WHERE codigo=:pidbusca";
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
    $sql = "DELETE FROM mitabla 
              WHERE codigo=:pcodigo
              AND pro_fecha < :pfecha";
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
