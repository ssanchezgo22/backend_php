<?php
require_once 'conexion.php';

$conexion = conectar();
$productos = [];

if ($conexion) {
    try {
        $sql = "SELECT * FROM productos";
        $stmt = $conexion->query($sql);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "❌ Error al obtener productos: " . $e->getMessage();
    }

    $conexion = null;
}
?>
