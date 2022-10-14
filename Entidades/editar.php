<?php

require_once("config.php");
include_once("cliente.php");






$conex = new Config();
$conexion = $conex->conectar();
if($_POST){


$id= trim($_POST['id']);    
$dni = trim($_POST['dni']);
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$genero = trim($_POST['genero']);
$telefono= trim($_POST['telefono']);

$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);

$cliente->idcliente=$id;
$cliente->dni=$dni;
$cliente->nombre=$nombre;
$cliente->apellido=$apellido;
$cliente->fk_idgenero=$genero;
$cliente->telefono=$telefono;
$cliente->actualizar();
        /* $consulta = "UPDATE clientes SET (dni='$dni', nombre= '$nombre', apellido = '$apellido', fk_idgenero='$genero', telefono='$telefono')
WHERE idecliente = 'id'"; */


/* return redirect("mi-cuenta"); */

}

/* $resultado=mysqli_query($conexion, $consulta);
return $resultado; */


?>