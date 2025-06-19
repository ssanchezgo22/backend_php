<?php
require_once 'conexion.php'; // Función conectar()

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';

    if (!empty($nombre) && is_numeric($precio) && is_numeric($cantidad)) {
        $conexion = conectar();

        if ($conexion) {
            try {
                $sql = "INSERT INTO productos (nombre, precio, cantidad) 
                        VALUES (:nombre, :precio, :cantidad)";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':cantidad', $cantidad);
                $stmt->execute();

                $mensaje = "✅ Producto agregado correctamente.";
            } catch (PDOException $e) {
                $mensaje = "❌ Error al insertar: " . $e->getMessage();
            }

            $conexion = null;
        } else {
            $mensaje = "❌ Error de conexión.";
        }
    } else {
        $mensaje = "❌ Todos los campos son obligatorios y válidos.";
    }
}
?>
