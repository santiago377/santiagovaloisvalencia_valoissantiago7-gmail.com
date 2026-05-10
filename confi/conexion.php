<?php

class Conexion {
  



    public $servidor ='localhost';
    public $usuario ='root';
    public $base_de_datos ='inventario';
    public $clave ='';
    public $conexion;



    public function __construct(){

        $this->servidor;
        $this->usuario;
        $this->base_de_datos;
        $this->clave;
        $this->conexion;

        $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->base_de_datos);


       return $this->conexion;
    }   

    
        

    public function respuesta(){

        
        if(!$this->conexion){
            echo"no se conecto a la base de datos";

        }else{
            echo"se conecto a la base de datos";
        }

    }

    
    
    public function getConexion(){
        return $this->conexion;
    }


 
}
?>