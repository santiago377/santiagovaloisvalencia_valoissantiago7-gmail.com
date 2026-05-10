<?php

require_once '../../confi/conexion.php';


class actualizar_prodcuto{

 public $conexion;
 public $base_de_datos;

  public function __construct($base_de_datos){

    $this->conexion = $base_de_datos;
  }

  public $i,$c,$n,$p,$s;
  public function inicializador2($i,$c,$n,$p,$s){
   $this->i = $i;
   $this->c = $c;
   $this->n = $n;
   $this->p = $p;
   $this->s = $s;
  }

  
  public $sql2;
  public function updateprodcuto(){

    $this->sql2= "UPDATE  producto SET codi = '$this->c',
    nomb = '$this->n', prec = '$this->p', stoc= '$this->s' WHERE id_prod = '$this->i'";


    return  $this->conexion->query($this->sql2);


  }


}

?>