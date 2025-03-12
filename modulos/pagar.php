<?php
require_once '../resources/carrito_functions.php';

if (empty($_SESSION['carrito'])) {
    header('Location: carrito.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    unset($_SESSION['carrito']);
    $orden_exitosa = true;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../resources/head.php'; ?>
    <link rel="stylesheet" href="../css/home-23.css">
    <title>Pagar - Optimania</title>

</head>

<body>
    <?php include '../resources/navbar.php'; ?>

    <section class="py-5" style="background: #f8f9fa;">
        <div class="checkout-container">
            <?php if (isset($orden_exitosa)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-check-circle fa-4x mb-4" style="color: #33b1e3;"></i>
                    <h1 class="display-5 fw-bold mb-3" style="color: #2D3436;">¡Pago Exitoso!</h1>
                    <p class="lead mb-4">Tu orden ha sido procesada correctamente</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="productos.php" class="btn btn-warning">
                            <i class="fas fa-arrow-left me-2"></i>Seguir comprando
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="row g-5">

                    <div class="col-lg-7">
                        <form method="POST" class="form-checkout">
                            <h2 class="h3 fw-bold mb-4" style="color: #33b1e3;">Información de Contacto</h2>

                            <div class="input-group">
                                <label>Nombre completo</label>
                                <input type="text" name="nombre" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label>Correo electrónico</label>
                                        <input type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label>Teléfono</label>
                                        <input type="tel" name="telefono" required>
                                    </div>
                                </div>
                            </div>

                            <h2 class="h3 fw-bold mt-5 mb-4" style="color: #33b1e3;">Dirección de Envío</h2>

                            <div class="input-group">
                                <label>Dirección</label>
                                <input type="text" name="direccion" required>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <label>Ciudad</label>
                                        <input type="text" name="ciudad" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <label>Estado</label>
                                        <select name="estado" required>
                                            <option value="">Seleccionar...</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <label>Código Postal</label>
                                        <input type="text" name="codigo_postal" required>
                                    </div>
                                </div>
                            </div>

                            <h2 class="h3 fw-bold mt-5 mb-4" style="color: #33b1e3;">Método de Pago</h2>

                            <div class="metodo-pago active">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="metodo_pago" id="tarjeta"
                                        value="tarjeta" checked>
                                    <label class="form-check-label" for="tarjeta">
                                        Tarjeta de Crédito/Débito
                                    </label>
                                </div>

                                <div class="mt-3" id="datos-tarjeta">
                                    <div class="input-group">
                                        <label>Número de tarjeta</label>
                                        <input type="text" pattern="\d{16}" placeholder="1234 5678 9012 3456" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label>Fecha de expiración</label>
                                                <input type="text" pattern="\d{2}/\d{2}" placeholder="MM/AA" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label>CVV</label>
                                                <input type="text" pattern="\d{3}" placeholder="123" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-warning w-100 mt-4 py-3">
                                <i class="fas fa-lock me-2"></i>Pagar $<?= number_format(calcularTotal(), 2) ?>
                            </button>
                        </form>
                    </div>


                    <div class="col-lg-5">
                        <div class="resumen-pago">
                            <h3 class="h4 fw-bold mb-4" style="color: #f18500;">Resumen de tu orden</h3>

                            <?php foreach ($_SESSION['carrito'] as $item): ?>
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <h6 class="mb-0"><?= $item['nombre'] ?></h6>
                                        <small class="text-muted">Cantidad: <?= $item['cantidad'] ?></small>
                                    </div>
                                    <span>$<?= number_format($item['precio'] * $item['cantidad'], 2) ?></span>
                                </div>
                            <?php endforeach; ?>

                            <hr class="my-4">

                            <div class="d-flex justify-content-between mb-3">
                                <span>Subtotal:</span>
                                <span>$<?= number_format(calcularTotal(), 2) ?></span>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <span>Envío:</span>
                                <span class="text-success">Gratis</span>
                            </div>

                            <div class="d-flex justify-content-between fw-bold h5">
                                <span>Total:</span>
                                <span style="color: #33b1e3;">$<?= number_format(calcularTotal(), 2) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include '../resources/footer.php'; ?>

    <script src="../js/pay.js"></script>
</body>

</html>