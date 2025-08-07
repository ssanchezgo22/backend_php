<?php
include_once("Estudiantes.php");
include_once("profesor.php");

class Aula{
    private $numeroAula;
    private $estudiante = [];
    private $profesor;

    public funcion __construct($numeroAula){
        $this->numeroAula = $numeroAula;
    }

    public function agregarEstudiante($estudiante){
        $this->estudiante[] = $estudiante;
    }

    
}

$estudiante = new Estudiante("Ana garcia", 101);

$profesor = new Profesor("Juan Martinez", "math")


