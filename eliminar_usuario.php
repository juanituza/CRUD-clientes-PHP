<?php
require_once("Entidades/config.php");
include_once "entidades/cliente.php";

$conex = new Config();
$conexion = $conex->conectar();
$cliente=new Cliente();
$cliente->cargarFormulario($_REQUEST);

if (isset($_GET['id'])) {
    $cliente->eliminar();    
}

header('Location:cliente-listar.php');
mysqli_close($conexion);

?>