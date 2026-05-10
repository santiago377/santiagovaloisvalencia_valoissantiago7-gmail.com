<?php

header('Content-Type: application/json');

$variable = $_GET['valor'];

if ($variable == 'registrar') {

    require '../../confi/conexion.php';

    $c = new Conexion();
    $base_de_datos = $c->getConexion();

    require_once '../../model/registrar/model_registrar.php';

    $r = new modelregistrar($base_de_datos);

    $cod = $_POST['codigo'];
    $nom = $_POST['nombre'];
    $pre = $_POST['precio'];
    $stc = $_POST['stock'];
    $pa = $_POST['pais'];

    $r->inicializar($cod,$nom,$pre,$stc,$pa);

    $resultado = $r->insertar();

    if(!$resultado){

        echo json_encode([
            "success" => false,
            "message" => "No registró"
        ]);

    }else{

        echo json_encode([
            "success" => true,
            "message" => "Sí registró",
            'redirect' => 'http://localhost/inventario2/views/views_listar.php'
        ]);
    }

}else{

    echo json_encode([
        "success" => false,
        "message" => "No llegó"
    ]);
}
?>