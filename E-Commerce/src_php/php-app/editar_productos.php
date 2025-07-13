<?php
require_once 'conexion.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: mostrar_productos.php');
    exit;
}

$id = $_GET['id'];
$conexion = conectar();
$producto = null;

if ($conexion) {
    $stmt = $conexion->prepare("SELECT * FROM productos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    $conexion = null;
}

if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h2>Editar Producto</h2>
    <form method="POST" action="actualizar_producto.php">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required><br><br>

        <label>Precio:</label><br>
        <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required><br><br>

        <label>Cantidad:</label><br>
        <input type="number" name="cantidad" value="<?= $producto['cantidad'] ?>" required><br><br>

        <input type="submit" value="Actualizar producto">
    </form>

    <br>
    <a href="mostrar_productos.php">← Volver al listado</a>
</body>
</html>
