<?php

class Humano{
    public $nombre;
    public $apellido;

    public function __construct($nombre, $apellido){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function toJson(){
        return json_encode($this);
    }
}