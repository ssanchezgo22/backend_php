<?php

Class Vehiculo {
    protected $marca;
    protected $modelo;
    Protected $anio;
    protected $encendido;

    public function __construct($marca, $modelo, $anio)
    {
        $this -> marca = $marca;
        $this -> modelo = $modelo;
        $this -> anios = $anios
        $this -> encendido = false;
    }

    public function encender() {
        $this -> encendido = true;
        echo " Encendido \n"
    }

    public function apagar() {
        $this -> encendido = false;
        echo " Apagado \n"
    }

    public function mostrarInfo() {
        return "({$this -> marca} {$this -> modelo} {$this -> anios})";
        
    }
}