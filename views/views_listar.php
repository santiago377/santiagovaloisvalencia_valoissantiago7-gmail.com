<?php

require_once '../confi/conexion.php';
require_once '../model/listar_productos/model_listar_productos.php';

$c = new conexion();
$base_de_datos = $c->getconexion();

$l = new model_listar($base_de_datos);

$resultado = $l->listarprodcutos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>

    <link href="../public/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/listar/listar.css">
     
</head>

<body>

    <div class="container contenedor">

        <div class="card card-principal">

            <!-- TITULO -->
            <div class="titulo d-flex justify-content-between align-items-center">
                <h2><i class="bi bi-box-seam"></i> Gestión de Productos</h2>

                <a href="#" class="btn btn-light">
                    <i class="bi bi-plus-circle"></i> Nuevo Producto
                </a>
            </div>

            <div class="card-body">

                <!-- BUSCADOR -->
                <div class="buscador mb-4">

                    <form action="../controller/listar_prodcutos/buscador.php" method="GET">

                        <input type="hidden" name="valor" value="listar">

                        <div class="row g-3">

                            <div class="col-md-10">
                                <input type="text"
                                    name="buscar"
                                    class="form-control form-control-lg"
                                    placeholder="Buscar por nombre o código">
                            </div>

                            <div class="col-md-2 d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-search"></i> Buscar
                                </button>
                            </div>

                        </div>
                        <div id="mensaje" class="mb-3"></div>

                    </form>

                </div>

                <!-- TABLA -->
                <div class="table-responsive">

                    <table class="table table-hover align-middle text-center">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>País</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($resultado->num_rows > 0) {

                                while ($fila = $resultado->fetch_assoc()) {

                                    echo "<tr>";

                                    echo "<td>" . $fila["id_prod"] . "</td>";

                                    echo "<td>
                                            <span class='badge bg-primary'>
                                                " . $fila["codi"] . "
                                            </span>
                                          </td>";

                                    echo "<td class='fw-bold'>" . $fila["nomb"] . "</td>";

                                    echo "<td>
                                            <span class='text-success fw-bold'>
                                                $" . number_format($fila["prec"]) . "
                                            </span>
                                          </td>";

                                    if ($fila["stoc"] > 10) {
                                        echo "<td>
                                                <span class='badge bg-success badge-stock'>
                                                    " . $fila["stoc"] . "
                                                </span>
                                              </td>";
                                    } else {
                                        echo "<td>
                                                <span class='badge bg-danger badge-stock'>
                                                    " . $fila["stoc"] . "
                                                </span>
                                              </td>";
                                    }

                                    echo "<td>" . $fila["pais_id"] . "</td>";


                                    echo "<td><a href='../views/actualizar_productos.php?valor=" . $fila['id_prod'] . "' class='botones'>actualizar</a></td>";

                                        

                                    echo "<td>
                                            <button class='btn-accion btn-eliminar inactivar-btn'
                                                data-id='" . $fila['id_prod'] . "'>
                                                <i class='bi bi-trash'></i>
                                                Eliminar
                                            </button>
                                          </td>";

                                    echo "</tr>";
                                }

                            } else {

                                echo "
                                <tr>
                                    <td colspan='8'>
                                        <div class='alert alert-warning m-3'>
                                            <i class='bi bi-exclamation-triangle'></i>
                                            No hay productos registrados
                                        </div>
                                    </td>
                                </tr>
                                ";
                            }
                            ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    <script src="../public/js/eliminar/delete.js"></script>

</body>

</html>