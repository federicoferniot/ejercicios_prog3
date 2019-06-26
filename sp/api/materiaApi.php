<?php
require_once './clases/materia.php';

class MateriaApi extends Materia{
    public static function CargarUno($request, $response) {
        $ArrayDeParametros = $request->getParsedBody();
        $nombre= $ArrayDeParametros['nombre'];
        $cuatrimestre= $ArrayDeParametros['cuatrimestre'];
        $cupos= $ArrayDeParametros['cupos'];
        $materia = new Materia();
        $materia->nombre=$nombre;
        $materia->cuatrimestre=$cuatrimestre;
        $materia->cupos=$cupos;

        $id = $materia->InsertarUnaMateria();
        $respuesta = array("estado" => "Ok", "Mensaje" => "se guardo la materia");
        return $response->withJson($respuesta, 200);
    }

    public static function Inscribir($request, $response, $args){
        $ArrayDeParametros = $request->getParsedBody();
        $materia = Materia::TraerUnaMateriaPorId($args['idMateria']);
        $datos = $request->getHeaderLine('token');
        $payload = AutentificadorJWT::ObtenerPayload($datos);
        $legajo = $payload->legajo;
        if($materia){
            $materia->InscribirAlumno($legajo);
            $respuesta = array("estado" => "Ok", "Mensaje" => "se modifico la materia");
            return $response->withJson($respuesta, 200);
        }
    }

    public static function ObtenerMaterias($request, $response, $args){
        $ArrayDeParametros = $request->getParsedBody();
        switch($request->getAttribute('caso')){
            case 'admin':
                break;
            case 'alumno':
                break;
            case 'profesor':
                break;
        }
    }

    public static function ObtenerMateria($request, $response, $args){
        $ArrayDeParametros = $request->getParsedBody();
        $materia = Materia::TraerUnaMateriaPorId($args['id']);
        $datos = $request->getHeaderLine('token');
        $payload = AutentificadorJWT::ObtenerPayload($datos);
        switch($request->getAttribute('caso')){
            case 'admin':
                $respuesta = $materia->ObtenerAlumnos();
                break;
            case 'profesor':
                //if($materia->profesor == $payload->legajo){
                    $respuesta = $materia->ObtenerAlumnos();
                //}
                break;
        }
        return $response->withJson(array_values($respuesta), 200);
    }
}