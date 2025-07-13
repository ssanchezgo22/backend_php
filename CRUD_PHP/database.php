<?php
require_once 'conexion.php';
$conexion = conectar();
if ($conexion) {
echo "Conectado a la base de datos correctamente";
// Usar $conexion para realizar operaciones con la base de datos
// Cerrar conexión
$conexion = null;
}
?>