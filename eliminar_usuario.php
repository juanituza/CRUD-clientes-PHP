<?php
require_once("Entidades/config.php");
include_once "entidades/cliente.php";

$conex = new Config();
$conexion = $conex->conectar();
$cliente=new Cliente();
//$cliente=$id->obtenerTodos();
$cliente->cargarFormulario($_REQUEST);

if (isset($_GET['id'])) {
    $cliente->eliminar();
    
}
/*$id=$_GET['id'];
 $sql = "DELETE FROM clientes WHERE idcliente =  '$id'";

$resultado = mysqli_query($conexion, $sql); */

header('Location:cliente-listar.php');
mysqli_close($conexion);

?>