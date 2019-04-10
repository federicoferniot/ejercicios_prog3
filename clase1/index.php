<?php
/*
$nombre = "Fede";
$legajo = 111;
$heroes = array("nombre"=>"Batman", "Superpoder"=>"Batimovil");
# $heroes = array(1,2,3,4);
# $heroes[]=22;
echo $nombre.$legajo; #concatenar con .
echo "<br>$nombre $legajo";
var_dump($heroes);
foreach($heroes as $clave=>$valor){
    echo "$clave _ $valor";
}
var_dump($_GET["nombre"]);
var_dump($_POST);
$lista_array = array(1,2,3,4,5,6,7,8,9,10);
shuffle($lista_array);
if($_GET["orden"]=="ascendente"){
    sort($lista_array);
}
elseif($_GET["orden"]=="descendente"){
    rsort($lista_array);
}
foreach($lista_array as $item){
    echo "$item<br>";
}
$persona = array("name"=>"pepe");
$personaO = (object)$persona;
var_dump($persona);
var_dump($personaO);
$personaO->name = "Fede";
$personaSTD = new stdClass();
$personaSTD->name="Fede";
var_dump($personaSTD);
?*/
/*
include "./clases/alumno.php";
$alumno = new Alumno($_POST["nombre"], $_POST["apellido"], $_POST["dni"], $_POST["legajo"]);
echo $alumno->toJson();
*/
/*
include "./clases/alumno.php";
$array_archivo = array();
$archivo = fopen("ejemplo.txt", "a");
fwrite($archivo, PHP_EOL);
fwrite($archivo, "ejemplo");
fclose($archivo);
$archivo = fopen("ejemplo.txt", "r");
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
*/

switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
        include "./acciones/GET.php";
        break;
    case "POST":
        include "./acciones/POST.php";
        break;
    case "DELETE":
        include "./acciones/DELETE.php";
        break;
    case "PUT":
        include "./acciones/PUT.php";
        break;
}