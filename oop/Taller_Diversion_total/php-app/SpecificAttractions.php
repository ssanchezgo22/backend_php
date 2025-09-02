<?php

class MontañaRusa extends AbstractAttraction {
    public function canAccess(Visitor $visitor): array {
        if ($visitor->isPregnant) {
            return ['allow' => false, 'reason' => 'No permitido para personas embarazadas.'];
        }
        if ($visitor->age < 12) {
            return ['allow' => false, 'reason' => 'Edad insuficiente (mínimo 12 años).'];
        }
        if ($visitor->height < 140) {
            return ['allow' => false, 'reason' => 'Altura insuficiente (mínimo 140cm).'];
        }
        return ['allow' => true, 'reason' => 'Acceso permitido.'];
    }
}

class Carrusel extends AbstractAttraction {
    public function canAccess(Visitor $visitor): array {
        if ($visitor->age < 8) {
            return ['allow' => false, 'reason' => 'Debe ir acompañado de un adulto.'];
        }
        return ['allow' => true, 'reason' => 'Acceso permitido.'];
    }
}

class TrenInfantil extends AbstractAttraction {
    public function canAccess(Visitor $visitor): array {
        if ($visitor->age < 3 || $visitor->age > 10) {
            return ['allow' => false, 'reason' => 'Edad fuera del rango permitido (3-10 años).'];
        }
        if ($visitor->age < 6) {
             return ['allow' => false, 'reason' => 'Debe estar acompañado por un adulto.'];
        }
        return ['allow' => true, 'reason' => 'Acceso permitido.'];
    }
}