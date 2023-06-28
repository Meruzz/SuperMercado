<?php

if(isset($_POST['btnEnviar'])){

    $codigo=$_POST['txtCodigo'];
    $desc=$_POST['txtDesc'];
    $marca=$_POST['cboMarca'];
    $categ=$_POST['cboCateg'];
    $precioCost=$_POST['txtPrecioCosto'];
    $precioVenta=$_POST['txtPrecioVenta'];
    $stock=$_POST['txtSt'];
    $iva=$_POST['chkPagaIva'];
    $nivel=$_POST['rbtnNivelAzucar'];
    $descA=$_POST['txtInfoAdic'];
    $fecha=$_POST['txtFechaElaborcaion'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>Datos Ingresados</h3>
        <hr>
        <label for="">Codigo: </label> <?php  echo $codigo; ?>
        <br>
        <label for="">Descripcion: </label> <?php  echo $desc; ?>
        <br>
        <label for="">Marca: </label> <?php  echo $marca; ?>
        <br>
        <label for="">Categoria: </label> <?php  echo $categ; ?>
        <br>
        <label for="">Precio Costo: </label> <?php  echo $precioCost; ?>
        <br>
        <label for="">Precio Venta: </label> <?php  echo $precioVenta; ?>
        <br>
        <label for="">Stock: </label> <?php  echo $stock; ?>
        <br>
        <label for="">IVA: </label> <?php  echo $iva; ?>
        <br>
        <label for="">Nivel de Azucar: </label> <?php  echo $nivel; ?>
        <br>
        <label for="">Informacion Adicional: </label> <?php  echo $descA; ?>
        <br>
        <label for="">Fecha Elaboracion: </label> <?php  echo $fecha; ?>
    </div>
</body>
</html>