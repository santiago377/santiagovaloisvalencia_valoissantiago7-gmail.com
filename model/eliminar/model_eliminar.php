<?php

require_once '../../confi/conexion.php';


class modeleliminar{

  public $conexion;
  public $base_de_datos;

  public function __construct($base_de_datos){
    $this->conexion = $base_de_datos;

  }

  public $id;
  public function inicializar($id){
    $this->id = $id;

  }

  public $sql;
  public function delete(){
    $this->sql ="DELETE FROM producto WHERE id_prod  = '$this->id'";

    return $this->conexion->query($this->sql);

  }
  

}
?>