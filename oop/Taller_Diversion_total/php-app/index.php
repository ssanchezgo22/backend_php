<?php

// Include all class files
require_once 'Visitor.php';
require_once 'Attraction.php';
require_once 'SpecificAttractions.php';
require_once 'Park.php';

// 1. Setup the Park and its Attractions
$park = new Park();

$montanaRusa = new MontañaRusa("Montaña Rusa", 20, 5);
$carrusel = new Carrusel("Carrusel", 30, 4);
$trenInfantil = new TrenInfantil("Tren Infantil", 15, 3);

$park->addAttraction($montanaRusa);
$park->addAttraction($carrusel);
$park->addAttraction($trenInfantil);


// 2. Register Visitors from "Caso 1: Familia García"
$pablo = new Visitor("Pablo García", 35, 175);
$ana = new Visitor("Ana García", 32, 160, isPregnant: true);
$luis = new Visitor("Luis García", 9, 130);
$maria = new Visitor("María García", 5, 105);

$park->registerVisitor($pablo);
$park->registerVisitor($ana);
$park->registerVisitor($luis);
$park->registerVisitor($maria);

// --- Simulate Familia García trying the attractions ---
echo "**************** CASO 1: FAMILIA GARCÍA ****************\n";
$park->checkAccess($pablo, $montanaRusa); // Should be allowed
$park->checkAccess($ana, $montanaRusa);  // Should be denied (pregnant)
$park->checkAccess($luis, $carrusel);    // Should be denied (needs adult)
$park->checkAccess($maria, $trenInfantil); // Should be denied (needs adult)
echo "\n";


// 3. Register Visitors from "Caso 2: Grupo de Adolescentes"
$carlos = new Visitor("Carlos López", 16, 165);
$sandra = new Visitor("Sandra Ruiz", 15, 155);
$miguel = new Visitor("Miguel Torres", 13, 135);

$park->registerVisitor($carlos);
$park->registerVisitor($sandra);
$park->registerVisitor($miguel);

// --- Simulate Grupo de Adolescentes trying the attractions ---
echo "**************** CASO 2: GRUPO DE ADOLESCENTES ****************\n";
$park->checkAccess($carlos, $montanaRusa); // Should be allowed
$park->checkAccess($sandra, $montanaRusa); // Should be allowed
$park->checkAccess($miguel, $montanaRusa); // Should be denied (height)
$park->checkAccess($miguel, $trenInfantil); // Should be denied (age)
echo "\n";

// 4. Display the park's current status and final report
$park->displayCurrentStatus();
$park->generateDailyReport();