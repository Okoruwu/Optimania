<?php
require_once '../resources/carrito_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion_carrito'])) {
        switch ($_POST['accion_carrito']) {
            case 'actualizar':
                foreach ($_POST['cantidad'] as $id => $cantidad) {
                    $index = array_search($id, array_column($_SESSION['carrito'], 'id'));
                    if ($index !== false && $cantidad > 0) {
                        $_SESSION['carrito'][$index]['cantidad'] = $cantidad;
                    }
                }
                break;

            case 'eliminar':
                $index = array_search($_POST['producto_id'], array_column($_SESSION['carrito'], 'id'));
                if ($index !== false) {
                    array_splice($_SESSION['carrito'], $index, 1);
                }
                break;

            case 'vaciar':
                unset($_SESSION['carrito']);
                break;
        }
        header('Location: carrito.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../resources/head.php'; ?>
    <title>Carrito de Compras - Optimania</title>
    <style>
        .cart-table img {
            max-width: 80px;
            border-radius: 8px;
        }

        .quantity-input {
            width: 70px;
            text-align: center;
        }

        .cart-totals {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 2rem;
        }

        .btn-eliminar {
            color: #dc3545;
            transition: all 0.3s ease;
        }

        .btn-eliminar:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <?php include '../resources/navbar.php'; ?>

    <section class="py-5">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4" style="color: #33b1e3;">Tu Carrito</h1>

            <?php if (!empty($_SESSION['carrito'])): ?>
                <form method="POST">
                    <input type="hidden" name="accion_carrito" value="actualizar">

                    <div class="table-responsive">
                        <table class="table cart-table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['carrito'] as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= $item['imagen'] ?>" alt="<?= $item['nombre'] ?>">
                                                <h5 class="ms-3 mb-0"><?= $item['nombre'] ?></h5>
                                            </div>
                                        </td>
                                        <td>$<?= number_format($item['precio'], 2) ?></td>
                                        <td>
                                            <input type="number" name="cantidad[<?= $item['id'] ?>]"
                                                value="<?= $item['cantidad'] ?>" min="1" class="form-control quantity-input">
                                        </td>
                                        <td>$<?= number_format($item['precio'] * $item['cantidad'], 2) ?></td>
                                        <td>
                                            <form method="POST">
                                                <input type="hidden" name="accion_carrito" value="eliminar">
                                                <input type="hidden" name="producto_id" value="<?= $item['id'] ?>">
                                                <button type="submit" class="btn btn-link btn-eliminar">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-sync-alt me-2"></i>Actualizar Carrito
                        </button>

                        <form method="POST">
                            <input type="hidden" name="accion_carrito" value="vaciar">
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-trash me-2"></i>Vaciar Carrito
                            </button>
                        </form>
                    </div>
                </form>

                <div class="row">
                    <div class="col-lg-5 offset-lg-7">
                        <div class="cart-totals">
                            <h3 class="h4 fw-bold mb-4" style="color: #f18500;">Resumen de Compra</h3>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span>$<?= number_format(calcularTotal(), 2) ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <span>Envío:</span>
                                <span class="text-success">Gratis</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="fw-bold">Total:</h5>
                                <h5 class="fw-bold" style="color: #33b1e3;">
                                    $<?= number_format(calcularTotal(), 2) ?>
                                </h5>
                            </div>
                            <div class="d-grid gap-3">
                                <a href="productos.php" class="btn btn-outline-warning">
                                    <i class="fas fa-arrow-left me-2"></i>Seguir Comprando
                                </a>
                                <a href="checkout.php" class="btn btn-warning">
                                    <i class="fas fa-lock me-2"></i>Pagar Ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-4x mb-4" style="color: #33b1e3;"></i>
                    <h3 class="mb-3">Tu carrito está vacío</h3>
                    <p class="text-muted mb-4">¡Explora nuestros productos y encuentra tu par ideal!</p>
                    <a href="productos.php" class="btn btn-warning btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Volver a la Tienda
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include '../resources/footer.php'; ?>

    <script>
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', (e) => {
                if (e.target.value < 1) e.target.value = 1;
            });
        });
    </script>
</body>

</html>