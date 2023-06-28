
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <div class="row m-3 ">
        <div class="col"></div>
        <div class="col"><h1>Pagina de productos</h1></div>
        <div class="col"></div>
    </div>
    <hr>
    <div class="container">
        
        <form action="datos.php" method="post">
             
            <div>
            <label for="">Ingrese Codigo</label>
            <input type="text" name="txtCodigo" placeholder="CHK001">
            </div>
                <br>
            <div>
            <label for="">Ingrese Descripcion</label>
            <input type="text" name="txtDesc" maxlength="20" placeholder=".........">
            </div>
            <br>
        
            <div>
                <label >Marca</label>
                <select name="cboMarca" require>
                    <option value="">Selecione Marca</option>
                    <option value="Gelatina Royal">Royal</option>
                    <option value="Sumesa">Sumesa</option>
                    <option value="Familia">Familia</option>
                </select>
            </div>
                <br>
            <div>
                <label >Categoria</label>
                <select name="cboCateg" require>
                    <option value="Lipieza">Productos de Limpieza</option>
                    <option value="Licores">Licores</option>
                    <option value="Confites">Confites</option>
                </select>
            </div>

                <br>

            <div>
                <label for="">Precio Costo</label>
                <input type="number" name="txtPrecioCosto">
            </div>

            <br>

            <div>
                <label for="">Precio de Venta</label>
                <input type="number" name="txtPrecioVenta">
            </div>
             <br>
            <div>
                <label for="">Stock</label>
                <input type="number" name="txtSt">
            </div>
   
                <br>

            <div>
                <input type="checkbox" name="chkPagaIva">
                <label for="">Paga IVA</label>
            </div>
            
            <br>

            <div>
            <fieldset>
            <label for=""><strong>Selecione el nivel de azucar </strong></label>

            <br>
            <br>
         
            <input type="radio"  name="rbtnNivelAzucar" value="Alto"
                    checked>
            <label for="Alto">Alto</label>
           

            
            <input type="radio"  name="rbtnNivelAzucar" value="Medio">
            <label for="Medio">Medio</label>
           

            
            <input type="radio"  name="rbtnNivelAzucar" value="Bajo">
            <label for="Bajo">Bajo</label>
            
        </fieldset>
            </div>
            
            <br>
            
            <div>
                <label for=""><strong>Informacion Adicional</strong></label>
                <br>
                <textarea name="txtInfoAdic" id="" cols="30" rows="10"></textarea>
            </div>

            <br>

            <div>
                <label for="">Fecha Elaboracion</label>
                <input type="date" name="txtFechaElaborcaion">
            </div>  

            <br>

            <div>
                <img src="img/sinImagen.jpg" alt="" width="200px">
                <br>
                <input type="file" name="imgProducto" accept="image/*">
                <br>
                <label for="ejemplo_archivo_01">Foto Tam. maximo archivo 1 MB</label>
                
            </div>
            <br>
            <div>
                <button type="submit" name="btnEnviar">Enviar</button>
            </div>
        </form>
    
    </div>

    
</body>
</html>