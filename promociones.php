<?php session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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


        <section class="mt-50">
            <div class="container mt-50">
                <div class="row mt-50">
                    <div class="ps-home__content">
                        <div class="container">
                            <div class="ps-promo ps-not-padding">
                                <div class="row">

                                    <?php $prodData = $db->getAllRecords('promociones', '*', ' ORDER BY id DESC');
                                    if (count($prodData) > 0) {
                                        $y    =    '';
                                        foreach ($prodData as $promociones) {
                                            $y++;
                                            $userSel = $db->getAllRecords('usuarios', '*', 'AND id="' . $promociones['usuario'] . '" LIMIT 1')[0];
                                    ?>

                                            <div class="col-12 col-md-4 mt-10">
                                                <img src="/upload/promociones/<?php echo (strftime("%Y/%m", strtotime(($promociones['fr'])))); ?>/<?php echo ($promociones['foto']) ?>.jpg" alt="">
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
        </section>


        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/agendar.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>


</body>



</html>