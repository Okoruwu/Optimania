<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");
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


        <br>
        <br>
        <div class="ps-portfolio--detail mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="ps-portfolio__content">
                            <h2 class="ps-portfolio__title">Brindamos a Empresas CAMPAÑAS DE SALUD VISUAL</h2>
                            <p class="ps-portfolio__subtitle">con el objetivo de incluir esta actividad en sus exámenes periódicos anuales y brindar facilidades para que sus colaboradores accedan a corrección visual optima y con respaldo.</p>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="ps-portfolio__content">
                            <div class="ps-review">
                                
                                
                                    <ul class="ps-product__list">
                                        <li>Visitas especializadas a compañías para la revisión visual de sus empleados.</li>
                                        <li>Diagnóstico de condiciones de salud visual.</li>
                                        <li>Detección de casos específicos de defectos visuales.</li>
                                        <li>Formulación de corrección visual.</li>
                                        <li>Descuentos del valor de lentes por nomina.</li>
                                    </ul>
                                


                                    
                            </div>

                        </div>
                    </div>
                </div>
            </div>




            <section class="ps-section--blog" data-background="/img/related-bg.jpg">
                <div class="container">
                    <div class="ps-section__carousel">
                        <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="3500" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="3" data-owl-duration="1500" data-owl-mousedrag="on">
                            <div class="ps-section__item">
                                <div class="ps-blog--latset">
                                    <div class="ps-blog__thumbnail"><a href="#"><img src="/images/01.jpg" alt="alt" /></a>
                                    </div>
                                    <div class="ps-blog__content">
                                        <div class="ps-blog__meta"> <span class="ps-blog__date"></span><a class="ps-blog__author" href="#"></a></div><a class="ps-blog__title" href="#">Examen de la vista</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-section__item">
                                <div class="ps-blog--latset">
                                    <div class="ps-blog__thumbnail"><a href="#"><img src="/images/02.jpg" alt="alt" /></a>
                                    </div>
                                    <div class="ps-blog__content">
                                        <div class="ps-blog__meta"> <span class="ps-blog__date"></span><a class="ps-blog__author" href="#"></a></div><a class="ps-blog__title" href="#">Pláticas Corporativas de Salud Visual</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-section__item">
                                <div class="ps-blog--latset">
                                    <div class="ps-blog__thumbnail"><a href="#"><img src="/images/03.jpg" alt="alt" /></a>
                                    </div>
                                    <div class="ps-blog__content">
                                        <div class="ps-blog__meta"> <span class="ps-blog__date"></span><a class="ps-blog__author" href="#"></a></div><a class="ps-blog__title" href="#">Lentes y goggles de seguridad graduados</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-section__item">
                                <div class="ps-blog--latset">
                                    <div class="ps-blog__thumbnail"><a href="#"><img src="/images/04.jpg" alt="alt" /></a>
                                    </div>
                                    <div class="ps-blog__content">
                                        <div class="ps-blog__meta"> <span class="ps-blog__date"></span><a class="ps-blog__author" href="#"></a></div><a class="ps-blog__title" href="#">Lentes de armazón y contacto graduados.</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>



        </div>



        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/servicios.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/auditivo.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>


</body>



</html>