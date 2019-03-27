<?php

include '/../clases/alumno.php';

$array_archivo = array();
$archivo = fopen("alumnos.csv", "r");

while(!feof($archivo)){
    $alumno_leido = trim(fgets($archivo));
    if($alumno_leido != ""){
        $array_alumno = explode(";", $alumno_leido);
        array_push($array_archivo, new Alumno($array_alumno[0], $array_alumno[1], $array_alumno[2], $array_alumno[3]));
    }
}
fclose($archivo);

foreach ($array_archivo as $alumno_csv){
    echo $alumno_csv->toCSV()."<br>";
}
