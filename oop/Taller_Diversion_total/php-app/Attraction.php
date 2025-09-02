<?php

interface AttractionInterface {
    public function canAccess(Visitor $visitor): array;
    public function addVisitorToQueue(Visitor $visitor): void;
    public function getStatus(): string;
    public function getWaitTime(): int;
    public function getName(): string;
}

abstract class AbstractAttraction implements AttractionInterface {
    protected array $visitorsInQueue = [];
    protected int $currentOccupants = 0;
    protected int $totalVisitsToday = 0;

    public function __construct(
        protected string $name,
        protected int $capacity,
        protected int $durationMinutes
    ) {}

    // Abstract method: must be implemented by child classes
    abstract public function canAccess(Visitor $visitor): array;

    public function addVisitorToQueue(Visitor $visitor): void {
        // For simulation, we assume if they can access, they use it
        $accessResult = $this->canAccess($visitor);
        if ($accessResult['allow']) {
            $this->totalVisitsToday++;
            // Here you would manage the queue and occupants in a real system
        }
    }
    
    public function getName(): string {
        return $this->name;
    }

    public function getWaitTime(): int {
        $queueCount = count($this->visitorsInQueue);
        if ($queueCount === 0) {
            return 0;
        }
        $cyclesToWait = floor($queueCount / $this->capacity);
        return $cyclesToWait * $this->durationMinutes;
    }

    public function getStatus(): string {
        return sprintf(
            "%-15s | Ocupantes: %d/%d | En Cola: %d | Espera: %d min | Visitas Hoy: %d",
            $this->name,
            $this->currentOccupants,
            $this->capacity,
            count($this->visitorsInQueue),
            $this->getWaitTime(),
            $this->totalVisitsToday
        );
    }
}