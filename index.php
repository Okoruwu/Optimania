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
        if (isset($_COOKIE["msg"])) {
            require_once($_SERVER["DOCUMENT_ROOT"] . "/include/msg.php");
        } ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/header.php"); ?>


        <section class="ps-section--banner">
            <div class="ps-section__overlay">
                <div class="ps-section__loading"></div>
            </div>
            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">


                <div class="ps-banner" style="background:#DAECFA;">
                    <div class="container container-initial">
                        <div class="ps-banner__block">
                            <div class="ps-banner__content">
                                <h2 class="ps-banner__title">Algún título <br>aquí</h2>
                                <div class="ps-banner__desc">Otra cosa o un subtitulo acá, luego la promo</div>
                                <div class="ps-banner__price"> <span>$1,550</span>
                                    <del>$2,990</del>
                                </div>
                            </div>
                            <div class="ps-banner__thumnail"><img class="ps-banner__round" src="img/round2.png" alt="alt" /><img class="ps-banner__image" src="https://dummyimage.com/600x400/dbdbdb/474747&text=Img de ejemplo" alt="alt" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-banner" style="background:#DAECFA;">
                    <div class="container container-initial">
                        <div class="ps-banner__block">
                            <div class="ps-banner__content">
                                <h2 class="ps-banner__title">Algún título <br>aquí</h2>
                                <div class="ps-banner__desc">Otra cosa o un subtitulo acá, luego la promo</div>
                                <div class="ps-banner__price"> <span>$1,550</span>
                                    <del>$2,990</del>
                                </div>
                            </div>
                            <div class="ps-banner__thumnail"><img class="ps-banner__round" src="img/round2.png" alt="alt" /><img class="ps-banner__image" src="https://dummyimage.com/600x400/dbdbdb/474747&text=Img de ejemplo" alt="alt" />
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <section style="background-color: #fff;" class="ps-banner--round pt-40 mb-50">
            <div class="container mt-4 mb-4">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 style="font-weight: 800; color: #33b1e3;" class="ps-banner__title">Somos una empresa mexicana loca por los lentes.
                            <br>Especialistas en Salud Visual
                        </h4>
                        <p style="font-size: 18px; font-weight: 800; color: #f18500;">Misión es brindar a tus OJOS nitidez y calidad visual.</p>
                    </div>
                </div>

                <div class="ps-banner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ps-banner__thumnail">
                                <img class="ps-banner__image" src="4-02.png" alt>
                            </div>
                        </div>
                        <div class="col-md-6 mt-50">
                            <h2 class="ps-banner__title">¿Por qué <img style="max-width: 250px;" src="img/logo.png" alt>?</h2>
                            <div class="ps-logo"><a href="/"> </a></div>

                            <div class="ps-banner__btn-group">
                                <div class="ps-banner__btn">
                                    <img style="width: 100px;" src="5-02.png" alt>
                                    <p>Descubrirás el amor a primera vista con
                                        <br>nuestros diseños que te encantarán.
                                    </p>
                                </div>
                            </div>

                            <div class="ps-banner__btn-group">
                                <div class="ps-banner__btn">
                                    <img style="width: 100px;" src="7-02.png" alt>
                                    <p>Encontrarás productos resistentes, estéticos y
                                        <br>funcionales que conectarán con tú estilo.
                                    </p>
                                </div>
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