<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



class Config {
    public function __construct()
    {
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    } 
    function conectar(){
        $user="root";
        $pass="";
        $server="127.0.0.1";
        $bd= "teco_clientes";
        
        $conex = mysqli_connect($server, $user, $pass, $bd) or die("Error al conectar a la base de datos");
        return $conex;
    }   
}

?>