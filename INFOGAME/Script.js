//Carrusel
document.addEventListener('DOMContentLoaded', () => {
    const carouselImages = document.querySelector('.carousel-images');
    const images = document.querySelectorAll('.carousel-images img');
    const imageCount = images.length / 2; // Images duplicadas
    let currentIndex = 0;
    let transitioning = false;

    function updateCarousel() {
        const width = images[0].clientWidth;
        carouselImages.style.transition = 'transform 0.5s ease-in-out';
        carouselImages.style.transform = `translateX(${-currentIndex * width}px)`;
    }

    function handleTransitionEnd() {
        const width = images[0].clientWidth;
        if (currentIndex >= imageCount) {
            currentIndex = 0;
            carouselImages.style.transition = 'none';
            carouselImages.style.transform = `translateX(${-currentIndex * width}px)`;
        } else if (currentIndex < 0) {
            currentIndex = imageCount - 1;
            carouselImages.style.transition = 'none';
            carouselImages.style.transform = `translateX(${-currentIndex * width}px)`;
        }
        transitioning = false;
    }

    carouselImages.addEventListener('transitionend', handleTransitionEnd);

    // Carrusel automático
    setInterval(() => {
        if (!transitioning) {
            currentIndex++;
            updateCarousel();
            transitioning = true;
        }
    }, 3000);
});

//Barra de búsqueda
function buscarJuego(event) {
    event.preventDefault(); // Previene el comportamiento por defecto del formulario
    
    // Diccionario de juegos disponibles y sus páginas correspondientes
    const juegosDisponibles = {
        "ELDEN RING": "inicio/game-details-2.html",
        "HALO REACH": "inicio/game-details.html",
        "EA FC 24": "inicio/game-details-3.html",
        "CLASH ROYALE": "inicio/game-details-4.html",
        "CYBERPUNK 2077": "inicio/game-details-5.html",
        "FORNITE": "inicio/game-details-6.html",
    };
    
    // Obtener el valor del input y convertirlo a mayúsculas
    const searchInput = document.getElementById('barra').value.trim().toUpperCase();

    // Mostrar el valor del input en la consola
    console.log('Valor de búsqueda:', searchInput);

    // Verificar si el juego existe en el diccionario
    if (juegosDisponibles[searchInput]) {
        // Si el juego existe, redirigir a la página correspondiente
        console.log('Juego encontrado:', juegosDisponibles[searchInput]);
        window.location.href = juegosDisponibles[searchInput];
    } else {
        // Si el juego no existe, redirigir a la página de error
        console.log('Juego no encontrado, redirigiendo a la página de error.');
        window.location.href = "error.html";
    }
}



