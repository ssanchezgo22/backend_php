<?php
require_once 'conexion.php';
$conexion = conectar();
try {
// Preparar consulta SELECT
$consulta = $conexion->prepare("SELECT id, nombre, email FROM usuarios");
// Ejecutar consulta
$consulta->execute();
// Obtener resultados
$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
// Mostrar resultados
echo "<h2>Lista de Usuarios</h2>";
echo "<ul>";
foreach ($resultados as $fila) {
echo "<li>Usuario: " . $fila['nombre'] . " - Email: " . $fila['email']
. "</li>";
}
echo "</ul>";
} catch(PDOException $e) {
echo "Error en la consulta: " . $e->getMessage();
}
$conexion = null;
?>