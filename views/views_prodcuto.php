<?php
require_once '../confi/conexion.php';
require_once '../model/buscar_pais/model_bucr.php';

$c = new conexion();
$base_de_datos = $c->getconexion();

$b = new modelbuscar($base_de_datos);
$resultado = $b->selectpais();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Productos</title>

    <link href="../public/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/registrar/registrar.css"> 
</head>
<body>

<div class="card p-4">
    <h2 class="text-center titulo mb-4">Registrar Producto</h2>

    <form id="registrar">

        <div id="mensaje" class="mb-3"></div>

        <div class="mb-3">
            <label class="form-label">Código</label>
            <input type="number" class="form-control" name="codigo" placeholder="Ingrese código" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" placeholder="Ingrese precio" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" placeholder="Ingrese stock" required>
        </div>

        <div class="mb-3">
            <label class="form-label">País</label>

            <?php
            if($resultado->num_rows > 0){
                echo '<select class="form-select" name="pais" required>';
                echo '<option value="">Seleccione un país</option>';

                while($fila = $resultado->fetch_assoc()){
                    echo '<option value="'.$fila['id_pais'].'">'.$fila['nombre'].'</option>';
                }

                echo '</select>';
            }else{
                echo '<p class="text-danger">No hay países registrados</p>';
            }
            ?>
        </div>

        <button type="submit" class="btn btn-primary btn-custom">
            Registrar
        </button>

    </form>
</div>

<script src="../public/js/registrar/registrar_prodcutos.js"></script>

</body>
</html>