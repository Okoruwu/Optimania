<?php 
session_start();  

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/include/funciones.php");

if (isset($_SESSION["UserId"])) {
    $UserData =	$db->getAllRecords('usuarios','*',' AND id="'.($_SESSION["UserId"]).'"LIMIT 1 ');
    $UserData = $UserData[0];
    //($UserData['nombres'])
    if ($UserData['fPerfil']){
        $fPerfil = '/upload/usuarios/'.(strftime("%Y/%m", strtotime(($UserData['fr'])))).'/'.($UserData['fPerfil']).'.jpg';
        } else {$fPerfil = '/upload/usuarios/default.jpg';}
}


if(isset($_REQUEST['tokenPed']) and $_REQUEST['tokenPed']!=""){
	extract($_REQUEST);
  
    
	$pedidoAbierto = $db->getAllRecords('pedidos','*','AND codigo="'.($tokenPed).'" AND status=1 LIMIT 1');
    
    if (!empty($pedidoAbierto)) {
        
        //SI EXISTE, TOMAMOS TODA SU INFORMACIÓN
        $pedidoAbierto = $pedidoAbierto [0];

        //ESTABLECEMOS LA HORA IGUAL QUE EN LOS CABOS
		date_default_timezone_set('America/Mazatlan'); 
		$fecha = date("Y-m-d H:i:s");
    
        $data	=	array(
            'namePaypal'=>$name,
            'emailPaypal'=>$email,
            'idTransPaypal'=>$idTran,
            'idChekOutPaypal'=>$idChekOut,
            'timePaypal'=>$time,
            'amountPaypal'=>$amount,
            'currencyPaypal'=>$currency,
            'status'=>3,
            'fa'=>$fecha,
            
        );
            $update	=	$db->update('pedidos',$data,array('id'=>($pedidoAbierto['id'])));
            if($update){

                $correoSMTP = $pedidoAbierto['email'];
                $nombreSMTP = $pedidoAbierto['nombre'];
                $tokenSMTP = $pedidoAbierto['codigo'];
                //CONFIRMACION DE COMPRA PSS: Oym.)%%]]jPe EMAIL: info@elshowdelasalud.com
                //CONFIRMACION DE COMPRA PSS: Oym.)%%]]jPe EMAIL: info@elshowdelasalud.com
                //require_once($_SERVER["DOCUMENT_ROOT"]."/include/confirmacionPedido.php");
                //CONFIRMACION DE COMPRA PSS: Oym.)%%]]jPe EMAIL: info@elshowdelasalud.com
                //CONFIRMACION DE COMPRA PSS: Oym.)%%]]jPe EMAIL: info@elshowdelasalud.com
                
                header('location:?tokenPed='.($_REQUEST['tokenPed']).''); //Exito en el cmabio
                exit;
            }
            else{
                header('location:/carrito?msg=erver'); //sin cambios
                exit;
            }
        
    } else { 
        
        $pedidoPagado = $db->getAllRecords('pedidos','*','AND codigo="'.($tokenPed).'" AND status=3 LIMIT 1');
        if (!empty($pedidoPagado)) {
            $pedidoPagado = $pedidoPagado [0];
            
            $prodCarrito = $db->getAllRecords('productosenpedido','*','AND pedido='.($pedidoPagado['id']).'','LIMIT '.($pedidoPagado['productosCount']).'');
            
        }  else { 
        
        header('location:/?msg=noexpe');//exito
        exit;
       }
    }
} else { 
        header('location:/?msg=ups');//exito
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
            <h3 class="ps-checkout__title text-center">¡Pedido pagado!</h3>
                <div class="ps-checkout__content">

                    <form action="/pagar/" method="post">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-4">
                                <div class="ps-checkout__order">
                                    <h3 class="ps-checkout__heading">Tus datos</h3>
                                    <p><b>Nombre:</b> <?php echo ($pedidoPagado['nombre']) ?>
                                        <br><b>Correo electrónico:</b> <?php echo ($pedidoPagado['email']) ?>
                                        <br><b>Teléfono:</b> <?php echo ($pedidoPagado['telefono']) ?>
                                        <br><b>Estado:</b> <?php echo ($pedidoPagado['estado']) ?>
                                        <br><b>Ciudad:</b> <?php echo ($pedidoPagado['ciudad']) ?>
                                        <br><b>Direccion:</b> <?php echo ($pedidoPagado['direccion']) ?>

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