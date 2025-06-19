<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';

    if ($id && $nombre && is_numeric($precio) && is_numeric($cantidad)) {
        $conexion = conectar();

        if ($conexion) {
            try {
                $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, cantidad = :cantidad WHERE id = :id";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':cantidad', $cantidad);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "❌ Error al actualizar: " . $e->getMessage();
                exit;
            }

            $conexion = null;
        }
    }
}

header('Location: mostrar_productos.php');
exit;
