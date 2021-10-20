<?php
require_once 'Usuario.php';
require_once 'RepositorioEspecie.php';

class ControladorSesionEspecie
{
    protected $Especie = null;


    public function create($EspecieNombre, $EspecieDescripcion, $EspecieStock, $EspecieImporte)
    {
        $repo = new RepositorioEspecie();
        $Especie = new Especie($EspecieNombre, $EspecieDescripcion, $EspecieStock, $EspecieImporte);
        $id = $repo->save($Especie);
        if ($id === false) {
            return [ false, "Error al crear la Especie"];
        }
        else {
            $Especie->setId($id);
            return [ true, "Especie creada correctamente" ];
        }
    }
    
}
