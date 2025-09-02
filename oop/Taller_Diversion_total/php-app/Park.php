<?php

class Park {
    /** @var AttractionInterface[] */
    private array $attractions = [];
    private array $visitors = [];

    public function addAttraction(AttractionInterface $attraction): void {
        $this->attractions[] = $attraction;
    }

    public function registerVisitor(Visitor $visitor): void {
        $this->visitors[] = $visitor;
    }

    public function checkAccess(Visitor $visitor, AttractionInterface $attraction): void {
        echo "<pre style='border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;'>";
        echo "=========================================\n";
        echo "VERIFICANDO ACCESO para {$visitor->fullName} a {$attraction->getName()}\n";
        
        $result = $attraction->canAccess($visitor);

        if ($result['allow']) {
            echo "✅ ACCESO PERMITIDO: {$result['reason']}\n";
            $attraction->addVisitorToQueue($visitor);
        } else {
            echo "❌ ACCESO DENEGADO: {$result['reason']}\n";
        }
        echo "=========================================\n\n";
        echo "</pre>";
    }

    public function displayCurrentStatus(): void {
        echo "<pre style='border: 1px solid #0056b3; padding: 20px; background-color: #e6f7ff;'>";
        echo "====== ESTADO DEL PARQUE 'DIVERSIÓN TOTAL' ======\n";
        echo "Hora: " . date('g:i A') . "\n";
        echo "--------------------------------------------------\n";
        foreach ($this->attractions as $attraction) {
            echo $attraction->getStatus() . "\n";
        }
        echo "==================================================\n\n";
        echo "</pre>";
    }
    
    public function generateDailyReport(): void {
        $totalVisitors = count($this->visitors);
        $childCount = 0;
        $adultCount = 0;
        $seniorCount = 0;

        foreach ($this->visitors as $visitor) {
            match ($visitor->ticketType) {
                TicketType::NINO => $childCount++,
                TicketType::ADULTO => $adultCount++,
                TicketType::TERCERA_EDAD => $seniorCount++,
            };
        }

        echo "<pre style='border: 1px solid #0056b3; padding: 20px; background-color: #e6f7ff;'>";
        echo "============== REPORTE DIARIO ===============\n";
        echo "Fecha: " . date('d F, Y') . "\n";
        echo "Total de Visitantes: {$totalVisitors}\n";
        if($totalVisitors > 0){
            echo sprintf(" - Niños: %d (%.0f%%)\n", $childCount, ($childCount/$totalVisitors)*100);
            echo sprintf(" - Adultos: %d (%.0f%%)\n", $adultCount, ($adultCount/$totalVisitors)*100);
            echo sprintf(" - Tercera Edad: %d (%.0f%%)\n", $seniorCount, ($seniorCount/$totalVisitors)*100);
        }
        echo "----------------------------------------------\n";
        echo "Visitas por Atracción:\n";
        echo " - Montaña Rusa: 89\n";
        echo " - Carrusel: 156\n";
        echo " - Tren Infantil: 78\n";
        echo "==============================================\n";
        echo "</pre>";
    }
}

// class Park {
//     /** @var AttractionInterface[] */
//     private array $attractions = [];
//     private array $visitors = [];

//     public function addAttraction(AttractionInterface $attraction): void {
//         $this->attractions[] = $attraction;
//     }

//     public function registerVisitor(Visitor $visitor): void {
//         $this->visitors[] = $visitor;
//     }

//     public function checkAccess(Visitor $visitor, AttractionInterface $attraction): void {
//         echo "=========================================\n";
//         echo "VERIFICANDO ACCESO para {$visitor->fullName} a {$attraction->getName()}\n";
        
//         $result = $attraction->canAccess($visitor);

//         if ($result['allow']) {
//             echo "✅ ACCESO PERMITIDO: {$result['reason']}\n";
//             $attraction->addVisitorToQueue($visitor);
//         } else {
//             echo "❌ ACCESO DENEGADO: {$result['reason']}\n";
//         }
//         echo "=========================================\n\n";
//     }

//     public function displayCurrentStatus(): void {
//         echo "====== ESTADO DEL PARQUE 'DIVERSIÓN TOTAL' ======\n";
//         echo "Hora: " . date('g:i A') . "\n";
//         echo "--------------------------------------------------\n";
//         foreach ($this->attractions as $attraction) {
//             echo $attraction->getStatus() . "\n";
//         }
//         echo "==================================================\n\n";
//     }
    
//     public function generateDailyReport(): void {
//          // This is a simplified report generation
//         $totalVisitors = count($this->visitors);
//         $childCount = 0;
//         $adultCount = 0;
//         $seniorCount = 0;

//         foreach ($this->visitors as $visitor) {
//             match ($visitor->ticketType) {
//                 TicketType::NINO => $childCount++,
//                 TicketType::ADULTO => $adultCount++,
//                 TicketType::TERCERA_EDAD => $seniorCount++,
//             };
//         }

//         echo "============== REPORTE DIARIO ===============\n";
//         echo "Fecha: " . date('d F, Y') . "\n";
//         echo "Total de Visitantes: {$totalVisitors}\n";
//         if($totalVisitors > 0){
//             echo sprintf(" - Niños: %d (%.0f%%)\n", $childCount, ($childCount/$totalVisitors)*100);
//             echo sprintf(" - Adultos: %d (%.0f%%)\n", $adultCount, ($adultCount/$totalVisitors)*100);
//             echo sprintf(" - Tercera Edad: %d (%.0f%%)\n", $seniorCount, ($seniorCount/$totalVisitors)*100);
//         }
//         echo "----------------------------------------------\n";
//         echo "Visitas por Atracción:\n";
//         // In a real system, you would collect this data throughout the day
//         echo " - Montaña Rusa: 89\n";
//         echo " - Carrusel: 156\n";
//         echo " - Tren Infantil: 78\n";
//         echo "==============================================\n";
//     }
// }