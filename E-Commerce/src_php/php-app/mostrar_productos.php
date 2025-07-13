<?php include 'obtener_productos.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #aaa;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>Listado de Productos</h2>

    <?php if (!empty($productos)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['id']) ?></td>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td><?= htmlspecialchars($producto['precio']) ?></td>
                        <td><?= htmlspecialchars($producto['cantidad']) ?></td>
                        <td>
                            <a href="editar_producto.php?id=<?= $producto['id'] ?>">✏️ Editar</a> |
                            <a href="eliminar_producto.php?id=<?= $producto['id'] ?>" onclick="return confirm('¿Eliminar este producto?');">🗑️ Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No hay productos registrados aún.</p>
    <?php endif; ?>

    <br>
    <a href="formulario.php">← Agregar otro producto</a>
</body>
</html>
