const carruseles = {
    'mensuales': {
        index: 0,
        element: document.querySelector('#carrusel-mensuales'),
        total: <?= count($categorias['Mensuales']) ?>,
        indicadores: document.querySelector('#indicadores-mensuales')
    },
    'anuales': {
        index: 0,
        element: document.querySelector('#carrusel-anuales'),
        total: <?= count($categorias['Anuales']) ?>,
        indicadores: document.querySelector('#indicadores-anuales')
    }
};


function moverCarrusel(tipo, direccion) {
    const carrusel = carruseles[tipo];
    carrusel.index = (carrusel.index + direccion + carrusel.total) % carrusel.total;

    carrusel.element.style.transform = `translateX(-${carrusel.index * 100}%)`;
    actualizarIndicadores(tipo);
}


function crearIndicadores() {
    Object.keys(carruseles).forEach(tipo => {
        const container = carruseles[tipo].indicadores;
        container.innerHTML = '';
        for (let i = 0; i < carruseles[tipo].total; i++) {
            const indicador = document.createElement('div');
            indicador.classList.add('indicador');
            indicador.addEventListener('click', () => irASlide(tipo, i));
            container.appendChild(indicador);
        }
        actualizarIndicadores(tipo);
    });
}


function actualizarIndicadores(tipo) {
    const indicadores = carruseles[tipo].indicadores.querySelectorAll('.indicador');
    indicadores.forEach((ind, i) => ind.classList.toggle('activo', i === carruseles[tipo].index));
}


function irASlide(tipo, index) {
    carruseles[tipo].index = index;
    carruseles[tipo].element.style.transform = `translateX(-${index * 100}%)`;
    actualizarIndicadores(tipo);
}


let isDragging = false, startPos = 0, currentTranslate = 0, prevTranslate = 0, currentCarrusel = null;

document.querySelectorAll('.carrusel').forEach(carrusel => {
    carrusel.addEventListener('mousedown', dragStart);
    carrusel.addEventListener('touchstart', dragStart);
    carrusel.addEventListener('mouseup', dragEnd);
    carrusel.addEventListener('touchend', dragEnd);
    carrusel.addEventListener('mousemove', drag);
    carrusel.addEventListener('touchmove', drag);
    carrusel.addEventListener('mouseleave', dragEnd);
});

function dragStart(e) {
    currentCarrusel = Array.from(carruseles).find(([key, val]) => val.element === e.currentTarget)[0];
    const carrusel = carruseles[currentCarrusel];

    if (e.type === 'touchstart') {
        startPos = e.touches[0].clientX;
    } else {
        startPos = e.clientX;
        e.preventDefault();
    }

    isDragging = true;
    carrusel.element.classList.add('grabbing');
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
    carruseles[currentCarrusel].element.classList.remove('grabbing');

    const movedBy = currentTranslate - prevTranslate;
    if (movedBy < -100) moverCarrusel(currentCarrusel, 1);
    else if (movedBy > 100) moverCarrusel(currentCarrusel, -1);

    prevTranslate = -carruseles[currentCarrusel].index * carruseles[currentCarrusel].element.offsetWidth;
}

function animation() {
    carruseles[currentCarrusel].element.style.transform = `translateX(${currentTranslate}px)`;
    if (isDragging) requestAnimationFrame(animation);
}


document.addEventListener('DOMContentLoaded', crearIndicadores);