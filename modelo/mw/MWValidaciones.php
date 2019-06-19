<?php
require_once './vendor/autoload.php';
require_once './jwt/AutentificadorJWT.php';
require_once './api/UsuarioApi.php';
require_once './clases/Usuario.php';

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
            return $e->getMessage();
        }
        return $response;
    }

    public static function ValidarDatosEntradaEmpleado($request, $response, $next){
        $ArrayDeParametros = $request->getParsedBody();
        if(isset($ArrayDeParametros['nombre']) && isset($ArrayDeParametros['usuario']) && isset($ArrayDeParametros['password']) && !(Usuario::TraerUnUsuario($ArrayDeParametros['usuario']))){
            $user_id = UsuarioApi::cargarUno($request, $response);
            return $next($request, $response);
        }
        return $response;
    }

    public static function ValidarPerfil($request, $response, $next){
        $datos = $request->getHeaderLine('token');
        if($datos['perfil'] == 'admin'){
            return $next($requset, $response);
        }
        return "Hola";
    }
}