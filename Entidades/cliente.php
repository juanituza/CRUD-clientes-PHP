<?php

require_once("config.php");




class Cliente extends Config
{
    private $idcliente;
    private $dni;
    private $nombre;
    private $apellido;
    private $fk_idgenero;
    private $telefono;
    private $tipo_genero;

    private $resultado;
    

    public function __construct(){
        
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

    public function cargarFormulario($request)
    {
        $this->idcliente = isset($request["id"]) ? $request["id"] : "";
        $this->dni = isset($request["txtDni"]) ? $request["txtDni"] : "";
        $this->nombre = isset($request["txtNombre"]) ? $request["txtNombre"] : "";
        $this->apellido = isset($request["txtApellido"]) ? $request["txtApellido"] : "";
        $this->fk_idgenero = isset($request["lstGenero"]) ? $request["lstGenero"] : "";
        $this->telefono = isset($request["txtTelefono"]) ? $request["txtTelefono"] : "";
       
    }

    public function insertar()
    {
        $conex = new Config();
        $conexion = $conex->conectar();
        //Arma la query
        $sql = "INSERT INTO clientes (
                    dni,
                    nombre,
                    apellido,
                    fk_idgenero,
                    telefono
                ) VALUES (
                    '$this->dni',
                    '$this->nombre',
                    '$this->apellido',
                    $this->fk_idgenero,
                    '$this->telefono'
                );";
        $sql_verificar= "SELECT * FROM clientes 
                        WHERE dni='$this->dni'";
        $verificar_dni=mysqli_query($conexion, $sql_verificar);
        if (mysqli_num_rows($verificar_dni)>0) {
            echo '
            <script>
            
            alert("Este DNI ya está registrado, intenta con otro diferente");
            window.location = "cliente-listar.php";
            </script>
            ';
            exit();
            
        }
        return $resultado=mysqli_query($conexion,$sql) ;


        if ($resultado) {
            echo 'Correcto';
        } else {
            echo 'Ocurrio un error al guardar los datos';
        }

        
           
  
        $this->idcliente = $conexion->insert_id;
        mysqli_close($conexion);
    }

    public function actualizar()
    {
        $conex = new Config();
        $conexion = $conex->conectar();
        $sql = "UPDATE clientes SET
                nombre = '" . $this->nombre . "',
                cuit = '" . $this->cuit . "',
                telefono = '" . $this->telefono . "',
                correo = '" . $this->correo . "',
                fecha_nac =  '" . $this->fecha_nac . "',
                fk_idprovincia =  '" . $this->fk_idprovincia . "',
                fk_idlocalidad =  '" . $this->fk_idlocalidad . "',
                domicilio =  '" . $this->domicilio . "'
                WHERE idcliente = " . $this->idcliente;

        return $resultado = mysqli_query($conexion, $sql) or die("Error");
        if (!$resultado) {
            die('error');
        }
        mysqli_close($conexion);

    }

    public function eliminar()
    {
        $conex = new Config();
        $conexion = $conex->conectar();
        $sql = "DELETE FROM clientes WHERE idcliente = " . $this->idcliente;
        //Ejecuta la query
        return $resultado = mysqli_query($conexion, $sql) or die("Error");
        mysqli_close($conexion);
    }

     public function obtenerPorId()
    {
        $conex = new Config();
        $conexion = $conex->conectar();
        

        $sql = "SELECT idcliente,
                        dni,
                        nombre,
                        apellido,
                        fk_idgenero,
                        telefono
                FROM clientes
                WHERE idcliente = $this->idcliente";
         $resultado = mysqli_query($conexion, $sql);
         
         //Convierte el resultado en un array asociativo
         if ($fila = $resultado->fetch_assoc()) {
             $this->idcliente = $fila["idcliente"];
             $this->dni = $fila["dni"];
             $this->nombre = $fila["nombre"];
             $this->apellido = $fila["apellido"];
             $this->fk_idgenero = $fila["fk_idgenero"];
             $this->telefono = $fila["telefono"];
             
            }
        mysqli_close($conexion);
        

    }

     public function obtenerTodos(){
        $conex = new Config();
        $conexion = $conex->conectar();
        
        $sql = "SELECT 
                    A.idcliente,
                    A.dni,
                    A.nombre,
                    A.apellido,
                    A.fk_idgenero,
                    B.tipo as tipo_genero,
                    A.telefono
                FROM clientes A
                INNER JOIN generos B ON A.fk_idgenero = B.idgenero";
        $resultado = mysqli_query($conexion, $sql) or die("Error al ingresar los registros");

        $aResultado = array();
        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Cliente();
                $entidadAux->idcliente = $fila["idcliente"];
                $entidadAux->dni = $fila["dni"];
                $entidadAux->nombre = $fila["nombre"];
                $entidadAux->apellido = $fila["apellido"];
                $entidadAux->fk_idgenero = $fila["fk_idgenero"];
                $entidadAux->tipo_genero = $fila["tipo_genero"];
                $entidadAux->telefono = $fila["telefono"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }

}
?>