<?php
class Historial{
    public $id;
    public $usuario;
    public $metodo;
    public $ruta;
    public $hora;

    public function InsertarUnHistorial(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into historial (usuario, metodo, ruta, hora)values(:usuario, :metodo, :ruta, now())");
        $consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
        $consulta->bindValue(':metodo', $this->metodo);
        $consulta->bindValue(':ruta', $this->ruta);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

}