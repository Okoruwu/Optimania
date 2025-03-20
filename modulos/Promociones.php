<!DOCTYPE html>
<html lang="en">
<?php
include '../resources/head.php';

$promociones = [
    'destacadas' => [
        [
            'titulo' => '2x1 en Lentes de Sol',
            'imagen' => '../img/promo/promosol.jpg',
            'vigencia' => 'Hasta el 30 de junio',
            'condiciones' => 'Aplican modelos seleccionados'
        ],
        [
            'titulo' => 'Armazón Gratis',
            'imagen' => '../img/promo/promoarmazon.jpg',
            'vigencia' => 'Todo el mes de julio',
            'condiciones' => 'En compra de lentes oftálmicos'
        ]
    ],
    'categorias' => [
        'Oftálmicos' => [
            [
                'nombre' => 'Protección Blue Light',
                'precio' => '1,299',
                'descuento' => '40%',
                'imagen' => '../img/promo/pro1.jpg'
            ],
            [
                'nombre' => 'Multifocales Premium',
                'precio' => '2,499',
                'descuento' => '30%',
                'imagen' => '../img/promo/pro2.jpg'
            ]
        ],
        'Sol' => [
            [
                'nombre' => 'Polarizados Elite',
                'precio' => '1,599',
                'descuento' => '25%',
                'imagen' => '../img/promo/pro3.png'
            ],
            [
                'nombre' => 'Deportivos UltraResist',
                'precio' => '1,899',
                'descuento' => '35%',
                'imagen' => '../img/promo/pro4.jpg'
            ]
        ]
    ]
];
?>

<body>
    <?php include '../resources/navbar.php'; ?>

    <section class="promociones-opti py-5">

        <div class="promo-hero mb-5"
            style="background: linear-gradient(rgba(51, 177, 227, 0.9), rgba(241, 133, 0, 0.8)), url('../img/promos/hero-promos.jpg') center/cover;">
            <div class="container text-center text-white py-5">
                <h1 class="display-4 mb-3 fw-bold">¡Promociones que verás mejor!</h1>
                <p class="h4 mb-4">Aprovecha nuestros descuentos especiales</p>
                <div class="countdown-timer mb-4">
                    <div class="d-flex justify-content-center gap-3">
                        <div class="countdown-item bg-white text-dark p-2 rounded">
                            <div class="display-4 fw-bold" id="dias">05</div>
                            <small>DÍAS</small>
                        </div>
                        <div class="countdown-item bg-white text-dark p-2 rounded">
                            <div class="display-4 fw-bold" id="horas">12</div>
                            <small>HORAS</small>
                        </div>
                        <div class="countdown-item bg-white text-dark p-2 rounded">
                            <div class="display-4 fw-bold" id="minutos">30</div>
                            <small>MIN</small>
                        </div>

                        <div class="countdown-item bg-white text-dark p-2 rounded">
                            <div class="display-4 fw-bold" id="segundos">00</div>
                            <small>SEG</small>
                        </div>
                    </div>
                </div>
                <a href="#ofertas" class="btn btn-light btn-lg px-5 py-3 fw-bold">
                    Ver todas las ofertas <i class="fa fa-arrow-down ms-2"></i>
                </a>
            </div>
        </div>


        <div class="container" id="ofertas">
            <h2 class="text-center mb-5 display-5 fw-bold" style="color: #33b1e3;">Ofertas Destacadas</h2>
            <div class="row g-4 mb-5">
                <?php foreach ($promociones['destacadas'] as $promo): ?>
                    <div class="col-md-6">
                        <div class="card promo-card h-100 border-0 shadow-lg overflow-hidden">
                            <img src="<?= $promo['imagen'] ?>" class="card-img-top" alt="<?= $promo['titulo'] ?>"
                                style="height: 300px; object-fit: cover;">
                            <div class="card-body bg-white p-4">
                                <h3 class="h2 fw-bold" style="color: #f18500;"><?= $promo['titulo'] ?></h3>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-0 text-muted"><?= $promo['vigencia'] ?></p>
                                        <small class="text-muted"><?= $promo['condiciones'] ?></small>
                                    </div>
                                    <button class="btn btn-warning px-4 py-2">Aplicar ahora</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


            <?php foreach ($promociones['categorias'] as $categoria => $items): ?>
                <div class="mb-5">
                    <h3 class="h1 mb-4 fw-bold" style="color: #33b1e3;"><?= $categoria ?></h3>
                    <div class="promo-carousel">
                        <?php foreach ($items as $item): ?>
                            <div class="promo-card">
                                <div class="badge-promo bg-danger text-white position-absolute m-2 px-3 py-2 rounded">
                                    <?= $item['descuento'] ?> OFF
                                </div>
                                <img src="<?= $item['imagen'] ?>" class="card-img-top" alt="<?= $item['nombre'] ?>"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold"><?= $item['nombre'] ?></h5>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                    <span class="text-muted text-decoration-line-through">
                                     $<?= isset($item['precio']) && is_numeric($item['precio']) ? number_format($item['precio'] * 1.3, 0) : '0' ?> MXN
                                    </span>
                                        <span class="h4 text-danger fw-bold">$<?= $item['precio'] ?> MXN</span>
                                    </div>
                                    <button class="btn btn-outline-warning mt-3 w-100">
                                        <i class="fa fa-cart-plus me-2"></i>Agregar
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>


            <div class="newsletter-promo bg-light py-5 mt-5 rounded-3">
                <div class="container text-center">
                    <h3 class="h1 fw-bold mb-4" style="color: #33b1e3;">¡No te pierdas ninguna promoción!</h3>
                    <p class="h5 mb-4">Suscríbete y recibe ofertas exclusivas</p>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form class="input-group">
                                <input type="email" class="form-control form-control-lg"
                                    placeholder="Ingresa tu correo">
                                <button class="btn btn-warning btn-lg" type="submit">
                                    Suscribirme <i class="fa fa-arrow-right ms-2"></i>
                                </button>
                            </form>
                            <small class="text-muted mt-2 d-block">Recibirás un 10% de descuento en tu primera
                                compra</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../resources/footer.php'; ?>
    <?php include '../resources/JS.php'; ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

   
   
    <script src="../js/promo.js"></script>  

</body>

</html>