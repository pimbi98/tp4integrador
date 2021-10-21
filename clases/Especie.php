<?php
class Especie
{
    protected $EspecieId;
    Protected $EspecieNombre;
    protected $EspecieDescripcion;
    protected $EspecieStock;
    protected $EspecieImporte;

    public function __construct($EspecieNombre, $EspecieDescripcion, $EspecieStock, $EspecieImporte, $id = null)
    {
        $this->EspecieID = $id;
        $this->EspecieNombre = $EspecieNombre;
        $this->EspecieDescripcion = $EspecieDescripcion;
        $this->EspecieStock = $EspecieStock;
        $this->EspecieImporte = $EspecieImporte;
    }

    public function getId() {return $this->EspecieID;}
    public function setId($id) {$this->EspecieID = $id;}
    public function getNombre() {return $this->EspecieNombre;}
    public function getDescripcion() {return $this->EspecieDescripcion;}
    public function getStock() {return $this->EspecieStock;}
    public function getImporte() {return $this->EspecieImporte;}
}





