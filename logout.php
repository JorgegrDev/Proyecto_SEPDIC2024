<?php
session_start();
include('log_event.php');

// Obtener el usuario que está cerrando sesión
$usuario = $_SESSION['usuario'] ?? 'Usuario desconocido';

// Registrar el evento de cierre de sesión
log_event("Cierre de sesión para el usuario: $usuario");

// Limpiar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir al inicio de sesión o a donde sea apropiado en tu aplicación
header("location: index.php");
exit();
?>
