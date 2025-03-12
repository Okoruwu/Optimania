<?php
include '../resources/head.php';


$categorias = [
    'Mensuales' => [
        ['nombre' => 'Lente Mensual Premium', 'precio' => '599', 'imagen' => '../img/lentes/mensual1.jpg', 'detalles' => ['Hidratación prolongada', 'Material de silicona', 'Protección UV', 'Paquete de 6 unidades']],
        ['nombre' => 'Confort Vision+', 'precio' => '699', 'imagen' => '../img/lentes/mensual2.jpg', 'detalles' => ['Tecnología HD', 'Diseño ultra-fino', 'Oxigenación máxima', 'Para uso diario']]
    ],
    'Anuales' => [
        ['nombre' => 'Anual Pro Comfort', 'precio' => '1,299', 'imagen' => '../img/lentes/anual1.jpg', 'detalles' => ['Duración 12 meses', 'Material orgánico', 'Protección integral', 'Incluye solución limpiadora']],
        ['nombre' => 'YearLens Elite', 'precio' => '1,499', 'imagen' => '../img/lentes/anual2.jpg', 'detalles' => ['Tecnología anti-depósitos', 'Hidratación 24/7', 'Garantía de 1 año', 'Estuche premium']]
    ],
    'Extras' => [
        ['nombre' => 'Estuche de viaje', 'precio' => '199', 'imagen' => '../img/extras/estuche.jpg'],
        ['nombre' => 'Solución limpiadora', 'precio' => '299', 'imagen' => '../img/extras/solucion.jpg'],
        ['nombre' => 'Gotas humectantes', 'precio' => '249', 'imagen' => '../img/extras/gotas.jpg'],
        ['nombre' => 'Kit de limpieza', 'precio' => '349', 'imagen' => '../img/extras/kit.jpg']
    ]
];
?>

<body>
    <?php include '../resources/navbar.php'; ?>

    <section class="catalogo-lentes py-5" style="background: #f8f9fa;">
        <div class="container">

            <div class="banner-catalogo mb-5">
                <img src="../img/banners/banner-contacto.jpg" alt="Lentes de Contacto"
                    class="img-fluid rounded-lg shadow" style="height: 300px; object-fit: cover; width: 100%;">
            </div>


            <div class="mb-5">
                <h2 class="display-5 mb-4" style="color: #33b1e3; font-weight: 800;">Lentes Mensuales</h2>
                <div class="carrusel-contenedor">
                    <div class="carrusel" id="carrusel-mensuales">
                        <?php foreach ($categorias['Mensuales'] as $index => $lente): ?>
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
                        <button class="boton-carrusel" onclick="moverCarrusel('mensuales', -1)">❮</button>
                        <button class="boton-carrusel" onclick="moverCarrusel('mensuales', 1)">❯</button>
                    </div>
                    <div class="indicadores" id="indicadores-mensuales"></div>
                </div>
            </div>

            <div class="mb-5">
                <h2 class="display-5 mb-4" style="color: #33b1e3; font-weight: 800;">Lentes Anuales</h2>
                <div class="carrusel-contenedor">
                    <div class="carrusel" id="carrusel-anuales">
                        <?php foreach ($categorias['Anuales'] as $index => $lente): ?>
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
                        <button class="boton-carrusel" onclick="moverCarrusel('anuales', -1)">❮</button>
                        <button class="boton-carrusel" onclick="moverCarrusel('anuales', 1)">❯</button>
                    </div>
                    <div class="indicadores" id="indicadores-anuales"></div>
                </div>
            </div>


            <div class="mb-5">
                <h2 class="display-5 mb-4" style="color: #33b1e3; font-weight: 800;">Extras para tu paquete</h2>
                <div class="row">
                    <?php foreach ($categorias['Extras'] as $extra): ?>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card extra-card h-100 border-0 shadow-sm">
                                <img src="<?= $extra['imagen'] ?>" class="card-img-top" alt="<?= $extra['nombre'] ?>"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title" style="color: #f18500;"><?= $extra['nombre'] ?></h5>
                                    <p class="h4 text-dark mb-3">$<?= $extra['precio'] ?> MXN</p>
                                    <button class="btn btn-outline-warning btn-block">
                                        <i class="fa fa-plus-circle mr-2"></i>Agregar
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
        .extra-card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border-radius: 15px !important;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .extra-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(51, 177, 227, 0.15) !important;
        }

        .btn-outline-warning {
            border-color: #f18500;
            color: #f18500;
            transition: all 0.3s ease;
        }

        .btn-outline-warning:hover {
            background: #f18500;
            color: white;
        }


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
    </script>
</body>

</html>