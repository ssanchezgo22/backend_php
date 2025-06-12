<?php
require_once 'conexion.php';
$conexion = conectar();
try {
// Datos a actualizar
$id = 2;
$nuevoNombre = "Juan Carlos";
// Preparar consulta UPDATE
$consulta = $conexion->prepare("UPDATE usuarios SET nombre = :nombre WHERE
id = :id");
// Vincular parámetros
$consulta->bindParam(':nombre', $nuevoNombre);
$consulta->bindParam(':id', $id);
// Ejecutar consulta
$consulta->execute();
echo "Usuario actualizado correctamente. Filas afectadas: " . $consulta-
>rowCount();
} catch(PDOException $e) {
echo "Error al actualizar: " . $e->getMessage();
}
$conexion = null;
?>