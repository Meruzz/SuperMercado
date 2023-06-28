<?php
/*-
utilizamos PDO para evitar filtraciones de terceros 

*/
function conectaBaseDatos()
{
    try {

        $servidor = "localhost";
        $puerto = "3306";
        $basedatos = "bddsuper";
        $usuario =   "root";
        $contrasena = "";

        $conexion = new PDO("mysql:host=$servidor;port=$puerto;dbname=$basedatos",
            $usuario,
            $contrasena,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conexion;
    } catch (PDOException $e) {
        die ("No se puede conectar a la base de datos" . $e->getMessage());
        echo "ERROR DE CONEXION";
    }
}
?>