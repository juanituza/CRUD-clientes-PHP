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
        $conex = new Config();
        $conexion = $conex->conectar();
        $sql = "SELECT idgenero,
                       tipo                        
                FROM generos
                WHERE idgenero = " . $this->idgenero;
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        $resultado = mysqli_query($conexion, $sql) or die("Error al ingresar los registros");
    }

    public function obtenerTodos()
    {
        $conex = new Config();
        $conexion = $conex->conectar();
        $sql = "SELECT 
                    idgenero,
                    tipo
                FROM generos";
        $resultado = mysqli_query($conexion, $sql) or die("Error al ingresar los registros");

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
