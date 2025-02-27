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



        <section class="ps-section--latest pt-4 mt-4 mb-40">
            <div class="container-fluid">
                <img src="/lentes/banner.jpg" alt="" class="img-fluid mb-4"></a>

            </div>
        </section>

        <div class="ps-contact">
            <div class="container">
                
                <div class="ps-contact__content">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="ps-contact__info">
                                <h2 class="ps-contact__title">Necesitas ayuda?</h2>
                                <p class="ps-contact__text">Escríbenos,estaremos encantados de atenderte.</p>
                                <div class="ps-contact__work">Horarios</div>
                                <div class="ps-contact__email"><a href="info@optimania.com">info@optimania.com.mx</a></div>
                                <ul class="ps-social">
                                    <li><a class="ps-social__link facebook" href="#"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                    <li><a class="ps-social__link instagram" href="#"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="ps-contact__map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3354.822845645748!2d-97.1301607845029!3d32.770434891627616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e7dcf27b929d9%3A0xc63407d6f47753b9!2s1487%20Rocky%20Canyon%20Rd%2C%20Arlington%2C%20TX%2076012%2C%20USA!5e0!3m2!1sen!2s!4v1616124426616!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                        </div>
                    </div>
                </div>
                <form action="http://nouthemes.net/html/mymedi/do_action" method="post">
                    <div class="ps-form--contact">
                        <h2 class="ps-form__title">Llena nuestro formulario</h2>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="ps-form__group">
                                    <input class="form-control ps-form__input" type="text" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="ps-form__group">
                                    <input class="form-control ps-form__input" type="email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="ps-form__group">
                                    <input class="form-control ps-form__input" type="text" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="ps-form__group">
                                    <textarea class="form-control ps-form__textarea" rows="5" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="ps-form__submit">
                            <button class="ps-btn ps-btn--warning">Enviar</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>



        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/agendar.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>


</body>



</html>