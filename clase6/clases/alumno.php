<?php
include "persona.php";
include "alumnoDAO.php";

class Alumno extends Persona{
    public function __construct($nombre, $apellido, $dni, $legajo=false){
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

    public function guardar(){
        AlumnoDAO::cargar_alumno($this);
    }

    public function modificar(){
        AlumnoDAO::modificar_alumno($this);
    }

    public static function eliminar($legajo){
        AlumnoDAO::eliminar_alumno($legajo);
    }
}