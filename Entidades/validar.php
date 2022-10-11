<?php
  require_once("config.php");
  include_once("cliente.php");

$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);
  
  
  
$conex = new Config();
$conexion = $conex->conectar();
if(isset($_POST)){
   
      if (strlen($_POST['dni']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 
      && strlen($_POST['genero']) >= 1 && strlen($_POST['telefono']) >= 1) {
          $dni = trim($_POST['dni']);
          $nombre = trim($_POST['nombre']);
          $apellido = trim($_POST['apellido']);
          $genero = trim($_POST['genero']);
          $telefono= trim($_POST['telefono']);

        
    
      
        $consulta = "INSERT INTO clientes (dni, nombre, apellido, fk_idgenero, telefono)
        VALUES ('$dni', '$nombre', '$apellido', '$genero', '$telefono')";

          $sql_verificar= "SELECT * FROM clientes 
                          WHERE dni='$dni'";
          $verificar_dni=mysqli_query($conexion, $sql_verificar);
          if (mysqli_num_rows($verificar_dni)>0) {
            echo 'Este DNI ya está registrado, intenta con otro diferente';
            exit();
            
          }
          
        $resultado=mysqli_query($conexion, $consulta);
      if ($resultado) {
        echo 'Correcto';
      } else {
        echo 'Ocurrio un error al guardar los datos';
      }
    
        
    }else{
        echo 'No data';
    }
  }

?>