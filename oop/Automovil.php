<?php

class Automovil {
    // Atributos
    public $marca;
    public $modelo;
    public $color;
    public $velocidad = 0;

    // CONSTRUCTOR
    public function __construct($marca, $modelo, $color) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        echo "Se ha creado un {$this->marca}";
    }

    // Metodos
    public function arrancar(){
        echo "El automovil ha arrancado \n";
    }

    public function acelerar($incremento){
        if ($incremento <= 0) {
            echo "Error: El incremento debe ser positivo \n";
            return false;
        }
        $this->velocidad += $incremento;
        echo "Acelerando: Velocidad Actual={$this->velocidad}";
        return true;
    }

    public function frenar($decremento){
        if ($decremento <= 0) {
            echo "Error: El decremento debe ser positivo \n";
            return false;
        }
        if ($this->velocidad - $decremento <= 0) {
            $this->velocidad = 0;
        }else{
            $this->velocidad -= $decremento;
        }
        echo "Frenando: Velocidad actual={$this->velocidad}";
        return true;
    }
}

$automovil1 = new Automovil("Toyota","Corolla", "Azul");
$automovil1->arrancar();
$automovil1->acelerar(20);
$automovil1->acelerar(15);
$automovil1->frenar(5);


$automovil2 = new Automovil("Honda","Civic","Rojo");
$automovil2->arrancar();
$automovil2->acelerar(17);


print_r($automovil1);
print_r($automovil2);

?>