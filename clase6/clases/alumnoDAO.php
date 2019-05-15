<?php

include "AccesoDatos.php";

class AlumnoDAO{

    public static function cargar_alumno($alumno){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO alumno (nombre, apellido, dni)"
                                                    . "VALUES(:nombre, :apellido, :dni)");
        
        $consulta->bindValue(':nombre', $alumno->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $alumno->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':dni', $alumno->dni, PDO::PARAM_STR);

        $consulta->execute();   
    }

    public static function modificar_alumno($alumno){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE alumno SET nombre = :nombre, apellido = :apellido, 
                                                        dni = :dni WHERE legajo = :legajo");
        
        $consulta->bindValue(':legajo', (int)($alumno->legajo), PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $alumno->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $alumno->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':dni', $alumno->dni, PDO::PARAM_STR);

        return $consulta->execute();

    }

    public static function eliminar_alumno($legajo){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM alumno WHERE legajo = :legajo");
        
        $consulta->bindValue(':legajo', (int)($legajo), PDO::PARAM_INT);

        return $consulta->execute();
    }
}