<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

if (isset($_SESSION["UserId"])) {
    $UserData = $db->getAllRecords('usuarios', '*', ' AND id = "' . $_SESSION["UserId"] . '" LIMIT 1')[0];
} else {
    setcookie("msg", "log", time() + 1, "/");
    header('Location: /acceder');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optimania</title>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/css.php"); ?>
</head>

<body>
    <div class="ps-page">

        <?php
        //MENSAJES DE ESTATUS
        if (isset($_COOKIE["msg"])) {
            require_once($_SERVER["DOCUMENT_ROOT"] . "/include/msg.php");
        } ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/header.php"); ?>



        <section class="ps-section--latest pt-4 mt-4 mb-40">
            <div class="container-fluid">
                <img src="/lentes/banner.jpg" alt="" class="img-fluid mb-4"></a>

            </div>
        </section>

        <div class="ps-shopping">
            <div class="container">


                <?php
                if (!isset($prodCarrito)) {
                ?>


                    <h3 class="ps-shopping__title">Tu carrito está vacío.
                        <br><sup><a href="/lentes/sol/tamano/">Ver catalogo</a></sup>
                    </h3>

                    <?php
                } else {
                    if (($prodCarrito) > 0) { ?>



                        <h3 class="ps-shopping__title">Carrito <sup>(<?php echo $pedidoAbierto['productosCount'] ?>)</sup></h3>
                        <div class="ps-shopping__content">
                            <div class="row">
                                <div class="col-12 col-md-7 col-lg-9">
                                    <ul class="ps-shopping__list">


                                        <ul class="ps-shopping__list">

                                            <?php
                                            $total = 0;
                                            $envio = 200;
                                            foreach ($prodCarrito as $producto) {
                                                $prodSel = $db->getAllRecords('productos', '*', 'AND id=' . ($producto['producto']) . '', 'LIMIT 1');
                                                $prodSel = $prodSel[0];
                                                $totalSel = ($prodSel['precioPub']) * ($producto['cantidad']);
                                                $total += $totalSel;

                                                if ($total > 3000) {
                                                    $envio = 0;
                                                }
                                            ?>


                                                <li>
                                                    <div class="ps-product ps-product--wishlist">
                                                        <div class="ps-product__remove"><a href="#"><i class="icon-cross"></i></a></div>
                                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                                                <figure><img src="/upload/productos/<?php echo (strftime("%Y/%m", strtotime(($prodSel['fr'])))); ?>/<?php echo ($prodSel['fPortada']) ?>.jpg" alt="alt" />
                                                                </figure>
                                                            </a></div>
                                                        <div class="ps-product__content">
                                                            <h5 class="ps-product__title"><a href="/producto/<?php echo ($prodSel['id']) ?>"><?php echo ($prodSel['nombre']) ?></a></h5>
                                                            <div class="ps-product__row">
                                                                <div class="ps-product__label">Price:</div>
                                                                <div class="ps-product__value"><span class="ps-product__price">$<?php echo number_format($prodSel['precioPub'], 2) ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="ps-product__row ps-product__stock">
                                                                <div class="ps-product__label">Stock:</div>
                                                                <div class="ps-product__value"><span class="ps-product__in-stock">In Stock</span>
                                                                </div>
                                                            </div>
                                                            <div class="ps-product__cart">
                                                                <button class="ps-btn">Add to cart</button>
                                                            </div>
                                                            <div class="ps-product__row ps-product__quantity">
                                                                <div class="ps-product__label">Quantity:</div>
                                                                <div class="ps-product__value"><?php echo ($producto['cantidad']) ?></div>
                                                            </div>
                                                            <div class="ps-product__row ps-product__subtotal">
                                                                <div class="ps-product__label">Subtotal:</div>
                                                                <div class="ps-product__value">$<?php echo number_format($totalSel, 2) ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>


                                            <?php
                                            }
                                            ?>



                                        </ul>


                                    </ul>
                                    <div class="ps-shopping__table">
                                        <table class="table ps-table ps-table--product">
                                            <thead>
                                                <tr>
                                                    <th class="ps-product__remove"></th>
                                                    <th class="ps-product__thumbnail"></th>
                                                    <th class="ps-product__name">Producto</th>
                                                    <th class="ps-product__meta">Precio</th>
                                                    <th class="ps-product__quantity">Cantidad</th>
                                                    <th class="ps-product__subtotal">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $total = 0;
                                                $envio = 200;
                                                foreach ($prodCarrito as $producto) {
                                                    $prodSel = $db->getAllRecords('productos', '*', 'AND id=' . ($producto['producto']) . '', 'LIMIT 1');
                                                    $prodSel = $prodSel[0];
                                                    $totalSel = ($prodSel['precioPub']) * ($producto['cantidad']);
                                                    $total += $totalSel;

                                                    if ($total > 3000) {
                                                        $envio = 0;
                                                    }
                                                ?>
                                                    <tr>
                                                        <td class="ps-product__remove"> <a href="#"><i class="icon-cross"></i></a></td>
                                                        <td class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                                                <figure><img src="/upload/productos/<?php echo (strftime("%Y/%m", strtotime(($prodSel['fr'])))); ?>/<?php echo ($prodSel['fPortada']) ?>.jpg" alt></figure>
                                                            </a></td>
                                                        <td class="ps-product__name"> <a href="/producto/<?php echo ($prodSel['id']) ?>"><?php echo ($prodSel['nombre']) ?></a></td>
                                                        <td class="ps-product__meta"> <span class="ps-product__price sale">$<?php echo number_format($prodSel['precioPub'], 2) ?></span><span class="ps-product__del">$<?php echo number_format($prodSel['precioSinDesc'], 2) ?></span>
                                                        </td>
                                                        <td class="ps-product__quantity">
                                                            <div class="def-number-input number-input safari_only">
                                                                <a href="/carrito/quitar/producto?delId=<?php echo ($prodSel['id']) ?>" style="margin-left: 25px;" class="minus"><i class="icon-minus"></i></a>
                                                                <input class="quantity" min="0" name="quantity" value="<?php echo ($producto['cantidad']) ?>" type="number">
                                                                <a href="/carrito/agregar/producto?addId=<?php echo ($prodSel['id']) ?>" style="margin-left: 5px;" class="plus"><i class="icon-plus"></i></a>
                                                            </div>
                                                        </td>
                                                        <td class="ps-product__subtotal">$<?php echo number_format($totalSel, 2) ?></td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>




                                            </tbody>
                                        </table>
                                    </div>

                                </div>


                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="ps-shopping__label">Detalles</div>
                                    <div class="ps-shopping__box">
                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">Subtotal</div>
                                            <div class="ps-shopping__price">$<?php echo number_format($total, 2) ?></div>
                                        </div>


                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">Impuestos</div>
                                            <div class="ps-shopping__price">$0.00</div>
                                        </div>


                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">Envío</div>
                                            <div class="ps-shopping__price">$<?php echo number_format($envio, 2) ?></div>
                                        </div>

                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">Total</div>
                                            <div class="ps-shopping__price">$<?php echo number_format($total + $envio, 2) ?></div>
                                        </div>
                                        <div class="ps-shopping__checkout"><a class="ps-btn ps-btn--warning" href="/detalles">Finalizar compra</a><a class="ps-shopping__link" href="/lentes/sol/tamano/">Seguir comprando</a></div>
                                    </div>
                                </div>
                            </div>


                        <?php

                    } else {
                        ?>
                    <?php
                    }
                }  ?>

                        </div>
            </div>
        </div>
    </div>










    </div>






    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/agendar.php"); ?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>


</body>



</html>