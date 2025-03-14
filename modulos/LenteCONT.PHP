<?php
include '../resources/head.php';
include '../resources/carrito_functions.php';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categoria = $row['categoria'];
        $detalles = $row['detalles'] ? explode(', ', $row['detalles']) : [];

        $producto = [
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'imagen' => $row['imagen'],
            'detalles' => $detalles
        ];

        if (!isset($categorias[$categoria])) {
            $categorias[$categoria] = [];
        }

        $categorias[$categoria][] = $producto;
    }
}
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
                                        <p class="modelo-precio">$<?= number_format($lente['precio'], 2) ?> MXN</p>
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
                                        <p class="modelo-precio">$<?= number_format($lente['precio'], 2) ?> MXN</p>
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
                <h2 class="display-5 mb-4" style="color: #33b1e3; font-weight: 800;">Extras para tu paquete</h2>
                <div class="row">
                    <?php foreach ($categorias['Extras'] as $extra): ?>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card extra-card h-100 border-0 shadow-sm">
                                <img src="<?= $extra['imagen'] ?>" class="card-img-top" alt="<?= $extra['nombre'] ?>"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title" style="color: #f18500;"><?= $extra['nombre'] ?></h5>
                                    <p class="h4 text-dark mb-3">$<?= number_format($extra['precio'], 2) ?> MXN</p>
                                    <form method="POST" class="form-agregar-carrito">
                                        <input type="hidden" name="accion_carrito" value="agregar">
                                        <input type="hidden" name="producto_id" value="<?= $extra['id'] ?>">
                                        <input type="hidden" name="producto_nombre" value="<?= $extra['nombre'] ?>">
                                        <input type="hidden" name="producto_precio" value="<?= $extra['precio'] ?>">
                                        <input type="hidden" name="producto_imagen" value="<?= $extra['imagen'] ?>">
                                        <button type="submit" class="btn btn-outline-warning btn-block">
                                            <i class="fa fa-cart-plus mr-2"></i>Agregar
                                        </button>
                                    </form>
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

    <script src="../js/lenCONT.js"></script>

    <script src="../js/cartCONT.js"></script>
</body>

</html>