<?php

include "/../clases/alumno.php";

$alumno = new Alumno($_POST["nombre"], $_POST["apellido"], $_POST["dni"], $_POST["legajo"]);

$archivo = fopen("data/alumnos.json", "a");
fwrite($archivo, $alumno->toJson());
fwrite($archivo, PHP_EOL);

fclose($archivo);
