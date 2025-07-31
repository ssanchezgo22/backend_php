<?php
class Estudiante{
    public $nombre;
    public $codigo;
    public $programa;
    public $notas = [];
    
    public function __construct($nombre, $codigo, $programa) {
        $this->nombre =$nombre;
        $this->codigo =$codigo = $this->GenerarCodigo();
        $this->programa =$programa;
        
    }
    public function AgregarNotas($notas){
    if ($notas >= 0 && $notas <= 5) {
        $this->notas[] = $notas;
    }

    private function GenerarCodigo(): string{
        return "000".rand(min:100000,max:999999)
    }
    public function obtenerDetalles(){
        return [
            "nombre" => $this->nombre,
            "codigo" => $this->codigo,
            "programa" => $this->programa
            "notas"=> $this->notas
        ];
    }

}

$estudiante = new Estudiante("sebastian"," ","Adso");
$detalles = $estudiante->obtenerDetalles();
echo "Codigo: {$detalles['codigo']} \n";
echo "nombre: {$detalles['nombre']} \n";
echo "programa: {$detalles['programa']} \n"; 
$estudiante->AgregarNotas(5);
?>