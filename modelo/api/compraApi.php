<?php
require_once './clases/compra.php';


class CompraApi extends Compra{
    public static $destino = "./IMGCompras/";

    public static function CargarUno($request, $response) {
        $token = $request->getHeaderLine('token');
        $datos = AutentificadorJWT::ObtenerPayload($token);
        $ArrayDeParametros = $request->getParsedBody();
        $uploadedFiles = $request->getUploadedFiles();
        $uploadedFile = $uploadedFiles['foto'];
        $array_nombre_archivo = explode(".", $uploadedFile->getClientFileName());

        $articulo= $ArrayDeParametros['articulo'];
        $precio= $ArrayDeParametros['precio'];
        $fecha= date('Y/m/d h:i:s a');
        $compra = new Compra();
        $compra->articulo=$articulo;
        $compra->precio=$precio;
        $compra->fecha=$fecha;
        $compra->usuario=$datos->nombre;

        $compra->InsertarUnaCompra();

        $nombre_archivo = ($compra->id).".".($compra->articulo).".";
        $nombre_archivo .= $array_nombre_archivo[sizeof($array_nombre_archivo)-1];

        $uploadedFile->moveTo(CompraApi::$destino.$nombre_archivo);
        
        $response->getBody()->write("se guardo la compra");
        return $response;
    }

    public function TraerTodos($request, $response, $args) {
        $token = $request->getHeaderLine('token');
        $datos = AutentificadorJWT::ObtenerPayload($token);
        if($datos->perfil == 'admin'){
            $todasLasCompras=Compra::TraerTodasLasCompras();
        }else{
            $todasLasCompras=Compra::TraerTodasLasCompras($datos->nombre);
        }
        $newResponse = $response->withJson($todasLasCompras, 200);
        return $newResponse;
    }
}