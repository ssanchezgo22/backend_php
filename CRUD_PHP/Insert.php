<?php
require_once 'conexion.php';
$conexion = conectar();
try {
// Datos a insertar
$nombre = "Carlos";
$email = "carlos@ejemplo.com";
// Preparar consulta INSERT
$consulta = $conexion->prepare("INSERT INTO usuarios (nombre, email) VALUES
(:nombre, :email)");
// Vincular parámetros
$consulta->bindParam(':nombre', $nombre);
$consulta->bindParam(':email', $email);
// Ejecutar consulta
$consulta->execute();
echo "Usuario agregado correctamente. ID: " . $conexion->lastInsertId();
} catch(PDOException $e) {
echo "Error al insertar: " . $e->getMessage();
}
$conexion = null;
?>