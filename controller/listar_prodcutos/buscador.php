<?php

require_once '../../confi/conexion.php';
require_once '../../model/listar_productos/model_listar_productos.php';

$c = new conexion();
$base_de_datos = $c->getconexion();

$l = new model_listar($base_de_datos);

$buscar = $_GET['buscar'] ?? '';

$l->inicializar($buscar);

$resultado = $l->listarprodcutos();

require_once '../../views/listar_productos/listar_productos.php';

?>