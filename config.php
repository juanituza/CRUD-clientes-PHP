<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



class Config {
    const BBDD_HOST = "127.0.0.1";
    const BBDD_PORT= "3306";
    const BBDD_USUARIO = "root";
    const BBDD_CLAVE = "";
    const BBDD_NOMBRE = "teco_clientes";
    

/* 
public function conectar (){
    $user="root";
    $pass="";
    $server="127.0.0.1";
    $db= "teco_clientes";

    try {
        $con= new PDO("mysql:host=$server;dbname=$db", $user, $pass);
        echo "Se conecto a la base de datos";
    } catch (PDOException $exp) {
        echo "no se logro conectar a la base de datos: $db, error:$exp";
    }
     

    return $con;
} */
}

?>