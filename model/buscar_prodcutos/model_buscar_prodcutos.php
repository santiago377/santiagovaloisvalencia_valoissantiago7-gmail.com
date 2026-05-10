<?php

require_once '../confi/conexion.php';

class model_listar{

    public $conexion;
    public $base_de_datos;

    public function __construct($base_de_datos){
        $this->conexion = $base_de_datos;
    }

    public $buscar;

    public function inicializar($buscar){
        $this->buscar = $buscar;
    }

    public $sql1, $resultado1;

    public function listarprodcutos(){

        $this->sql1 = "SELECT id_prod, codi, nomb, prec, stoc, pais_id
        FROM producto
        WHERE nomb LIKE '%$this->buscar%'
        OR codi LIKE '%$this->buscar%'";

        return $this->resultado1 = $this->conexion->query($this->sql1);

    }

}
?>