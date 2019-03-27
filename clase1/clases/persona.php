<?php
include "humano.php";

class Persona extends Humano{
    public $dni;

    public function __construct($nombre, $apellido, $dni)
    {
        parent::__construct($nombre, $apellido);
        $this->dni = $dni;
    }
}