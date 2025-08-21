<?php
include_once("vehiculo.php");

Class Automovil extends Vehiculo {
    private $puerta;
    private $tipo;

    public function __construct($marca, $modelo, $anio, $puertas, $tipos){
        parent::__construct($marca, $modelo, $anio, $puerta, $tipo);
        $this -> puertas = $puertas;
        $this -> tipo = $tipo;
    }

    public function mostrarInfo(){
        $infoBase = parent::mostrarInfo();
        return "{infoBase} - Automovil {$this -> tipo} de {$this -> puertas} puertas";
        
    }

}



$auto = new Automovil();