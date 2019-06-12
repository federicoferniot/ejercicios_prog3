<?php
namespace Firebase\JWT;
require 'vendor/autoload.php';

// instantiate the App object
$app = new \Slim\App();

$middleware1 = function($request, $response, $next){
    $datos = $request->getHeaderLine('token');// devuelve clave de token
    //$datos = $request->getHeaders(); //devuelve array con claves HTTP_...
    //$datos = $request->getHeader('token'); //devuelve array con clave de token
    //$token = $datos['token'];
    try {
        $decodificado = JWT::decode($datos, "miclave", ['HS256']);
        $response->getBody()->write("OK");
    }
    catch(Exception $e) {
        $response->getBody()->write("Acceso denegado");
    }
    $response = $next($request, $response);
};

// Add route callbacks
$app->group('/usuario', function(){
    $this->get('[/]', function ($request, $response, $args) {
        return $response->withStatus(200)->write('Lista productos');
    });
    
    $this->post('/login', function ($request, $response, $args) {
        $datos = $request->getParsedBody();
        $ahora = time();

        $payload = array(
            'app' => 'prueba'
        );
        $token = JWT::encode($payload, "miclave");

        return $response->withJson($token, 200);
    });
	
    $this->post('/verificar', function ($request, $response, $args) {
        return $response;
    })->add($middleware1);

});

// Run application
$app->run();