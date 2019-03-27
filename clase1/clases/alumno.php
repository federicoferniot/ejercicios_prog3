<?php
include "persona.php";


class Alumno extends Persona{
    public $legajo;

    public function __construct($nombre, $apellido, $dni, $legajo){
        parent::__construct($nombre, $apellido, $dni);
        $this->legajo = $legajo;
    }

    public function toCSV(){
        $alumno = ($this->nombre).";";
        $alumno .= ($this->apellido).";";
        $alumno .= ($this->dni).";";
        $alumno .= ($this->legajo).";";
        return $alumno;
    }
}