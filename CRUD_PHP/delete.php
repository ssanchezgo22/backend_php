<?php
require_once 'conexion.php';
$conexion = conectar();
try {
// ID del usuario a eliminar
$id = 1;
// Preparar consulta DELETE
$consulta = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");
// Vincular parámetro
$consulta->bindParam(':id', $id);
// Ejecutar consulta
$consulta->execute();
echo "Usuario eliminado correctamente. Filas afectadas: " . $consulta-
>rowCount();
} catch(PDOException $e) {
echo "Error al eliminar: " . $e->getMessage();
}
$conexion = null;
?>