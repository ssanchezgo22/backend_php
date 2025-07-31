<?php

class CuentaBancaria{
    // Atributos
    private $numeroCuenta;
    private $saldo;
    private $propietario;

    // Constructor
    public function __construct($propietario, $saldo = 0){
        $this->numeroCuenta = 0; //Temporal
        $this->saldo = $saldo;
        $this->propietario = $propietario;
    }

    // Metodo Privado
    private function generarNumeroCuenta(){
        return "CTA-" .rand(10000, 99999);
    }

    //metodos
    public function depositar($monto){
        if ($monto <= 0) {
            echo "El monto debe ser positivo \n";
            return false;
        }

        $this->saldo += $monto;
        echo "Deposito exitoso. Saldo actual: {$this->saldo} \n";
        return true;
    }

    public function retirar($monto){
        if ($monto <= 0) {
            echo "El monto debe ser positivo \n";
            return false;
        }
        if ($this->saldo - $monto < 0) {
            echo "Saldo insuficiente. \n";
            return false;
        }
        $this->saldo -= $monto;
        echo "Retiro exitoso. Saldo actual: {$this->saldo} \n";
        return true; 
    }
    public function consultarSaldo(){
        return "El saldo de la cuenta es: " .$this->saldo;
    }

    public function obtenerDetalles(){
        return [
            "numeroCuenta" => $this->numeroCuenta,
            "saldo" => $this->saldo,
            "propietario" => $this->propietario
        ];
    }
}

$cuenta = new CuentaBancaria("Rodolfo", 1000);
$detalles = $cuenta->obtenerDetalles();

echo "Cuenta Numero: {$detalles['numeroCuenta']} \n";
echo "Propietario: {$detalles['propietario']} \n";
echo "Saldo: {$detalles['saldo']} \n";

$cuenta->depositar(500);
$cuenta->retirar(300);

echo $cuenta->consultarSaldo();

?>