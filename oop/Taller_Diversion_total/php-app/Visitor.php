<?php

// Using an Enum for ticket types for better code clarity and safety
enum TicketType: string {
    case NINO = 'Niño';
    case ADULTO = 'Adulto';
    case TERCERA_EDAD = 'Tercera Edad';
}

class Visitor {
    public readonly TicketType $ticketType;

    public function __construct(
        public readonly string $fullName,
        public readonly int $age,
        public readonly int $height,
        public readonly bool $isPregnant = false,
        public readonly bool $hasMedicalRestrictions = false
    ) {
        // Data Validation
        if (str_word_count($this->fullName) < 2) {
            throw new InvalidArgumentException("El nombre debe contener al menos 2 palabras.");
        }
        if ($this->age < 1 || $this->age > 120) {
            throw new InvalidArgumentException("La edad debe estar entre 1 y 120 años.");
        }
        if ($this->height < 60 || $this->height > 220) {
            throw new InvalidArgumentException("La altura debe estar entre 60 y 220 cm.");
        }

        // Automatic Ticket Classification
        if ($this->age < 12) {
            $this->ticketType = TicketType::NINO;
        } elseif ($this->age >= 12 && $this->age <= 64) {
            $this->ticketType = TicketType::ADULTO;
        } else {
            $this->ticketType = TicketType::TERCERA_EDAD;
        }
    }
}