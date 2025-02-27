<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
if (isset($_SESSION["UserId"])) {
    $UserData = $db->getAllRecords('usuarios', '*', ' AND id = "' . $_SESSION["UserId"] . '" LIMIT 1')[0];
}

setcookie("msg", "ups", time() + 2, "/");
        header('location:/');
        exit;
//BUSQUEDA DE PRODUCTOS
//BUSQUEDA DE PRODUCTOS
//BUSQUEDA DE PRODUCTOS

if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
    $prodSel  =  $db->getAllRecords('productos', '*', ' AND id="' . $_REQUEST['id'] . '"', 'LIMIT 1');

    if (empty($prodSel)) { //SI NO EXISTE ES QUE NO HAY UN ID VALIDO Y REDIRECCIONAMOS Y LANZAMOS ERROR
        setcookie("msg", "ups", time() + 2, "/");
        header('location:/');
        exit;
    } else {
        $prodSel  =  $prodSel[0];
    }
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


       <br>
       <br>
        <div class="ps-page--product3 mt-4">
            <div class="container">
                
                <div class="ps-page__content">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-xl-7">
                                        <div class="ps-product--gallery">
                                            <div class="ps-product__thumbnail">
                                                <div class="slide"><img src="/upload/productos/<?php echo (strftime("%Y/%m", strtotime(($prodSel['fr'])))); ?>/<?php echo ($prodSel['fPortada']) ?>.jpg" alt="alt" /></div>
                                                <div class="slide"><img src="img/products/008.jpg" alt="alt" /></div>
                                                <div class="slide"><img src="img/products/009.jpg" alt="alt" /></div>
                                                <div class="slide"><img src="img/products/045.jpg" alt="alt" /></div>
                                            </div>
                                            <div class="ps-gallery--image">
                                                <div class="slide">
                                                    <div class="ps-gallery__item"><img src="/upload/productos/<?php echo (strftime("%Y/%m", strtotime(($prodSel['fr'])))); ?>/<?php echo ($prodSel['fPortada']) ?>.jpg" alt="alt" /></div>
                                                </div>
                                                <div class="slide">
                                                    <div class="ps-gallery__item"><img src="img/products/008.jpg" alt="alt" /></div>
                                                </div>
                                                <div class="slide">
                                                    <div class="ps-gallery__item"><img src="img/products/009.jpg" alt="alt" /></div>
                                                </div>
                                                <div class="slide">
                                                    <div class="ps-gallery__item"><img src="img/products/045.jpg" alt="alt" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-5">
                                        <div class="ps-product__info">
                                            <div class="ps-product__branch"><a href="#">Marca</a></div>
                                            <div class="ps-product__title"><a href="#"><?php echo $prodSel['nombre']; ?></a></div>
                                            
                                            
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>car 1</li>
                                                    <li>car 1</li>
                                                    <li>car 1</li>
                                                </ul>
                                            </div>
                                            
                                            <div class="ps-product__type">
                                                <ul class="ps-product__list">
                                                    <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text" href="#">Health</a><a class="ps-list__text" href="#">Thermometer</a>
                                                    </li>
                                                    <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">8DJ21A</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="ps-product__feature">
                                    
                                    <div class="ps-product__meta"><span class="ps-product__price sale">$89.74</span><span class="ps-product__del">$60.24</span>
                                    </div>
                                    <div class="ps-product__group">
                                        <h6>Color</h6>
                                        <div class="ps-product__color ps-select--feature"><a href="#" data-value="Gray" title="Gray" style="background-color:Gray;"></a><a href="#" data-value="Red" title="Red" style="background-color:Red;"></a><a href="#" data-value="Black" title="Black" style="background-color:Black;"></a>
                                        </div>
                                    </div>
                                    <div class="ps-product__group">
                                        <h6>Size</h6>
                                        <div class="ps-product__size ps-select--feature"> <a href="#" data-value="L" title="L">L</a><a href="#" data-value="M" title="M">M</a><a href="#" data-value="S" title="S">S</a>
                                        </div>
                                    </div>
                                    <div class="ps-product__quantity">
                                        <h6>Quantity</h6>
                                        <div class="def-number-input number-input safari_only">
                                            <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                            <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                            <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
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