<?php
// Incluir archivos necesarios y configurar la sesión
include('php/conexion_be.php');
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el comentario del formulario
    $comentario = $_POST['comentario'] ?? '';
    // Obtener el usuario de la sesión
    $usuario = $_SESSION['usuario'] ?? 'anónimo';

    // Escapar caracteres especiales para evitar inyecciones SQL
    $comentario = mysqli_real_escape_string($conexion, $comentario);
    $usuario = mysqli_real_escape_string($conexion, $usuario);

    // Crear la consulta para insertar el comentario en la base de datos
    $query = "INSERT INTO comentario (usuario, comentario, fecha) VALUES ('$usuario', '$comentario', NOW())";

    // Ejecutar la consulta
    $ejecutar = mysqli_query($conexion, $query);

    // Verificar si la consulta tuvo éxito
    if ($ejecutar) {
        // Redirigir a la misma página después de enviar el comentario
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Mostrar un mensaje de error si la consulta falló
        echo "Error: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
