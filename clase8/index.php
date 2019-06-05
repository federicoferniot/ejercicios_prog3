<?php
require 'vendor/autoload.php';

// instantiate the App object
$app = new \Slim\App();

// Add route callbacks
$app->group('/productos', function(){
    $this->get('[/]', function ($request, $response, $args) {
        return $response->withStatus(200)->write('Lista productos');
    });
    
    $this->get('/{id}', function ($request, $response, $args) {
        return $response->withStatus(200)->write('Producto con ID:'.$args['id']);
    });
    
    $this->post('/{nombre}', function ($request, $response, $args) {
        return $response->withStatus(200)->write('Producto '.$args['nombre'].' dado de alta');
    });
    
    $this->put('/{id}', function ($request, $response, $args) {
        return $response->withStatus(200)->write('Producto '.$args['id'].' modificado');
    });
    
    $this->delete('/{id}', function ($request, $response, $args) {
        return $response->withStatus(200)->write('Producto '.$args['id'].' eliminado');
    });
});

// Run application
$app->run();