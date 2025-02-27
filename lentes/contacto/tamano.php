<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
if (isset($_SESSION["UserId"])) {
    $UserData = $db->getAllRecords('usuarios', '*', ' AND id = "' . $_SESSION["UserId"] . '" LIMIT 1')[0];
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
            if(isset($_COOKIE["msg"])) {
            require_once($_SERVER["DOCUMENT_ROOT"]."/include/msg.php");
            } ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/header.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/contacto.php"); ?>

        <div class="ps-portfolio">
            <div class="container">
                <div class="ps-portfolio__content">
                    <h3 style="color: gray; font-size: 30px" class="text-center"><a style="color: #f18500;" href="/lentes/contacto/tamano">TAMAÑO</a> | <a href="/lentes/contacto/color">COLOR</a> | <a href="/lentes/contacto/material">METRIAL</a> | <a href="/lentes/contacto/forma">FORMA</a> | <a href="/lentes/contacto/marca">MARCA</a></h3>
                    <br>
                    <div class="ps-portfolio__tabs">
                        <ul class="nav nav-tabs text-center justify-content-center" id="productContentTabs" role="tablist">

                            <?php
                            $catData = $db->getAllRecords('carTamano', '*', ' ORDER BY nombre ASC');
                            if (count($catData) > 0) {
                                $y    =    '';
                                foreach ($catData as $categoria) {
                                    $y++;

                                    $active = "";

                                    if ($y == 1) {
                                        $active = "active";
                                    }

                            ?>
                                    <li class="nav-item" role="presentation"><a class="nav-link <?php echo $active; ?>" id="portfolio-all-tab" data-toggle="tab" href="#portfolio-all-<?php echo ($categoria['id']); ?>" role="tab" aria-controls="portfolio-all-<?php echo ($categoria['id']); ?>" aria-selected="true"><?php echo ($categoria['nombre']); ?></a></li>
                            <?php
                                }
                            }
                            ?>

                        </ul>

                        <div class="tab-content" id="productContent">


                            <?php
                            $catData = $db->getAllRecords('carTamano', '*', ' ORDER BY nombre ASC');
                            if (count($catData) > 0) {
                                $y    =    '';
                                foreach ($catData as $categoria) {
                                    $y++;

                                    $active = "";

                                    if ($y == 1) {
                                        $active = "show active";
                                    }
                            ?>


                                    <div class="tab-pane fade <?php echo $active; ?>" id="portfolio-all-<?php echo ($categoria['id']); ?>" role="tabpanel" aria-labelledby="portfolio-all-tab">
                                        <div class="ps-categogy--grid ps-categogy--detail">
                                            <div class="row">

                                                <?php
                                                //BUSCAMOS TODOS LOS PRODUCTOS DE ESTA CATEGORIA
                                                //categoria="1" Lentes de sol
                                                //categoria="2" Lentes de vista
                                                //categoria="3" Lentes de contacto
                                                $productosData = $db->getAllRecords('productos', '*', 'AND categoria="2" ORDER BY nombre ASC');

                                                if (count($productosData) > 0) {

                                                    foreach ($productosData as $producto) {
                                                        //REVISAMOS QUE ESTOS LENTES ESTEN EN ESTA CARACTERISTICA
                                                        $productoEnCar = $db->getAllRecords('carTamanoEnProducto', '*', 'AND producto="' . $producto['id'] . '" ORDER BY id ASC');

                                                        //SI NO ES VACIO ES QUE SI EXISTE 
                                                        if (!empty($productoEnCar)) { //SI NO EXISTE ES QUE NO HAY UN ID VALIDO Y REDIRECCIONAMOS Y LANZAMOS ERROR
                                                            require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/producto.php");
                                                        }
                                                    }
                                                }


                                                ?>


                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>



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