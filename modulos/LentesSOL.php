<?php
include '../resources/head.php';

$categorias = [
    'Deportivos' => [
        ['nombre' => 'Sport Extreme', 'precio' => '2,499', 'imagen' => '../img/lentes/sol1.jpg', 'detalles' => ['Montura flexible', 'Lentes espejados', 'Sistema de ventilación', 'Correa ajustable']],
        ['nombre' => 'Cycling Pro', 'precio' => '2,199', 'imagen' => '../img/lentes/sol2.jpg', 'detalles' => ['Lentes fotocromáticos', 'Protección lateral', 'Material ultraligero', 'Anti-empañante']]
    ],
    'Moto' => [
        ['nombre' => 'Rider Shield Pro', 'precio' => '2,899', 'imagen' => '../img/lentes/sol3.jpg', 'detalles' => ['Protección integral', 'Visión periférica', 'Cierre hermético', 'Lentes intercambiables']],
        ['nombre' => 'SpeedMaster X', 'precio' => '3,199', 'imagen' => '../img/lentes/sol4.jpg', 'detalles' => ['Diseño aerodinámico', 'Tecnología anti-vibración', 'Material irrompible', 'Ventilación direccional']]
    ],
    'Artísticos' => [
        ['nombre' => 'Retro Vintage', 'precio' => '1,999', 'imagen' => '../img/lentes/sol5.jpg', 'detalles' => ['Diseño único', 'Montura artesanal', 'Lentes degradados', 'Edición limitada']],
        ['nombre' => 'Avant Garde', 'precio' => '2,499', 'imagen' => '../img/lentes/sol6.jpg', 'detalles' => ['Formas geométricas', 'Colores personalizados', 'Materiales mixtos', 'Estuche de colección']]
    ]
];
?>

<body>
    <?php include '../resources/navbar.php'; ?>

    <section class="catalogo-lentes py-5" style="background: #f8f9fa;">
        <div class="container">

            <div class="banner-catalogo mb-5">
                <img src="../img/banners/banner-sol.jpg" alt="Lentes de Sol" class="img-fluid rounded-lg shadow"
                    style="height: 300px; object-fit: cover; width: 100%; border: 3px solid #33b1e3;">
            </div>


            <div class="mb-5">
                <h2 class="display-5 mb-4" style="color: #33b1e3; font-weight: 800;">Lentes Deportivos</h2>
                <div class="carrusel-contenedor">
                    <div class="carrusel" id="carrusel-deportivos">
                        <?php foreach ($categorias['Deportivos'] as $index => $lente): ?>
                            <div class="lente <?= $index === 0 ? 'activo' : '' ?>">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <img src="<?= $lente['imagen'] ?>" class="img-fluid rounded-lg shadow"
                                            alt="<?= $lente['nombre'] ?>" style="height: 350px; object-fit: contain;">
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="modelo-nombre"><?= $lente['nombre'] ?></h2>
                                        <p class="modelo-precio" style="color: #f18500;">$<?= $lente['precio'] ?> MXN</p>
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
                        <button class="boton-carrusel" onclick="moverCarrusel('deportivos', -1)">❮</button>
                        <button class="boton-carrusel" onclick="moverCarrusel('deportivos', 1)">❯</button>
                    </div>
                    <div class="indicadores" id="indicadores-deportivos"></div>
                </div>
            </div>


            <div class="mb-5">
                <h2 class="display-5 mb-4" style="color: #33b1e3; font-weight: 800;">Lentes para Moto</h2>
                <div class="carrusel-contenedor">
                    <div class="carrusel" id="carrusel-moto">
                        <?php foreach ($categorias['Moto'] as $index => $lente): ?>
                            <div class="lente <?= $index === 0 ? 'activo' : '' ?>">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <img src="<?= $lente['imagen'] ?>" class="img-fluid rounded-lg shadow"
                                            alt="<?= $lente['nombre'] ?>" style="height: 350px; object-fit: contain;">
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="modelo-nombre"><?= $lente['nombre'] ?></h2>
                                        <p class="modelo-precio" style="color: #f18500;">$<?= $lente['precio'] ?> MXN</p>
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
                        <button class="boton-carrusel" onclick="moverCarrusel('moto', -1)">❮</button>
                        <button class="boton-carrusel" onclick="moverCarrusel('moto', 1)">❯</button>
                    </div>
                    <div class="indicadores" id="indicadores-moto"></div>
                </div>
            </div>


            <div class="mb-5">
                <h2 class="display-5 mb-4" style="color: #33b1e3; font-weight: 800;">Lentes Artísticos</h2>
                <div class="carrusel-contenedor">
                    <div class="carrusel" id="carrusel-artisticos">
                        <?php foreach ($categorias['Artísticos'] as $index => $lente): ?>
                            <div class="lente <?= $index === 0 ? 'activo' : '' ?>">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <img src="<?= $lente['imagen'] ?>" class="img-fluid rounded-lg shadow"
                                            alt="<?= $lente['nombre'] ?>" style="height: 350px; object-fit: contain;">
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="modelo-nombre"><?= $lente['nombre'] ?></h2>
                                        <p class="modelo-precio" style="color: #f18500;">$<?= $lente['precio'] ?> MXN</p>
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
                        <button class="boton-carrusel" onclick="moverCarrusel('artisticos', -1)">❮</button>
                        <button class="boton-carrusel" onclick="moverCarrusel('artisticos', 1)">❯</button>
                    </div>
                    <div class="indicadores" id="indicadores-artisticos"></div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../resources/footer.php'; ?>
    <?php include '../resources/JS.php'; ?>

    <style>
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

        .btn-warning {
            background: #f18500;
            border-color: #f18500;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .detalles-lista {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }

        .detalles-lista li {
            margin: 1rem 0;
            padding: 0.8rem;
            background: #f8f9fa;
            border-left: 4px solid #33b1e3;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .carrusel-contenedor {
                padding: 0 20px;
            }

            .botones-carrusel {
                width: calc(100% - 40px);
            }

            .banner-catalogo img {
                height: 200px !important;
            }
        }
    </style>

    <script>
        const carruseles = {
            'deportivos': {
                index: 0,
                element: document.querySelector('#carrusel-deportivos'),
                total: <?= count($categorias['Deportivos']) ?>,
                indicadores: document.querySelector('#indicadores-deportivos')
            },
            'moto': {
                index: 0,
                element: document.querySelector('#carrusel-moto'),
                total: <?= count($categorias['Moto']) ?>,
                indicadores: document.querySelector('#indicadores-moto')
            },
            'artisticos': {
                index: 0,
                element: document.querySelector('#carrusel-artisticos'),
                total: <?= count($categorias['Artísticos']) ?>,
                indicadores: document.querySelector('#indicadores-artisticos')
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
            carrusel.addEventListener('mousedown', (e) => {
                currentCarrusel = Array.from(carruseles).find(([key, val]) => val.element === e.currentTarget)[0];
                const carruselData = carruseles[currentCarrusel];

                if (e.type === 'touchstart') {
                    startPos = e.touches[0].clientX;
                } else {
                    startPos = e.clientX;
                    e.preventDefault();
                }

                isDragging = true;
                carruselData.element.classList.add('grabbing');
                animationID = requestAnimationFrame(animation);
            });

            carrusel.addEventListener('touchstart', (e) => {
                currentCarrusel = Array.from(carruseles).find(([key, val]) => val.element === e.currentTarget)[0];
                startPos = e.touches[0].clientX;
                isDragging = true;
                carrusel.classList.add('grabbing');
                animationID = requestAnimationFrame(animation);
            });

            carrusel.addEventListener('mouseup', dragEnd);
            carrusel.addEventListener('touchend', dragEnd);
            carrusel.addEventListener('mousemove', drag);
            carrusel.addEventListener('touchmove', drag);
            carrusel.addEventListener('mouseleave', dragEnd);
        });

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