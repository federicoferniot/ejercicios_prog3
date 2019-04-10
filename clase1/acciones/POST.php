<?php

include "/../clases/alumno.php";
$alumno = new Alumno($_POST["nombre"], $_POST["apellido"], $_POST["dni"], $_POST["legajo"]);
$archivo = fopen("data/alumnos.csv", "a");
fwrite($archivo, $alumno->toCSV());
fwrite($archivo, PHP_EOL);
fclose($archivo);

$origen = $_FILES["imagen"]["tmp_name"];
$array_nombre_archivo = explode(".", $_FILES["imagen"]["name"]);
$nombre_archivo = ($alumno->apellido).".".($alumno->legajo).".";
$nombre_archivo .= $array_nombre_archivo[sizeof($array_nombre_archivo)-1];
$destino = "data/imagenes/".$nombre_archivo;

if(file_exists($destino)){
    copy($destino, "data/imagenes/backup/".$nombre_archivo);
}

move_uploaded_file($origen, $destino);
$im = imagecreatefromjpeg($destino);
#Crea marca de agua
$estampa = imagecreatetruecolor(100, 70);
imagefilledrectangle($estampa, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($estampa, 9, 9, 90, 60, 0xFFFFFF);
imagestring($estampa, 5, 20, 20, 'FF', 0x0000FF);
$margen_dcho = 10;
$margen_inf = 10;
$sx = imagesx($estampa);
$sy = imagesy($estampa);

imagecopymerge($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa), 50);
imagepng($im, $destino);
imagedestroy($im);