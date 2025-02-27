<header class="ps-header ps-header--1">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0">Lorem ipsum dolor <b>sit amet, consectetur</b> adipisicing elit.</p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>


    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"> <img src="/img/logo.png" alt><img class="sticky-logo" src="/img/sticky-logo.png" alt></a></div><a class="ps-menu--sticky" href="#"><i class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="#"><i class="icon-magnifier"></i></a></li>

                    <?php

                    if (!isset($_SESSION['UserId'])) {
                    ?>

                        <li><a class="ps-header__item" href="/acceder/"><i class="icon-user"></i></a></li>
                    <?php
                    } else {

                        

                        $totalM = 0;

                        if (isset($UserData['id'])) {

                            $pedidoAbierto = $db->getAllRecords('pedidos', '*', 'AND usuario=' . ($UserData['id']) . ' AND status=1', 'LIMIT 1');
                            if (!empty($pedidoAbierto)) {

                                //SI EXISTE, TOMAMOS TODA SU INFORMACIÓN
                                $pedidoAbierto = $pedidoAbierto[0];

                                //AHORA VERIFICAMOS SI EL USUARIO TIENE UN PEDIDO ABIERTO
                                $prodCarrito = $db->getAllRecords('productosenpedido', '*', 'AND pedido=' . ($pedidoAbierto['id']) . '', 'LIMIT ' . ($pedidoAbierto['productosCount']) . '');

                                if (count($prodCarrito) > 0) {
                                    $total = 0;
                                    $envio = 200;
                                    $totalM = 0;
                                    foreach ($prodCarrito as $prodCar) {
                                        $prodSel = $db->getAllRecords('productos', '*', 'AND id=' . ($prodCar['producto']) . '', 'LIMIT 1');
                                        $prodSel = $prodSel[0];

                                        $totalSel = ($prodSel['precioPub']) * ($prodCar['cantidad']);
                                        $total += $totalSel;
                                        $totalM += ($prodCar['cantidad']);

                                        if ($total > 1000) {
                                            $envio = 0;
                                        }
                                    }

                                    $total = $total + $envio;
                                }
                            } else {
                                $pedidoAbierto['productosCount']=0;
                            }
                        }


                    ?>
                        <li><a class="ps-header__item" href="/cerrar/" id="login-modal"><i class="icon-exit"></i></a>
                        <li><a class="ps-header__item" href="#" id="cart-mini"><i class="icon-cart-empty"></i><span class="badge"><?php echo $pedidoAbierto['productosCount'] ?></span></a>
                            <div class="ps-cart--mini">


                                <ul class="ps-cart__items">




                                    <?php
                                    if ($totalM != 0) {

                                        foreach ($prodCarrito as $prodCar) {
                                            $prodSel = $db->getAllRecords('productos', '*', 'AND id=' . ($prodCar['producto']) . '', 'LIMIT 1');
                                            $prodSel = $prodSel[0];
                                            $totalSel = ($prodSel['precioPub']);
                                    ?>


                                            <li class="ps-cart__item">
                                                <div class="ps-product--mini-cart"><a class="ps-product__thumbnail" href="/producto/?id=<?php echo ($prodSel['id']) ?>"><img alt="<?php echo ($prodSel['nombre']) ?>" src="/upload/productos/<?php echo (strftime("%Y/%m", strtotime(($prodSel['fr'])))); ?>/<?php echo ($prodSel['fPortada']) ?>.jpg" alt="alt" /></a>
                                                    <div class="ps-product__content"><a class="ps-product__name" href="/producto/?id=<?php echo ($prodSel['id']) ?>"><?php echo ($prodSel['nombre']) ?></a>
                                                        <p class="ps-product__meta"> <span class="ps-product__price"><?php echo ($prodCar['cantidad']) ?> × $<?php echo number_format($totalSel) ?></span></p>
                                                    </div><a class="ps-product__remove" href="/carrito/quitar/pedido?delId=<?php echo ($prodCar['id']) ?>"><i class="icon-cross"></i></a>
                                                </div>
                                            </li>


                                    <?php
                                        
                                    }
                                    ?>


                                </ul>
                                <div class="ps-cart__total"><span>Total: <span>$<?php echo number_format($total); ?></span></div>
                                <?php
                                        }
                                    
                                    ?>

                                <div class="ps-cart__footer">
                                    <a class="ps-btn ps-btn--outline" href="/carrito/">Ver carrito</a>
                                    <a class="ps-btn ps-btn--outline" href="/detalles/">Pagar</a>
                                </div>
                            </div>
                        </li>




                    <?php
                    }
                    ?>




                </ul>
                <div class="ps-language-currency"><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupLanguage">Español</a></div>
                <div class="ps-header__search">
                    <form action="" method="post">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text" placeholder="Buscar...">
                                <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-navigation">
        <div class="container">
            <div class="ps-navigation__left">


                <nav class="ps-main-menu">
                    <ul class="menu">
                        <li class="has-mega-menu"><a href="/">Inicio</a></li>
                        <li class="has-mega-menu"><a href="#"> Lentes<span class="sub-toggle"><i class="fa fa-chevron-down"></i></span></a>
                            <div class="mega-menu">
                                <div class="container">
                                    <div class="mega-menu__row">

                                        <div class="mega-menu__column col-12 col-md-4">
                                            <div class="ps-promo">
                                                <div class="ps-promo__item"><img class="ps-promo__banner" src="/img/promotion/01.jpg" alt="alt" />
                                                    <div class="ps-promo__content">
                                                        <h4 class="mb-20 ps-promo__name">de Sol</h4>
                                                        <a class="ps-promo__btn" href="/lentes/sol/tamano/">Ver</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mega-menu__column col-12 col-md-4">
                                            <div class="ps-promo">
                                                <div class="ps-promo__item"><img class="ps-promo__banner" src="/img/promotion/02.jpg" alt="alt" />
                                                    <div class="ps-promo__content">
                                                        <h4 class="mb-20 ps-promo__name">De Vista</h4>
                                                        <a class="ps-promo__btn" href="/lentes/vista/tamano/">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mega-menu__column col-12 col-md-4">
                                            <div class="ps-promo">
                                                <div class="ps-promo__item"><img class="ps-promo__banner" src="/img/promotion/03.jpg" alt="alt" />
                                                    <div class="ps-promo__content">
                                                        <h4 class="ps-promo__name">de Contacto</h4>
                                                        <a class="ps-promo__btn" href="/lentes/contacto/tamano/">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="has-mega-menu"><a href="/sucursales">Sucursales</a></li>
                        <li class="has-mega-menu"><a href="/promociones">Promociones</a></li>
                        <li class="has-mega-menu"><a href="/empresas">Empresas</a></li>
                        <li class="has-mega-menu"><a href="/saludVisual">Salud Visual</a></li>
                        <li class="has-mega-menu"><a href="/contacto">Contacto</a></li>
                    </ul>
                </nav>


            </div>
            <div class="ps-navigation__right">¿Necesitas ayuda? <strong><a href="tel:+52 624 100 2030">+52 624
                        100 2030</a></strong></div>
        </div>
    </div>
</header>