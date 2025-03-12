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

    <script src="../js/lenOFT.js"> </script>
</body>

</html>