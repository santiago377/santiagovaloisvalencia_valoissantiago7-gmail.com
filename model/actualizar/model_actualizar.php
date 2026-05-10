<?php

require_once '../confi/conexion.php';


class actualizar_prodcuto{

 public $conexion;
 public $base_de_datos;

  public function __construct($base_de_datos){

    $this->conexion = $base_de_datos;
  }

  public $id_variable;
  public function inicializar($id_variable){

    $this->id_variable = $id_variable;
  } 

  public $sql1,$resultado1;
  public function select_buscar(){

    $this->sql1 = "SELECT id_prod, codi, nomb, prec, stoc
    FROM producto WHERE id_prod = '$this->id_variable' ";

    return $this->resultado1 = $this->conexion->query($this->sql1);
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
    nomb = '$this->n, prec = '$this->p', stoc= '$this->s' WHERE id_prod = '$this->i'";


    return  $this->conexion->query($this->sql2);


  }


}

?>