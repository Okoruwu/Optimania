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


    <script src="../js/lenSOL.js"> </script>
</body>

</html>