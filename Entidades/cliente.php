<?php

class Cliente
{
    private $idcliente;
    private $dni;
    private $nombre;
    private $apellido;
    private $fk_idgenero;
    private $telefono;

    private $tipo_genero;
    
   

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
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
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
                    '$this->fk_idgenero',
                    '$this->telefono'
                );";
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idcliente = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE clientes SET
                dni = '" . $this->dni . "',
                nombre = '" . $this->nombre . "',
                apellido = '" . $this->apellido . "',
                fk_idgenero =  '" . $this->fk_idgenero . "',
                telefono = '" . $this->telefono . "'
                WHERE idcliente = " . $this->idcliente;

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM clientes WHERE idcliente = " . $this->idcliente;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idcliente,
                        dni,
                        nombre,
                        apellido,
                        fk_idgenero,
                        telefono
                FROM clientes
                WHERE idcliente = $this->idcliente";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idcliente = $fila["idcliente"];
            $this->dni = $fila["dni"];
            $this->nombre = $fila["nombre"];
            $this->apellido = $fila["apellido"];
            $this->fk_idgenero = $fila["fk_idgenero"];
            $this->telefono = $fila["telefono"];
            
        }
        $mysqli->close();

    }
    public function obtenerPorDni()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idcliente,
                        dni,
                        nombre,
                        apellido,
                        fk_idgenero,
                        telefono
                FROM clientes
                WHERE dni = $this->dni";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idcliente = $fila["idcliente"];
            $this->dni = $fila["dni"];
            $this->nombre = $fila["nombre"];
            $this->apellido = $fila["apellido"];
            $this->fk_idgenero = $fila["fk_idgenero"];
            $this->telefono = $fila["telefono"];
            
        }
        $mysqli->close();

    }

     public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
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
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

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