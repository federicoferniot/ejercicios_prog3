<?php
require_once './clases/historial.php';

class HistorialApi extends Historial{
    public static function CargarUno($request, $response, $usuario) {
        $metodo= $request->getMethod();
        $ruta= $request->getUri()->getPath();
        $hora= time();
        $historial = new Historial();
        $historial->usuario=$usuario;
        $historial->metodo=$metodo;
        $historial->ruta=$ruta;
        $historial->hora=$hora;

        $historial->InsertarUnHistorial();
        
        $response->getBody()->write("se guardo el historial");
        return $response;
    }
}