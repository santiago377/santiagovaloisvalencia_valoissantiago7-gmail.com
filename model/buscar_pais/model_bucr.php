<?php

require_once '../confi/conexion.php';

class modelbuscar{

  public $conexion;
  public $base_de_datos;


    public function  __construct($base_de_datos){
        $this->conexion =  $base_de_datos;

    }


    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////


    public $sql1,$resultado1;

    public function selectpais(){
        $this->sql1 = "SELECT id_pais,nombre
        FROM pais";

        return $this->resultado1 = $this->conexion->query($this->sql1);
    }



}
?>