<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once './vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './api/usuarioApi.php';
require_once './api/compraApi.php';
require_once './mw/MWValidaciones.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).
  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/
$app = new \Slim\App(["settings" => $config]);
/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
$app->group('/login', function(){
  $this->post('[/]', \UsuarioApi::class . ':Login')->add(\MWValidaciones::class . ':ValidarCredenciales');
})->add(\MWValidaciones::class . ':RegistrarAccion');
$app->group('/usuario', function () {
  $this->get('[/]', \UsuarioApi::class . ':TraerTodos')->add(\MWValidaciones::class . ':ValidarPerfil')->add(\MWValidaciones::class . ':ValidarToken');
  $this->post('[/]', \UsuarioApi::class . ':CargarUno');
})->add(\MWValidaciones::class . ':RegistrarAccion');
$app->group('/compra', function(){
  $this->post('[/]', \CompraApi::class . ':CargarUno')->add(\MWValidaciones::class . ':ValidarToken');
  $this->get('[/]', \CompraApi::class . ':TraerTodos');
})->add(\MWValidaciones::class . ':RegistrarAccion')->add(\MWValidaciones::class . ':ValidarToken');
$app->run();