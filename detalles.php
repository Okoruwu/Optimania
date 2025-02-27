<?php session_start();

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


$pedidoAbierto = $db->getAllRecords('pedidos', '*', 'AND usuario=' . ($UserData['id']) . ' AND status=1', 'LIMIT 1');

//EL PRODUCTO NO EXISTE ERROR UPS
if (!empty($pedidoAbierto)) {

    //SI EXISTE, TOMAMOS TODA SU INFORMACIÓN
    $pedidoAbierto = $pedidoAbierto[0];

    //AHORA VERIFICAMOS SI EL USUARIO TIENE UN PEDIDO ABIERTO
    $prodCarrito = $db->getAllRecords('productosenpedido', '*', 'AND pedido=' . ($pedidoAbierto['id']) . '', 'LIMIT ' . ($pedidoAbierto['productosCount']) . '');
} else {
    $prodCarrito = 0;
}

if (!isset($prodCarrito)) {
    setcookie("msg", "sincar", time() + 1, "/");
    header('Location: /');
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




        <div class="ps-checkout">
            <div class="container">

                <h3 class="ps-checkout__title">Completa tu información:</h3>
                <div class="ps-checkout__content">

                    <form action="/pagar/" method="post">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="ps-checkout__form">
                                    <h3 class="ps-checkout__heading">Detalles de compra</h3>
                                    <div class="row">

                                        <div class="col-12 col-md-12">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Nombre completo*</label>
                                                <input class="ps-input" name="nombre" type="text" value="<?php echo $UserData['nombre']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Correo electrónico*</label>
                                                <input class="ps-input" name="email" type="email" value="<?php echo $UserData['email']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Teléfono*</label>
                                                <input class="ps-input" name="telefono" type="tel" value="<?php echo $pedidoAbierto['telefono']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Dirección</label>
                                                <input class="ps-input" name="direccion" type="text" value="<?php echo $pedidoAbierto['direccion']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Estado</label>
                                                <select name="estado" style="border-radius: 40px; width: 100%; height: 44px; background-color: #f0f2f5; border-color: #f0f2f5; color: #5b6c8f; font-size: 14px; padding: 10px 25px;">
                                                    <option value="">Selecciona un estado</option>
                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Coahuila">Coahuila</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Ciudad de México">Ciudad de México</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="México">México</option>
                                                    <option value="Michoacán">Michoacán</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                                    <option value="Sinaloa">Sinaloa</option>
                                                    <option value="Sonora">Sonora</option>
                                                    <option value="Tabasco">Tabasco</option>
                                                    <option value="Tamaulipas">Tamaulipas</option>
                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                    <option value="Veracruz">Veracruz</option>
                                                    <option value="Yucatán">Yucatán</option>
                                                    <option value="Zacatecas">Zacatecas</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Ciudad</label>
                                                <input class="ps-input" name="ciudad" type="text" value="<?php echo $pedidoAbierto['ciudad']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="ps-checkout__group">
                                                <label class="ps-checkout__label">Comentarios</label>
                                                <textarea name="comentarios" class="ps-textarea" rows="7" placeholder="Ingresa algun comentario adicional."><?php echo $pedidoAbierto['comentarios']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="ps-checkout__order">
                                    <h3 class="ps-checkout__heading">Tu orden</h3>


                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Producto</div>
                                        <div class="ps-title">Subtotal</div>
                                    </div>


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

                                        <div class="ps-checkout__row ps-product">
                                            <div class="ps-product__name"><?php echo ($prodSel['nombre']); ?> x <span><?php echo ($producto['cantidad']) ?></span></div>
                                            <div class="ps-product__price">$<?php echo number_format($totalSel, 2) ?></div>
                                        </div>

                                    <?php
                                    }
                                    ?>


                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Subtotal</div>
                                        <div class="ps-product__price">$<?php echo number_format($total, 2) ?></div>
                                    </div>
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Costo de envío:</div>
                                        <div class="ps-product__price">$<?php echo number_format($envio, 2) ?></div>
                                    </div>

                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Total</div>
                                        <div class="ps-product__price"><?php echo number_format($total + $envio, 2) ?></div>
                                    </div>
                                    <div class="ps-checkout__payment">
                                        <input hidden type="text" name="total" value="<?php echo ($total+$envio)?>">
                                        <button name="submit" type="submit" value="submit" class="ps-btn ps-btn--warning">Pagar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>















    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/agendar.php"); ?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>


</body>



</html>