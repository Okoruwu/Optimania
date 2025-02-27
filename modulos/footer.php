        <footer class="ps-footer ps-footer--1">

            <div class="container">
                <div class="ps-footer__middle">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 text-center">
                                    <div class="ps-footer--address">
                                        <div class="ps-logo">
                                            <a href="/"><img class="img-fluid" src="/img/sticky-logo.png" alt></a>
                                        </div>
                                        <p>Direccion de la sucursal matriz<br>Estado de México, México.</p>
                                        <ul class="ps-social">
                                            <li><a class="ps-social__link facebook" href="#"><i class="fa fa-facebook"></i><span class="ps-tooltip">Facebook</span></a></li>
                                            <li><a class="ps-social__link instagram" href="#"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-footer--bottom">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <p>Copyright © 2023 Optimania. Todos los derechos reservados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>


        <div class="ps-search">
            <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i class="icon-cross"></i></a>
                <h3>Buscar</h3>
                <form action="" method="post">
                    <div class="ps-search-table">
                        <div class="input-group">
                            <input class="form-control ps-input" type="text" placeholder="Buscar...">
                            <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="ps-navigation--footer">
            <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#" id="close-menu"><i class="icon-cross"></i></a></div>
            <div class="ps-nav__item"><a href="/"><i class="icon-home2"></i></a></div>
            <?php

            if (!isset($_SESSION['UserId'])) {
            ?>
                <div class="ps-nav__item"><a href="/acceder"><i class="icon-user"></i></a></div>
                <?php
            } else {
                ?>
                <div class="ps-nav__item"><a href="/cerrar"><i class="icon-exit"></i></a></div>
                <div class="ps-nav__item"><a href="/carrito"><i class="icon-cart-empty"></i><span class="badge"><?php echo $pedidoAbierto['productosCount'] ?></span></a></div>
            <?php
            }
            ?>


        </div>

        <div class="ps-menu--slidebar">
            <div class="ps-menu__content">
                <ul class="menu--mobile">
                    <li class="menu-item-has-children"><a href="/">Inicio</a></li>
                    <li class="menu-item-has-children"><a href="#">Lentes</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="/lentes/sol/tamano/">de Sol</a></li>
                            <li><a href="/lentes/vista/tamano/">de Vista</a></li>
                            <li><a href="/lentes/cotacto/tamano/">de Contacto</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="/sucursales">Sucursales</a></li>
                    <li class="menu-item-has-children"><a href="/promociones">Promociones</a></li>
                    <li class="menu-item-has-children"><a href="/empresas">Empresas</a></li>
                    <li class="menu-item-has-children"><a href="/saludVisual">Salud Visual</a></li>
                    <li class="menu-item-has-children"><a href="/contacto">Contacto</a></li>
                </ul>
            </div>
            <div class="ps-menu__footer">
                <div class="ps-menu__item">
                    <ul class="ps-language-currency">
                        <li class="menu-item-has-children"><a href="#">Español</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                            <ul class="sub-menu">
                                <li><a href="#">English</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="ps-menu__item">
                    <div class="ps-menu__contact">¿Necesitas ayuda? <strong>+52 624 100 2030</strong></div>
                </div>
            </div>
        </div>

        <button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>


        <div class="ps-preloader" id="preloader">
            <div class="ps-preloader-section ps-preloader-left"></div>
            <div class="ps-preloader-section ps-preloader-right"></div>
        </div>


        <div class="modal fade" id="popupLanguage" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ps-popup--select">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="wrap-modal-slider container-fluid">
                            <button class="close ps-popup__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="ps-popup__body">
                                <h2 class="ps-popup__title">Cambiar idioma</h2>
                                <ul class="ps-popup__list">
                                    <li class="language-item"> <a class="active btn" href="javascript:void(0);" data-value="English">English</a></li>
                                    <li class="language-item"> <a class="btn" href="javascript:void(0);" data-value="Deutsch">Español</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>