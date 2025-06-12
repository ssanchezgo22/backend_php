<?php
/*// Datos de conexión
$servidor = "localhost";
$usuario = "usuario_mysql";
$password = "contraseña_mysql";
$baseDatos = "nombre_base_datos";

// ---->Crear conexión MySQLi<-------------
$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

// Verificar si hay errores en la conexión
if ($conexion->connect_error) {
die("La conexión falló: " . $conexion->connect_error);
}
echo "¡Conexión exitosa!"; -->

// Cerrar la conexión cuando hayamos terminado
$conexion->close();

// Datos de conexión
$servidor = "localhost";
$usuario = "usuario_mysql";
$password = "contraseña_mysql";
$baseDatos = "nombre_base_datos";
try {
// ----->Crear conexión PDO<---------
$conexion = new PDO(
"mysql:host=$servidor;dbname=$baseDatos",
$usuario,
$password
);
// Configurar PDO para que lance excepciones en caso de errores
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "¡Conexión exitosa usando PDO!";
} catch(PDOException $e) {
// Capturar y mostrar cualquier error
echo "Error de conexión: " . $e->getMessage();
}
// La conexión se cierra automáticamente al finalizar el script
// pero podemos cerrarla explícitamente si queremos
$conexion = null;
*/
require_once 'config.php';
function conectar() {
try {
$conexion = new PDO(
"mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
DB_USER,
DB_PASS
);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conexion;
} catch(PDOException $e) {
echo "Error de conexión: " . $e->getMessage();
return null;
}
}
?>
?>