<?php
require_once '../../confi/conexion.php';
require_once '../../model/actualizar/model_updete.php';

header('Content-Type: application/json');

$variable = $_GET['valor'];

if($variable == 'actualizar'){

   $c = new Conexion();
   $base_de_datos = $c->getConexion();

   $a = new  actualizar_prodcuto($base_de_datos);

   $i = $_POST['id'];
   $c = $_POST['codigo'];
   $n = $_POST['nombre'];
   $p = $_POST['precio'];
   $s = $_POST['sotck'];

   $a->inicializador2($i,$c,$n,$p,$s);

   $resultado = $a->updateprodcuto();


    if(!$resultado){

        echo json_encode([
            "success" => false,
            "message" => "No registró"
        ]);

    }else{

        echo json_encode([
            "success" => true,
            "message" => "Sí actulizo",
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