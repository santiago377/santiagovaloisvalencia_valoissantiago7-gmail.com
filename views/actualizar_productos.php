<?php

require_once '../confi/conexion.php';
require_once '../model/actualizar/model_actualizar.php';

$c = new Conexion();
$base_de_datos = $c->getConexion();

$a = new actualizar_prodcuto($base_de_datos);

$id_variable = $_GET['valor'];
$a->inicializar($id_variable);

$resultado = $a->select_buscar();

if($resultado->num_rows > 0){
    while($fila = $resultado->fetch_assoc()){

        $id = $fila['id_prod'];
        $codigo = $fila['codi'];
        $nombre = $fila['nomb'];
        $precio = $fila['prec'];
        $stock = $fila['stoc'];

    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>

    <!-- Bootstrap -->
    <link href="../public/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/actualizar/css_actualizar.css">
    

</head>
<body>

<div class="contenedor">

    <div class="card-form">

        <h2 class="titulo">
            <i class="bi bi-pencil-square"></i>
            Actualizar Producto
        </h2>

        <form id="actualizar">

            <div id="mensaje" class="mb-3"></div>

            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-upc-scan icono"></i>
                    Código
                </label>

                <input 
                    type="number" 
                    name="codigo"
                    class="form-control"
                    value="<?php echo $codigo; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-box icono"></i>
                    Nombre
                </label>

                <input 
                    type="text" 
                    name="nombre"
                    class="form-control"
                    value="<?php echo $nombre; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-currency-dollar icono"></i>
                    Precio
                </label>

                <input 
                    type="number" 
                    name="precio"
                    class="form-control"
                    value="<?php echo $precio; ?>">
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="bi bi-boxes icono"></i>
                    Stock
                </label>

                <input 
                    type="number" 
                    name="sotck"
                    class="form-control"
                    value="<?php echo $stock; ?>">
            </div>

            <button type="submit" class="btn-actualizar">
                <i class="bi bi-check-circle"></i>
                Actualizar Producto
            </button>

        </form>

    </div>

</div>

<script src="../public/js/update/update.js"></script>

</body>
</html>