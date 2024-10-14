<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFOGAME</title>
    <link rel="icon" href="img/hombre.png">
    <link rel="icon" href="icon.jpg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfE7CEqAAAAALk22auXV6NcWs7-CZju3pEVAJDY"></script>
</head>
<body>
<main>
    <div class="contenedor-log">
        <div class="boxback">
            <div class="boxback-log">
                <h3>¿Ya tienes una cuenta?</h3>
                <p>Inicia sesión</p>
                <button id="btn-log">Iniciar sesión</button>
            </div>
            <div class="boxback-reg">
                <h3>¿Nuevo registro?</h3>
                <p> Registrate para iniciar sesión</p>
                <button id="btn-reg">Regístrarse</button>
            </div>
        </div>
        <div class="contenedor_log-reg">
            <form id="login-form" action="login_usuario_be.php" method="post" class="f-log">
                <h2>Iniciar sesión</h2>
                <div class="input-container">
                    <input type="email" placeholder="Ingresa tu correo" name="usuario" class="input-field" required>
                </div>
                <div class="input-container">
                    <input id="Input" type="password" placeholder="Contraseña" name="password" class="input-field passw" required>
                    <img src="Show.png" alt="" class="icon" id="Eye">
                </div>
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <button id="btnlr" type="button" onclick="onSubmit()">Entrar</button>
            </form>
            <form action="registro_usuario_be.php" method="POST" class="f-reg">
                <h2>Regístrarse</h2>
                <input type="text" placeholder="Nombre completo" name="nombre" autocomplete="off" required>
                <input type="email" placeholder="Correo electronico" name="correo" autocomplete="off" required>
                <input type="text" placeholder="Usuario" name="usuario" autocomplete="off" required>
                <input type="password" placeholder="Contraseña" name="contra" autocomplete="off" required>
                  <div class="input-container terminos">
                    <input type="checkbox" name="terminos" id="terminos" class="checkbox">
                    <label for="terminos">He leído y acepto los <a href="#" id="terminos-link">términos y condiciones</a>.</label>
                    <div id="popup" class="popup">
                        <div class="popup-content">
                            <span id="close-btn" class="close-btn">&times;</span>
                            <h2>Términos y Condiciones</h2>
                            <p>Términos y Condiciones...</p>
                        </div>
                    </div>
                  </div>
                <button id="btnRegistrar" type="submit">Registrar</button>
            </form>
        </div>
    </div>
</main>
<script src="JavaScript/script.js"></script>
<script>
  function onSubmit() {
    grecaptcha.enterprise.ready(async () => {
      const token = await grecaptcha.enterprise.execute('6LfE7CEqAAAAALk22auXV6NcWs7-CZju3pEVAJDY', {action: 'LOGIN'});
      document.getElementById('g-recaptcha-response').value = token;
      document.getElementById('login-form').submit();
    });
  }
</script>
</body>
</html>
