<?php
class Compra{
    public $id;
    public $articulo;
    public $fecha;
    public $precio;
    public $usuario;

    public function InsertarUnaCompra(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into compra (articulo, fecha, precio, usuario)values(:articulo, :fecha, :precio, :usuario)");
        $consulta->bindValue(':articulo', $this->articulo, PDO::PARAM_STR);
        $consulta->bindValue(':fecha', $this->fecha);
        $consulta->bindValue(':precio', $this->precio);
        $consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
        $consulta->execute();
        $this->id=$objetoAccesoDato->RetornarUltimoIdInsertado();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public static function TraerTodasLasCompras($usuario=null){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        if($usuario){
            $consulta =$objetoAccesoDato->RetornarConsulta("select id as id,articulo as articulo, fecha as fecha, precio as precio, usuario as usuario from compra where usuario=:usuario");
            $consulta->bindValue(':usuario', $usuario);
        }else{
            $consulta =$objetoAccesoDato->RetornarConsulta("select id as id,articulo as articulo, fecha as fecha, precio as precio, usuario as usuario from compra");
        }
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Compra");
    }
}