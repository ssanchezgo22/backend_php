<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte del Parque</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1, h2, h3 {
            color: #1a237e;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }
        pre {
            background-color: #f8f8f8;
            border: 1px solid #e1e1e8;
            padding: 15px;
            white-space: pre-wrap;
            word-wrap: break-word;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Parque de Diversiones: Reporte</h1>
        <hr>

        <?php
        // Incluye todos los archivos de clase
        require_once 'Visitor.php';
        require_once 'Attraction.php';
        require_once 'SpecificAttractions.php';
        require_once 'Park.php';

        // 1. Configura el parque y sus atracciones
        $park = new Park();
        $montanaRusa = new MontañaRusa("Montaña Rusa", 20, 5);
        $carrusel = new Carrusel("Carrusel", 30, 4);
        $trenInfantil = new TrenInfantil("Tren Infantil", 15, 3);
        $park->addAttraction($montanaRusa);
        $park->addAttraction($carrusel);
        $park->addAttraction($trenInfantil);


        // 2. Registra visitantes del "Caso 1: Familia García"
        $pablo = new Visitor("Pablo García", 35, 175);
        $ana = new Visitor("Ana García", 32, 160, isPregnant: true);
        $luis = new Visitor("Luis García", 9, 130);
        $maria = new Visitor("María García", 5, 105);
        $park->registerVisitor($pablo);
        $park->registerVisitor($ana);
        $park->registerVisitor($luis);
        $park->registerVisitor($maria);

        // --- Simula a la Familia García probando las atracciones ---
        echo "<h2>CASO 1: FAMILIA GARCÍA</h2>";
        $park->checkAccess($pablo, $montanaRusa);
        $park->checkAccess($ana, $montanaRusa);
        $park->checkAccess($luis, $carrusel);
        $park->checkAccess($maria, $trenInfantil);


        // 3. Registra visitantes del "Caso 2: Grupo de Adolescentes"
        $carlos = new Visitor("Carlos López", 16, 165);
        $sandra = new Visitor("Sandra Ruiz", 15, 155);
        $miguel = new Visitor("Miguel Torres", 13, 135);
        $park->registerVisitor($carlos);
        $park->registerVisitor($sandra);
        $park->registerVisitor($miguel);

        // --- Simula al Grupo de Adolescentes probando las atracciones ---
        echo "<h2>CASO 2: GRUPO DE ADOLESCENTES</h2>";
        $park->checkAccess($carlos, $montanaRusa);
        $park->checkAccess($sandra, $montanaRusa);
        $park->checkAccess($miguel, $montanaRusa);
        $park->checkAccess($miguel, $trenInfantil);

        echo "<hr>";
        // 4. Muestra el estado actual del parque y el reporte final
        $park->displayCurrentStatus();
        $park->generateDailyReport();

        ?>

    </div>

</body>
</html>

// // Include all class files
// require_once 'Visitor.php';
// require_once 'Attraction.php';
// require_once 'SpecificAttractions.php';
// require_once 'Park.php';

// // 1. Setup the Park and its Attractions
// $park = new Park();

// $montanaRusa = new MontañaRusa("Montaña Rusa", 20, 5);
// $carrusel = new Carrusel("Carrusel", 30, 4);
// $trenInfantil = new TrenInfantil("Tren Infantil", 15, 3);

// $park->addAttraction($montanaRusa);
// $park->addAttraction($carrusel);
// $park->addAttraction($trenInfantil);


// // 2. Register Visitors from "Caso 1: Familia García"
// $pablo = new Visitor("Pablo García", 35, 175);
// $ana = new Visitor("Ana García", 32, 160, isPregnant: true);
// $luis = new Visitor("Luis García", 9, 130);
// $maria = new Visitor("María García", 5, 105);

// $park->registerVisitor($pablo);
// $park->registerVisitor($ana);
// $park->registerVisitor($luis);
// $park->registerVisitor($maria);

// // --- Simulate Familia García trying the attractions ---
// echo "**************** CASO 1: FAMILIA GARCÍA ****************\n";
// $park->checkAccess($pablo, $montanaRusa); // Should be allowed
// $park->checkAccess($ana, $montanaRusa);  // Should be denied (pregnant)
// $park->checkAccess($luis, $carrusel);    // Should be denied (needs adult)
// $park->checkAccess($maria, $trenInfantil); // Should be denied (needs adult)
// echo "\n";


// // 3. Register Visitors from "Caso 2: Grupo de Adolescentes"
// $carlos = new Visitor("Carlos López", 16, 165);
// $sandra = new Visitor("Sandra Ruiz", 15, 155);
// $miguel = new Visitor("Miguel Torres", 13, 135);

// $park->registerVisitor($carlos);
// $park->registerVisitor($sandra);
// $park->registerVisitor($miguel);

// // --- Simulate Grupo de Adolescentes trying the attractions ---
// echo "**************** CASO 2: GRUPO DE ADOLESCENTES ****************\n";
// $park->checkAccess($carlos, $montanaRusa); // Should be allowed
// $park->checkAccess($sandra, $montanaRusa); // Should be allowed
// $park->checkAccess($miguel, $montanaRusa); // Should be denied (height)
// $park->checkAccess($miguel, $trenInfantil); // Should be denied (age)
// echo "\n";

// // 4. Display the park's current status and final report
// $park->displayCurrentStatus();
// $park->generateDailyReport();