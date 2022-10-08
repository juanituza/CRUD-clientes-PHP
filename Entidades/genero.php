<?php


class Genero
{
    private $idgenero;
    private $tipo;
  


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
        $this->idgenero = isset($request["id"]) ? $request["id"] : "";
        $this->tipo = isset($request["txtTipo"]) ? $request["txtTipo"] : "";
    }

    

    

    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idgenero,
                       tipo                        
                FROM generos
                WHERE idgenero = " . $this->idgenero;
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            //$this->idtipoproducto = $fila["idtipoproducto"];
            $this->tipo = $fila["tipo"];
        }
        $mysqli->close();
    }

    public function obtenerTodos()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                    idgenero,
                    tipo
                FROM generos";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if ($resultado) {
            //Convierte el resultado en un array asociativo

            while ($fila = $resultado->fetch_assoc()) {
                $entidadAux = new Genero();
                $entidadAux->idgenero = $fila["idgenero"];
                $entidadAux->tipo = $fila["tipo"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }
}
