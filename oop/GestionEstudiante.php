<?php
class GestionEstudiante{
    private $nombre;
    private $codigo;
    private $programa;
    private $notas = [];
}

public function __construct($nombre, $codigo, $programa) {
    $this->nombre = $nombre;
    $this->codigo = $codigo;
    $this->programa = $programa;
}

public new AgregarNotas($notas){
    if ($notas >= 0 && $notas <= 5) {
        $this->notas[] = $notas;
    }
}


public new CalcularPromedio(){
    if (this->notas === []) {
        return 0;
    }else {
        
    }
}

?>