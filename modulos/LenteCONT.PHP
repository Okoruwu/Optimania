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

    <script src="../js/lenCONT.js"> </script>
</body>

</html>