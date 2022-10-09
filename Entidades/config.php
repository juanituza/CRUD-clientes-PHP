<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



class Config {
    const BBDD_HOST = "127.0.0.1";
    const BBDD_PORT = "3306";
    const BBDD_USUARIO = "root";
    const BBDD_CLAVE = "";
    const BBDD_NOMBRE = "teco_clientes";
    
    function conectar(){
        $user="root";
        $pass="";
        $server="127.0.0.1";
        $bd= "teco_clientes";
        


        $conex = mysqli_connect($server, $user, $pass, $bd) or die("Error al conectar a la base de datos");
        
        return $conex;

    }

    
    
}


/* public function __construct()
{
    $connectionString = "mysql:hos=" .$this->server.";dbname=".$this->db.";charset=utf8";
    try {
        $this->conect= new PDO($connectionString,$this->user,$this->pass);
        $this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (\Throwable $th) {
        $this->conect = 'Error de conexión';
        echo "ERROR". $th->getMessage();
    }
}
public function conectar()
{
    return $this->conect;
} */
/*
const BBDD_HOST = "127.0.0.1";
const BBDD_PORT= "3306";
const BBDD_USUARIO = "root";
const BBDD_CLAVE = "";
const BBDD_NOMBRE = "teco_clientes";
*/

?>