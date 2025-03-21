<?php

require 'vendor/autoload.php';

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;


SDK::setAccessToken("PROD_ACCESS_TOKEN");


$preference = new Preference();

$item = new Item();
$item->title = "Nombre del producto";
$item->quantity = 1;
$item->unit_price = 2.00;

$preference->items = [$item];
$preference->statement_descriptor = "Optimania";
$preference->external_reference = "Identificador_del_pago";


$preference->save();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>

<div id="wallet_container"></div>

<script>
    const mp = new MercadoPago('LLAVE_PUBLICA', {
        locale: 'es-MX'
    });

    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: '<?php echo $preference->id; ?>'
        }
    });
</script>

</body>
</html>