let indiceActual = 0;
const carrusel = document.querySelector('.carrusel');
const lentes = document.querySelectorAll('.lente');
const totalLentes = lentes.length;
let isDragging = false;
let startPos = 0;
let currentTranslate = 0;
let prevTranslate = 0;
let animationID = 0;

carrusel.addEventListener('mousedown', dragStart);
carrusel.addEventListener('touchstart', dragStart);
carrusel.addEventListener('mouseup', dragEnd);
carrusel.addEventListener('touchend', dragEnd);
carrusel.addEventListener('mousemove', drag);
carrusel.addEventListener('touchmove', drag);
carrusel.addEventListener('mouseleave', dragEnd);

function dragStart(e) {
    if (e.type === 'touchstart') {
        startPos = e.touches[0].clientX;
    } else {
        startPos = e.clientX;
        e.preventDefault();
    }

    isDragging = true;
    carrusel.classList.add('grabbing');
    animationID = requestAnimationFrame(animation);
}

function drag(e) {
    if (isDragging) {
        const currentPosition = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
        const diff = currentPosition - startPos;
        currentTranslate = prevTranslate + diff;
    }
}

function dragEnd() {
    if (!isDragging) return;
    isDragging = false;
    cancelAnimationFrame(animationID);
    carrusel.classList.remove('grabbing');

    const movedBy = currentTranslate - prevTranslate;
    if (movedBy < -100) moverCarrusel(1);
    else if (movedBy > 100) moverCarrusel(-1);
    else carrusel.style.transform = `translateX(-${indiceActual * 100}%)`;

    prevTranslate = -indiceActual * carrusel.offsetWidth;
}

function animation() {
    carrusel.style.transform = `translateX(${currentTranslate}px)`;
    if (isDragging) requestAnimationFrame(animation);
}

function moverCarrusel(direccion) {
    indiceActual = (indiceActual + direccion + totalLentes) % totalLentes;
    prevTranslate = -indiceActual * carrusel.offsetWidth;
    carrusel.style.transform = `translateX(${prevTranslate}px)`;
    actualizarIndicadores();
}

function crearIndicadores() {
    const container = document.getElementById('indicadores-container');
    container.innerHTML = '';
    for (let i = 0; i < totalLentes; i++) {
        const indicador = document.createElement('div');
        indicador.classList.add('indicador');
        indicador.addEventListener('click', () => irASlide(i));
        container.appendChild(indicador);
    }
    actualizarIndicadores();
}

function actualizarIndicadores() {
    document.querySelectorAll('.indicador').forEach((indicador, index) => {
        indicador.classList.toggle('activo', index === indiceActual);
    });
}

function irASlide(index) {
    indiceActual = index;
    moverCarrusel(0);
}

document.addEventListener('DOMContentLoaded', crearIndicadores);