<?php
include "persona.php";


class Alumno extends Persona{
    public $legajo;

    public function __construct($nombre, $apellido, $dni, $legajo){
        parent::__construct($nombre, $apellido, $dni);
        $this->legajo = $legajo;
    }
}