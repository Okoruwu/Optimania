<!DOCTYPE html>
<html lang="en">
<?php
include '../resources/head.php';

$tiendas = [
    [
        'nombre' => 'Las Americas Ecatepec',
        'distancia' => '71 km',
        'direccion' => 'Av. Central S/N., Las Américas, Ecatepec de Morelos, Méx, S/N Fraccionamiento Las Americas, CPI 55076',
        'referencia' => 'En la nueva sección de la plaza comercial, enfrente de DAX en el pasillo del costado de Liverpool',
        'horario' => 'Lunes a domingo - 11:00 am a 8:00 pm',
        'imagen' => '../img/sucursales/ejemplo.jpg',
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3760.808635306339!2d-99.11790798561684!3d19.5041865868544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f8c1a1d1f7a5%3A0x9e6d7c9b6e7e7b1a!2sOptimania!5e0!3m2!1ses!2smx!4v1622545000000!5m2!1ses!2smx'
    ],
    [
        'nombre' => 'Aragon',
        'distancia' => '10.9 km',
        'direccion' => 'Av. Carlos Hank González 120 CPI 55140 Estado de México (MX), México',
        'referencia' => 'A un costado de Gameplanet',
        'horario' => 'lunes a domingo - 11:00 am a 8:00 pm',
        'imagen' => '../img/sucursales/ejemplo2.jpg',
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.2345678901234!2d-99.12345678901234!3d19.432608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f8c1a1d1f7a5%3A0x9e6d7c9b6e7e7b1a!2sOptimania!5e0!3m2!1ses!2smx!4v1622545000000!5m2!1ses!2smx'
    ]
];
?>

<body>
    <?php include '../resources/navbar.php'; ?>

    <section class="agenda-examen py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">

                    <div class="banner-principal mb-5">
                        <img src="../img/BannerSucursales.png" alt="Banner promocional - Examen de la vista gratis"
                            class="img-fluid rounded-lg shadow" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>


                    <div class="text-center mb-5">
                        <h1 class="display-4 mb-3" style="color: #33b1e3; font-weight: 800;">Agenda tu examen de la
                            vista ¡es gratis!</h1>
                        <h2 class="h4" style="color: #f18500;">Ven a conocer todos los modelitos</h2>
                    </div>

                    <div class="row">

                        <div class="col-md-6 pr-lg-4">
                            <div class="tiendas-list" style="max-height: 70vh; overflow-y: auto; padding-right: 15px;">
                                <h3 class="mb-4"><?= count($tiendas) ?> Tiendas disponibles</h3>

                                <?php foreach ($tiendas as $tienda): ?>
                                    <div class="tienda-card mb-4 p-4 border rounded bg-white"
                                        onclick="actualizarMapa('<?= htmlspecialchars($tienda['mapa'], ENT_QUOTES) ?>')">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h4 class="h5 mb-0" style="color: #33b1e3;"><?= $tienda['nombre'] ?></h4>
                                            <span class="badge badge-secondary"><?= $tienda['distancia'] ?></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="<?= $tienda['imagen'] ?>" class="img-fluid mb-3 rounded"
                                                    alt="Imagen de la sucursal"
                                                    style="height: 150px; object-fit: cover; width: 100%;">
                                            </div>
                                        </div>
                                        <p class="text-muted mb-1"><?= $tienda['direccion'] ?></p>
                                        <p class="small mb-2"><strong>Referencia:</strong> <?= $tienda['referencia'] ?></p>
                                        <p class="mb-3"><strong>Horario:</strong> <?= $tienda['horario'] ?></p>
                                        <button class="btn btn-outline-secondary btn-sm"
                                            onclick="event.stopPropagation(); actualizarMapa('<?= htmlspecialchars($tienda['mapa'], ENT_QUOTES) ?>')">
                                            Ver Mapa
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>


                        <div class="col-md-6 pl-lg-4">
                            <div class="sticky-top" style="top: 20px;">
                                <div class="border rounded bg-white p-3">
                                    <h4 class="h5 mb-3" style="color: #33b1e3;">Ubicación seleccionada</h4>
                                    <div id="mapContainer" style="height: 600px; background: #f5f5f5;">
                                        <iframe id="dynamicMap" src="<?= $tiendas[0]['mapa'] ?>" width="100%"
                                            height="100%" style="border:0;" allowfullscreen loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="recordatorios mt-5 p-4 rounded" style="background: #e3f2fd; border: 2px solid #33b1e3;">
                        <h4 class="h5 mb-3" style="color: #33b1e3;">Recuerda:</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fa fa-check-circle text-success mr-2"></i>
                                El examen de la vista es gratis, realizado por optometristas calificados
                            </li>
                            <li class="mb-3">
                                <i class="fa fa-shopping-bag text-primary mr-2"></i>
                                No necesitas agendar para recoger tu orden o probarte cualquier de los lentes
                                disponibles en las tiendas
                            </li>
                            <li>
                                <i class="fa fa-globe text-info mr-2"></i>
                                Puedes comprar en línea y acudir al examen de la vista después o enviar tu receta por
                                correo hola.optimania@optimania.com.mx
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../resources/footer.php'; ?>
    <?php include '../resources/JS.php'; ?>

    <script src="../js/sub.js"> </script>


</body>

</html>