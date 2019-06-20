<?php
require_once './vendor/autoload.php';
require_once './jwt/AutentificadorJWT.php';
require_once './api/historialApi.php';

class MWValidaciones{
    public static function ValidarCredenciales($request, $response, $next){
        $ArrayDeParametros = $request->getParsedBody();
        if(isset($ArrayDeParametros['nombre']) && isset($ArrayDeParametros['clave']) && isset($ArrayDeParametros['sexo'])){
            return $next($request, $response);
        }
        return $response;
    }

    public static function ValidarToken($request, $response, $next){
        $datos = $request->getHeaderLine('token');
        try{
            AutentificadorJWT::VerificarToken($datos);
            return $next($request, $response);
        } catch(Exception $e){
            $response->getBody()->write($e->getMessage());
        }
        return $response;
    }

    public static function ValidarPerfil($request, $response, $next){
        $token = $request->getHeaderLine('token');
        $datos = AutentificadorJWT::ObtenerPayload($token);
        if($datos->perfil == 'admin'){
            return $next($request, $response);
        }
        $response->getBody()->write("Hola");
        return $response;
    }

    public static function RegistrarAccion($request, $response, $next){
        $respuesta = $next($request, $response);
        if($request->hasHeader('token')){
            $token = $request->getHeaderLine('token');
            $datos = AutentificadorJWT::ObtenerPayload($token);
            $usuario = $datos->nombre;
        }else{
            $ArrayDeParametros = $request->getParsedBody();
            $usuario = $ArrayDeParametros['nombre'];
        }
        HistorialApi::CargarUno($request, $response, $usuario);
        return $respuesta;
    }
}