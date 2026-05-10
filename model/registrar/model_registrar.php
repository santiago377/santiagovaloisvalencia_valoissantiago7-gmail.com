<?php

require_once '../../confi/conexion.php';

class modelregistrar{

  public $conexion;
  public $base_de_datos;


    public function  __construct($base_de_datos){
        $this->conexion =  $base_de_datos;

    }

    PUBLIC $cod,$nom,$pre,$stc,$pa;
    public function inicializar($cod,$nom,$pre,$stc,$pa){
        $this->cod = $cod;
        $this->nom = $nom;
        $this->pre = $pre;
        $this->stc = $stc;
        $this->pa = $pa;
    }


    public $sql;
    public function insertar(){
        $this->sql = "INSERT INTO  producto (codi,nomb,prec,stoc,pais_id)
        VALUES('$this->cod','$this->nom','$this->pre','$this->stc','$this->pa')";

        return $this->conexion->query($this->sql);
    }




}
?>