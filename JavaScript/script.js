const AuthModule = (function() {
    // Variables privadas
    const contLogReg = document.querySelector(".contenedor_log-reg");
    const formularioLog = document.querySelector(".f-log");
    const formularioReg = document.querySelector(".f-reg");
    const boxbackLog = document.querySelector(".boxback-log");
    const boxbackReg = document.querySelector(".boxback-reg");

    // Métodos privados
    function ancPag() {
        if (window.innerWidth > 850) {
            boxbackLog.style.display = "block";
            boxbackReg.style.display = "block";
        } else {
            boxbackReg.style.display = "block";
            boxbackReg.style.opacity = "1";
            boxbackLog.style.display = "none";
            formularioLog.style.display = "block";
            formularioReg.style.display = "none";
            contLogReg.style.left = "0px";
        }
    }

    function login() {
        if (window.innerWidth > 850) {
            formularioReg.style.display = "none";
            contLogReg.style.left = "150px";
            formularioLog.style.display = "block";
            boxbackReg.style.opacity = "1";
            boxbackLog.style.opacity = "0";
        } else {
            formularioReg.style.display = "none";
            contLogReg.style.left = "0px";
            formularioLog.style.display = "block";
            boxbackReg.style.display = "block";
            boxbackLog.style.display = "none";
        }
    }

    function register() {
        if (window.innerWidth > 850) {
            formularioReg.style.display = "block";
            contLogReg.style.left = "690px";
            formularioLog.style.display = "none";
            boxbackReg.style.opacity = "0";
            boxbackLog.style.opacity = "1";
        } else {
            formularioReg.style.display = "block";
            contLogReg.style.left = "0px";
            formularioLog.style.display = "none";
            boxbackReg.style.display = "none";
            boxbackLog.style.display = "block";
            boxbackLog.style.opacity = "1";
        }
    }

    // Métodos públicos
    return {
        init: function() {
            document.getElementById("btn-reg").addEventListener("click", register);
            document.getElementById("btn-log").addEventListener("click", login);
            window.addEventListener("resize", ancPag);
            ancPag(); // Inicialización al cargar
        }
    };
})();

// Inicialización del módulo
AuthModule.init();
