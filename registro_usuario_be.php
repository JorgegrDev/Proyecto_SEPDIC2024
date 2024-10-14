<?php
include 'php/conexion_be.php';

$nombre_c = $_POST['nombre'];
$correo = $_POST['correo'];
$nusuario = $_POST['usuario'];
$contrasena = $_POST['contra'];

// Encriptar la contraseña
$contrasena_hashed = password_hash($contrasena, PASSWORD_BCRYPT);

// Verificar si el usuario ya existe
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$nusuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '
        <script>
            alert("¡Este usuario ya existe, intenta con algo diferente!");
            window.location= "index.php";
        </script>
    ';
    exit();
}

// Verificar si el correo ya está en uso
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
        <script>
            alert("¡Este correo ya está en uso, intenta con algo diferente!");
            window.location= "index.php";
        </script>
    ';
    exit();
}

// Insertar el nuevo usuario con la contraseña encriptada
$query = "INSERT INTO usuarios(nombre, correo, usuario, contrasena) VALUES ('$nombre_c', '$correo', '$nusuario', '$contrasena_hashed')";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    header("location:index.php");
}

mysqli_close($conexion);
?>
