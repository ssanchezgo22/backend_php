<?php
require_once 'conexion.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $conexion = conectar();

    if ($conexion) {
        try {
            $stmt = $conexion->prepare("DELETE FROM productos WHERE id = :id");
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "❌ Error al eliminar: " . $e->getMessage();
            exit;
        }
        $conexion = null;
    }
}

header('Location: mostrar_productos.php');
exit;
