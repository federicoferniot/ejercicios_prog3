<?php
require_once './clases/usuario.php';

class UsuarioApi extends Usuario{
    public static function CargarUno($request, $response) {
        $ArrayDeParametros = $request->getParsedBody();
        $nombre= $ArrayDeParametros['nombre'];
        $clave= $ArrayDeParametros['clave'];
        $sexo= $ArrayDeParametros['sexo'];
        $usuario = new Usuario();
        $usuario->nombre=$nombre;
        $usuario->clave=$clave;
        $usuario->sexo=$sexo;
        if(!isset($ArrayDeParametros['perfil'])){
            $usuario->perfil='usuario';
        }else{
            $usuario->perfil=$ArrayDeParametros['perfil'];
        }

        $usuario->InsertarUsuario();
        
        $response->getBody()->write("se guardo el usuario");
        return $response;
    }

    public function TraerUno($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        $username= $args['usuario'];
        $usuario=Usuario::TraerUnUsuario($username);
        $newResponse = $response->withJson($usuario, 200);  
        return $newResponse;
    }

    public function TraerTodos($request, $response, $args) {
        $todosLosUsuarios=Usuario::TraerTodoLosUsuarios();
        $newResponse = $response->withJson($todosLosUsuarios, 200);  
        return $newResponse;
    }

    public function Login($request, $response, $args){
        $ArrayDeParametros = $request->getParsedBody();
        $usuario = Usuario::TraerUnUsuario($ArrayDeParametros['nombre']);
        if($usuario){
            if(hash('sha512', $ArrayDeParametros['clave'].$ArrayDeParametros['nombre']) == $usuario->clave && $ArrayDeParametros['sexo']==$usuario->sexo){
                $token = AutentificadorJWT::CrearToken($usuario->nombre, $usuario->perfil);
                $respuesta = array("estado" => "Ok", "token" => $token);
            }else{
                if($ArrayDeParametros['sexo']==$usuario->sexo){
                    $response->getBody()->write('Contraseña incorrecta');
                }else{
                    $response->getBody()->write('Sexo incorrecto');
                }
            }
        }else{
            $response->getBody()->write('Usuario incorrecto');
        }
        return $response->withJson($respuesta, 200);
    }
}