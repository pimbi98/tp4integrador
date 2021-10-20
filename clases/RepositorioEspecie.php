<?php
require_once '.env.php';
require_once 'Especie.php';

class RepositorioEspecie
{
    private static $conexion = null;

    public function __construct()
    {
        if (is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion = new mysqli(   $credenciales['servidor'],
                                            $credenciales['usuario'],
                                            $credenciales['clave'],
                                            $credenciales['base_de_datos']);
            if(self::$conexion->connect_error) {
                $error = 'Error de conexión: '.self::$conexion->connect_error;
                self::$conexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8'); 
        }
    }



    public function save(Especie $especie)
    {
        $q = "INSERT INTO especies (EspecieNombre, EspecieDescripcion, EspecieStock, EspecieImporte) ";
        $q.= "VALUES (?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $query->bind_param("ssii", $especie->getNombre(), $especie->getDescripcion(),
            $especie->getStock(), $especie->getImporte());

        if ( $query->execute() ) {
            // Retornamos ultimo id de especie
            return self::$conexion->insert_id;
        }
        else {
            return false;
        }
    } 

        public function read(){
            $q = "SELECT EspecieID, EspecieNombre, EspecieDescripcion, EspecieStock, EspecieImporte FROM ejemplo.especies;";
                $query = self::$conexion->prepare($q);
                //no seteo parametros ya que es una consulta GENERAL. Debe traer todos las especies.
                if ($query->execute()) {
                    $resultados = $query->get_result();
                    $arrayResultados = $resultados->fetch_all();
                    return $arrayResultados;
                } else {
                    return false;
                }      
            }
        public function update(Especie $Especie){
            $q = "UPDATE especies set EspecieNombre = ?, EspecieDescripcion = ?, EspecieStock = ?, EspecieImporte = ? WHERE EspecieID = ?;";
            $query = self::$conexion->prepare($q);
            $query->bind_param("ssiii", $Especie->getNombre(), $Especie->getDescripcion(), $Especie->getStock(), $Especie->getImporte(), $Especie->getId());
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }  
        }

        public function delete($EspecieID){
            $q = "DELETE FROM especies where EspecieID = ?";
            $query = self::$conexion->prepare($q);
            $query->bind_param("i", $EspecieID);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }  
        }
}

    
