<?php
// Incluir archivos necesarios y configurar la sesión
include('php/conexion_be.php');
include('log_event.php');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'recaptcha.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

$USUARIO = $_POST['usuario'] ?? '';
$PASSWORD = $_POST['password'] ?? '';

// Contador de intentos fallidos
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// Realizar la consulta para obtener al usuario
$consulta = "SELECT * FROM usuarios WHERE correo = '$USUARIO'";
$resultado = mysqli_query($conexion, $consulta);

// Verificar si la consulta tuvo éxito y obtener el usuario
if ($resultado && mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);  // Obtener los datos del usuario
    $hashed_password = $usuario['contrasena'];  // Obtener la contraseña encriptada

    // Verificar la contraseña
    if (password_verify($PASSWORD, $hashed_password)) {
        // Iniciar sesión y redirigir al usuario
        $_SESSION['usuario'] = $USUARIO;
        log_event("Inicio de sesión exitoso para el usuario: $USUARIO");
        $_SESSION['login_attempts'] = 0; // Reiniciar el contador de intentos fallidos

        // Redirigir a la página de inicio después del inicio de sesión exitoso
        header("location: INFOGAME/index.html");
        exit();
    } else {
        log_event("Intento de inicio de sesión fallido para el usuario: $USUARIO");
        $_SESSION['login_attempts'] += 1;
    }
} else {
    log_event("Intento de inicio de sesión fallido para el usuario: $USUARIO");
    $_SESSION['login_attempts'] += 1;
}

// Verificar si se han superado los tres intentos
if ($_SESSION['login_attempts'] > 3) {
    // Enviar correo electrónico de notificación
    if (!empty($USUARIO)) {  // $USUARIO ya es el correo
        $to = $USUARIO;  
        $subject = 'Superados los intentos de inicio de sesion';
        $message = "El usuario $USUARIO ha superado los tres intentos fallidos de inicio de sesion.";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                      
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'jorge.garza0310@gmail.com';                    
            $mail->Password   = 'kfdx stgr pktt nydr';                      
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    

            //Recipients
            $mail->setFrom('jorge.garza0310@gmail.com', 'admin');
            $mail->addAddress($to);    

            //Content
            $mail->isHTML(true);                                 
            $mail->Subject = $subject;
            $mail->Body    = '<h2>' . $message . '</h2>';

            $mail->send();
            
        } catch (Exception $e) {
            log_event("Error al enviar correo electrónico: " . $mail->ErrorInfo);
        }
    }
}

// Incluir el archivo de inicio de sesión nuevamente
include("index.php");
?>  
<div class="row">
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert" style="color: white;">
        <strong>Hola!</strong> Tu nombre de usuario o contraseña son incorrectos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div> 

<?php
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
