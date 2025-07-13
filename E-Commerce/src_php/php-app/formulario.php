<?php include 'insertar_producto.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Productos</title>
</head>
<body>
    <h2>Agregar Producto</h2>

    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>

    <form method="POST" action="">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" name="precio" step="0.01" required><br><br>

        <label for="cantidad">Cantidad:</label><br>
        <input type="number" name="cantidad" required><br><br>

        <input type="submit" value="Agregar producto">
    </form>
</body>
</html>
