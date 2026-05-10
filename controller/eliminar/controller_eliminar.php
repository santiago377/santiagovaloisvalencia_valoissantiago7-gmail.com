<?php

require_once '../../confi/conexion.php';
require_once '../../model/eliminar/model_eliminar.php';

header('Content-Type: application/json');

$variable = $_GET['valor'];

if($variable == 'eliminar'){

    $c = new Conexion();
    $base_de_datos = $c->getConexion();

    $e = new modeleliminar($base_de_datos);

    $id = $_POST['id'];

    $e->inicializar($id);

    $resultado = $e->delete();

    if(!$resultado){

        echo json_encode([
            "success" => false,
            "message" => "No eliminó"
        ]);

    }else{

        echo json_encode([
            "success" => true,
            "message" => "Sí eliminó"
        ]);
    }

}else{

    echo json_encode([
        "success" => false,
        "message" => "No llegó"
    ]);
}
?>