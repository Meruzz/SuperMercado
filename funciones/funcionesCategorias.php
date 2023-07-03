<?php

// RETORNA UNA LISTA (VARIOS REGISTROS)
include_once "../config/conectarDB.php";

function getAllCategorias()
{
    try {
        $sql = "SELECT * FROM tab_categoria ORDER BY cat_desc";
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
?>
