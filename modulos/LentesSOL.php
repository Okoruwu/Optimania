<?php
include '../resources/head.php';
include '../resources/carrito_functions.php';

$categorias = [
    'Deportivos' => [
        ['id' => hash('crc32', 'Dep1'), 'nombre' => 'Sport Extreme', 'precio' => 2499, 'imagen' => '../img/lentes/sol1.jpg', 'detalles' => ['Montura flexible', 'Lentes espejados', 'Sistema de ventilación', 'Correa ajustable']],
        ['id' => hash('crc32', 'Dep2'), 'nombre' => 'Cycling Pro', 'precio' => 2199, 'imagen' => '../img/lentes/sol2.jpg', 'detalles' => ['Lentes fotocromáticos', 'Protección lateral', 'Material ultraligero', 'Anti-empañante']]
    ],
    'Moto' => [
        ['id' => hash('crc32', 'Moto1'), 'nombre' => 'Rider Shield Pro', 'precio' => 2899, 'imagen' => '../img/lentes/sol3.jpg', 'detalles' => ['Protección integral', 'Visión periférica', 'Cierre hermético', 'Lentes intercambiables']],
        ['id' => hash('crc32', 'Moto2'), 'nombre' => 'SpeedMaster X', 'precio' => 3199, 'imagen' => '../img/lentes/sol4.jpg', 'detalles' => ['Diseño aerodinámico', 'Tecnología anti-vibración', 'Material irrompible', 'Ventilación direccional']]
    ],
    'Artísticos' => [
        ['id' => hash('crc32', 'Art1'), 'nombre' => 'Retro Vintage', 'precio' => 1999, 'imagen' => '../img/lentes/sol5.jpg', 'detalles' => ['Diseño único', 'Montura artesanal', 'Lentes degradados', 'Edición limitada']],
        ['id' => hash('crc32', 'Art2'), 'nombre' => 'Avant Garde', 'precio' => 2499, 'imagen' => '../img/lentes/sol6.jpg', 'detalles' => ['Formas geométricas', 'Colores personalizados', 'Materiales mixtos', 'Estuche de colección']]
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
                                        <p class="modelo-precio" style="color: #f18500;">
                                            $<?= number_format($lente['precio'], 2) ?> MXN</p>
                                        <ul class="detalles-lista">
                                            <?php foreach ($lente['detalles'] as $detalle): ?>
                                                <li>✔️ <?= $detalle ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <form method="POST" class="form-agregar-carrito">
                                            <input type="hidden" name="accion_carrito" value="agregar">
                                            <input type="hidden" name="producto_id" value="<?= $lente['id'] ?>">
                                            <input type="hidden" name="producto_nombre" value="<?= $lente['nombre'] ?>">
                                            <input type="hidden" name="producto_precio" value="<?= $lente['precio'] ?>">
                                            <input type="hidden" name="producto_imagen" value="<?= $lente['imagen'] ?>">
                                            <button type="submit" class="btn btn-warning mt-3">
                                                <i class="fa fa-cart-plus mr-2"></i>Añadir al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
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
                                        <p class="modelo-precio" style="color: #f18500;">
                                            $<?= number_format($lente['precio'], 2) ?> MXN</p>
                                        <ul class="detalles-lista">
                                            <?php foreach ($lente['detalles'] as $detalle): ?>
                                                <li>✔️ <?= $detalle ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <form method="POST" class="form-agregar-carrito">
                                            <input type="hidden" name="accion_carrito" value="agregar">
                                            <input type="hidden" name="producto_id" value="<?= $lente['id'] ?>">
                                            <input type="hidden" name="producto_nombre" value="<?= $lente['nombre'] ?>">
                                            <input type="hidden" name="producto_precio" value="<?= $lente['precio'] ?>">
                                            <input type="hidden" name="producto_imagen" value="<?= $lente['imagen'] ?>">
                                            <button type="submit" class="btn btn-warning mt-3">
                                                <i class="fa fa-cart-plus mr-2"></i>Añadir al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
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
                                        <p class="modelo-precio" style="color: #f18500;">
                                            $<?= number_format($lente['precio'], 2) ?> MXN</p>
                                        <ul class="detalles-lista">
                                            <?php foreach ($lente['detalles'] as $detalle): ?>
                                                <li>✔️ <?= $detalle ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <form method="POST" class="form-agregar-carrito">
                                            <input type="hidden" name="accion_carrito" value="agregar">
                                            <input type="hidden" name="producto_id" value="<?= $lente['id'] ?>">
                                            <input type="hidden" name="producto_nombre" value="<?= $lente['nombre'] ?>">
                                            <input type="hidden" name="producto_precio" value="<?= $lente['precio'] ?>">
                                            <input type="hidden" name="producto_imagen" value="<?= $lente['imagen'] ?>">
                                            <button type="submit" class="btn btn-warning mt-3">
                                                <i class="fa fa-cart-plus mr-2"></i>Añadir al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../resources/footer.php'; ?>
    <?php include '../resources/JS.php'; ?>

    <script src="../js/lenSOL.js"></script>

    <script>
        document.querySelectorAll('.form-agregar-carrito').forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                try {
                    const response = await fetch('', {
                        method: 'POST',
                        body: new FormData(form)
                    });

                    const badge = document.querySelector('#cart-mini .badge');
                    badge.textContent = <?= cantidadProductos() ?>;

                    const button = form.querySelector('button');
                    const originalHTML = button.innerHTML;
                    button.innerHTML = '<i class="fa fa-check mr-2"></i>¡Agregado!';
                    button.classList.add('btn-success');
                    button.classList.remove('btn-warning');

                    setTimeout(() => {
                        button.innerHTML = originalHTML;
                        button.classList.remove('btn-success');
                        button.classList.add('btn-warning');
                    }, 2000);

                } catch (error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
</body>

</html>