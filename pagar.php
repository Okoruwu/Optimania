<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");

if (isset($_SESSION["UserId"])) {
    $UserData = $db->getAllRecords('usuarios', '*', ' AND id = "' . $_SESSION["UserId"] . '" LIMIT 1')[0];
} else {
    setcookie("msg", "log", time() + 1, "/");
    header('Location: /acceder');
    exit();
}

$pedidoAbierto = $db->getAllRecords('pedidos', '*', 'AND usuario=' . ($UserData['id']) . ' AND status=1', 'LIMIT 1');

//VERIFICACION DE PEDIDO ABIERTO
if (!empty($pedidoAbierto)) {

    //SI EXISTE, TOMAMOS TODA SU INFORMACIÓN
    $pedidoAbierto = $pedidoAbierto[0];

    //AHORA VERIFICAMOS SI EL USUARIO TIENE UN PEDIDO ABIERTO
    $prodCarrito = $db->getAllRecords('productosenpedido', '*', 'AND pedido=' . ($pedidoAbierto['id']) . '', 'LIMIT ' . ($pedidoAbierto['productosCount']) . '');
} else {
    setcookie("msg", "sincar", time() + 2, "/");
    header('location: /catalogo');
    exit();
}


if (isset($_REQUEST['tokenPed'])) {

    $pedidoCancelado = $db->getAllRecords('pedidos', '*', 'AND codigo="' . ($_REQUEST['tokenPed']) . '" AND status=1 LIMIT 1');
    $pedidoCancelado = $pedidoCancelado[0];

    $InsertData    =    array(
        'status' => 2,
    );
    $update    =    $db->update('pedidos', $InsertData, array('id' => ($pedidoCancelado['id'])));

    setcookie("msg", "pedcancel", time() + 2, "/");
    header('location: /');
    exit;
}

if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {

    extract($_REQUEST);


    if (($nombre == "") & ($telefono == "") & ($email == "")) {
        setcookie("msg", "mindat", time() + 2, "/");
        header('location: /detalles');
        exit;
    } else {

        //ESTABLECEMOS LA HORA IGUAL QUE EN LOS CABOS
        date_default_timezone_set('America/Mazatlan');
        $fecha = date("Y-m-d H:i:s");

        $data    =    array(
            'nombre' => ($nombre),
            'direccion' => ($direccion),
            'telefono' => ($telefono),
            'email' => ($email),
            'estado' => ($estado),
            'ciudad' => ($ciudad),
            'comentarios' => ($comentarios),
            'fa' => ($fecha),
            'total' => ($total),

        );

        $update    =    $db->update('pedidos', $data, array('id' => ($pedidoAbierto['id'])));



        if (!$update) {

            setcookie("msg", "ups", time() + 2, "/");
            header('location:/'); //sin cambios
            exit;
        }
    }
} else {
    setcookie("msg", "confirmped", time() + 2, "/");
    header('location: /detalles');
    exit;
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

                
                <div class="ps-checkout__content">

                    <form action="/pagar/" method="post">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-4">
                                <div class="ps-checkout__order">
                                    <h3 class="ps-checkout__heading">Tus datos</h3>
                                    <p><b>Nombre:</b> <?php echo ($pedidoAbierto['nombre']) ?>
                                        <br><b>Correo electrónico:</b> <?php echo ($pedidoAbierto['email']) ?>
                                        <br><b>Teléfono:</b> <?php echo ($pedidoAbierto['telefono']) ?>
                                        <br><b>Estado:</b> <?php echo ($pedidoAbierto['estado']) ?>
                                        <br><b>Ciudad:</b> <?php echo ($pedidoAbierto['ciudad']) ?>
                                        <br><b>Direccion:</b> <?php echo ($pedidoAbierto['direccion']) ?>

                                    </p>
                                    <h3 class="ps-checkout__heading mt-4">Tu orden</h3>


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
                                        <div id="paypal-button-container"></div>
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





    <script src="https://www.paypal.com/sdk/js?client-id=AZypmdhWpEOkIEmyEeJYHGjPCOmZRcqu86qmpk9FA0w8QS_w26HR4f9VuVfDM5wL6i9G_rCLo6aJIMqB&currency=MXN"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            style: {
                color: 'gold',
                shape: 'pill',
                label: 'pay'
            },

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo ($total) ?>'
                        },
                        description: "Estás pagando por <?php echo ($totalM);
                                                        if ($totalM == 1) {
                                                            echo " producto";
                                                        } else {
                                                            echo " productos";
                                                        } ?>  de Optimania"
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    console.log(data);
                    console.log(details);
                    window.location = ('/completado?name=' + details.payer.name.given_name + '&email=' + details.payer.email_address + '&tokenPed=<?php echo $pedidoAbierto['codigo']; ?>' + '&idTran=' + details.purchase_units[0].payments.captures[0].id + '&idChekOut=' + data.orderID + '&time=' + details.purchase_units[0].payments.captures[0].update_time + '&amount=' + details.purchase_units[0].payments.captures[0].amount.value + '&currency=' + details.purchase_units[0].payments.captures[0].amount.currency_code);

                });
            },


            onCancel: function(data) {
                window.location = "/detalles"
            },


            onError: function(err) {
                window.location = "/detalles?msg=payerr"
            }


        }).render('#paypal-button-container');
    </script>

</body>



</html>