document.getElementById("btn-reg").addEventListener("click", register);
document.getElementById("btn-log").addEventListener("click", login);

window.addEventListener("resize", AncPag);
/*Variables*/
var cont_log_reg =  document.querySelector(".contenedor_log-reg")
var formulario_log = document.querySelector(".f-log");
var formulario_reg = document.querySelector(".f-reg");
var boxback_log = document.querySelector(".boxback-log");
var boxback_reg = document.querySelector(".boxback-reg");

function AncPag(){
    if(window.innerWidth >850){
        boxback_log.style.display = "block";
        boxback_reg.style.display = "block";
    }
    else{
        boxback_reg.style.display = "block";
        boxback_reg.style.opacity = "1";
        boxback_log.style.display = "none";
        formulario_log.style.display = "block";
        formulario_reg.style.display = "none";
        cont_log_reg.style.left= "0px";

    }
}

AncPag();

function login(){
    if(window.innerWidth > 850){
        formulario_reg.style.display = "none";
        cont_log_reg.style.left= "150px";
        formulario_log.style.display = "block";
        boxback_reg.style.opacity = "1";
        boxback_log.style.opacity = "0";
    }
    else{
        formulario_reg.style.display = "none";
        cont_log_reg.style.left= "0px";
        formulario_log.style.display = "block";
        boxback_reg.style.display = "block";
        boxback_log.style.display = "none";
    }
}

function register(){
    if(window.innerWidth > 850){
        formulario_reg.style.display = "block";
        cont_log_reg.style.left= "690px";
        formulario_log.style.display = "none";
        boxback_reg.style.opacity = "0";
        boxback_log.style.opacity = "1";
    }
    else{
        formulario_reg.style.display = "block";
        cont_log_reg.style.left= "0px";
        formulario_log.style.display = "none";
        boxback_reg.style.display = "none";
        boxback_log.style.display = "block";
        boxback_log.style.opacity = "1";
    }
}

document.querySelector('.f-reg').addEventListener('submit', function(e) {
    const terminos = document.getElementById('terminos');
    if (!terminos.checked) {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Términos y condiciones',
            text: 'Debes aceptar los términos y condiciones para registrarte.'
        });
    }
});


var eye = document.getElementById('Eye');
        var input = document.getElementById('Input');

        eye.addEventListener("click", function(){
            if (input.type === "password") {
                input.type = "text";
                eye.style.opacity = 0.8;
            } else {
                input.type = "password";
                eye.style.opacity = 0.2;
            }
        });

// ventana emergente términos y condiciones
document.addEventListener('DOMContentLoaded', function() {
    var popup = document.getElementById('popup');
    var link = document.getElementById('terminos-link');
    var closeBtn = document.getElementById('close-btn');

    link.onclick = function(event) {
        event.preventDefault(); // Evita el comportamiento por defecto del enlace
        popup.style.display = 'block'; // Muestra el popup
    }

    closeBtn.onclick = function() {
        popup.style.display = 'none'; // Oculta el popup
    }

    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = 'none'; // Oculta el popup si se hace clic fuera de él
        }
    }
});
