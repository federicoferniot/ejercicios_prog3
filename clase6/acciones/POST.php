<?php

include "/../clases/alumno.php";
switch($_POST["caso"]){
    case "alta":
        $alumno = new Alumno($_POST["nombre"], $_POST["apellido"], $_POST["dni"]);
        $alumno->guardar();
        break;

    case "baja":
        Alumno::eliminar($_POST["legajo"]);
        break;

    case "modificar":
        $alumno = new Alumno($_POST["nombre"], $_POST["apellido"], $_POST["dni"], $_POST["legajo"]);
        $alumno->modificar();
        break;
}

