<!DOCTYPE html>
<html lang="en">
<?php
include '../resources/head.php';

$categorias = [
    'Oftálmicos' => [
        ['nombre' => 'Clásico Elegance', 'precio' => '1,499', 'imagen' => '../img/lentes/oft1.jpg', 'detalles' => ['Diseño ejecutivo premium', 'Materiales ultrarresistentes', 'Garantía de 2 años', 'Incluye estuche de protección']],
        ['nombre' => 'Modern Vision Pro', 'precio' => '2,199', 'imagen' => '../img/lentes/oft2.jpg', 'detalles' => ['Tecnología anti-reflejo HD', 'Protección UV 400 completa', 'Lentes ultra delgados', 'Filtro luz azul']],
        ['nombre' => 'UltraLight Comfort', 'precio' => '1,899', 'imagen' => '../img/lentes/oft3.jpg', 'detalles' => ['Peso ultraligero (menos de 15g)', 'Ajuste ergonómico perfecto', 'Material flexible hipoalergénico', 'Incluye funda deportiva']],
        ['nombre' => 'Executive Design', 'precio' => '2,499', 'imagen' => '../img/lentes/oft4.jpg', 'detalles' => ['Diseño 100% personalizable', 'Tratamiento anti-fatiga digital', 'Estuche premium de regalo', 'Servicio de ajuste profesional']]
    ],
    'Sol' => [
        ['nombre' => 'Aviador Premium', 'precio' => '1,299', 'imagen' => '../img/lentes/sol1.jpg'],
        ['nombre' => 'Polarized Black', 'precio' => '1,599', 'imagen' => '../img/lentes/sol2.jpg'],
        ['nombre' => 'Sport Edition', 'precio' => '1,799', 'imagen' => '../img/lentes/sol3.jpg'],
        ['nombre' => 'Vintage Gold', 'precio' => '1,899', 'imagen' => '../img/lentes/sol4.jpg']
    ]
];
?>

<body>
    <?php include '../resources/navbar.php'; ?>

    <section class="catalogo-lentes py-5" style="background: #f8f9fa;">
        <div class="container">

            <div class="banner-catalogo mb-5">
                <img src="../img/banners/BANNER-PAGINA2.png" alt="Catálogo de Lentes Optimania"
                    class="img-fluid rounded-lg shadow" style="height: 300px; object-fit: cover; width: 100%;">
            </div>


            <div class="mb-5">
                <div class="carrusel-contenedor">
                    <div class="carrusel">
                        <?php foreach ($categorias['Oftálmicos'] as $index => $lente): ?>
                            <div class="lente <?= $index === 0 ? 'activo' : '' ?>">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <img src="<?= $lente['imagen'] ?>" class="img-fluid rounded-lg shadow"
                                            alt="<?= $lente['nombre'] ?>" style="height: 350px; object-fit: contain;">
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="modelo-nombre"><?= $lente['nombre'] ?></h2>
                                        <p class="modelo-precio">$<?= $lente['precio'] ?> MXN</p>
                                        <ul class="detalles-lista">
                                            <?php foreach ($lente['detalles'] as $detalle): ?>
                                                <li>✔️ <?= $detalle ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <button class="btn btn-warning mt-3">
                                            <i class="fa fa-eye mr-2"></i>Ver detalles
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="botones-carrusel">
                        <button class="boton-carrusel" onclick="moverCarrusel(-1)">❮</button>
                        <button class="boton-carrusel" onclick="moverCarrusel(1)">❯</button>
                    </div>
                    <div class="indicadores" id="indicadores-container"></div>
                </div>
            </div>


            <div class="banner-populares mb-5">
                <img src="../img/banners/BANNER-PAGINA1.png" alt="Los más populares" class="img-fluid rounded-lg shadow"
                    style="height: 250px; object-fit: cover; width: 100%; border: 3px solid #33b1e3;">
            </div>


            <div class="mb-5">
                <h2 class="display-5 mb-4" style="color: #33b1e3; font-weight: 800;">Los + Populares</h2>
                <div class="row">
                    <?php foreach ($categorias['Sol'] as $lente): ?>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card lente-card h-100 border-0 shadow-sm">
                                <img src="<?= $lente['imagen'] ?>" class="card-img-top" alt="<?= $lente['nombre'] ?>"
                                    style="height: 250px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title" style="color: #f18500;"><?= $lente['nombre'] ?></h5>
                                    <p class="h4 text-dark mb-3">$<?= $lente['precio'] ?> MXN</p>
                                    <button class="btn btn-warning btn-block">
                                        <i class="fa fa-shopping-cart mr-2"></i>Agregar a carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include '../resources/footer.php'; ?>
    <?php include '../resources/JS.php'; ?>

    <style>
        .lente-card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border-radius: 15px !important;
        }

        .lente-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15) !important;
        }

        .btn-warning {
            background: #f18500;
            border-color: #f18500;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .banner-catalogo {
            border-radius: 15px;
            overflow: hidden;
            border: 3px solid #33b1e3;
            box-shadow: 0 4px 20px rgba(51, 177, 227, 0.2);
        }

        .banner-populares {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(51, 177, 227, 0.2);
            transition: transform 0.3s ease;
        }

        .banner-populares:hover {
            transform: scale(1.01);
        }

        .carrusel-contenedor {
            max-width: 1200px;
            margin: 2rem auto;
            position: relative;
            overflow: hidden;
            padding: 0 50px;
        }

        .carrusel {
            display: flex;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: grab;
            user-select: none;
        }

        .carrusel.grabbing {
            cursor: grabbing;
            transition: none;
        }

        .botones-carrusel {
            position: absolute;
            top: 50%;
            width: calc(100% - 100px);
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: space-between;
            pointer-events: none;
        }

        .boton-carrusel {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            pointer-events: all;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .boton-carrusel:hover {
            transform: scale(1.1);
            background: #33b1e3;
            color: white;
        }

        .lente {
            min-width: 100%;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            margin: 0 10px;
            flex-shrink: 0;
        }

        .indicadores {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 2rem;
        }

        .indicador {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #dfe6e9;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicador.activo {
            background: #33b1e3;
            transform: scale(1.2);
        }

        @media (max-width: 768px) {
            .carrusel-contenedor {
                padding: 0 20px;
            }

            .botones-carrusel {
                width: calc(100% - 40px);
            }

            .banner-populares img {
                height: 180px !important;
            }
        }
    </style>

    <script>
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
    </script>
</body>

</html>