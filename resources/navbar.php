<?php
require_once 'carrito_functions.php';
?>

<header class="ps-header ps-header--1">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0">Las mejores ofertas solo en <b>Optimania</b> las podras encontrar.</p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>


    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"> <img src="../img/logo.png" alt><img class="sticky-logo"
                        src="../img/sticky-logo.png" alt></a></div><a class="ps-menu--sticky" href="#"><i
                    class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="#"><i class="icon-magnifier"></i></a></li>
                    <li><a class="ps-header__item" href="#" id="login-modal"><i class="icon-user"></i></a>
                        <div class="ps-login--modal">
                            <form method="get" action="http://nouthemes.net/html/mymedi/do_action">
                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="form-control" type="password">
                                </div>

                                <button class="ps-btn ps-btn--warning" type="submit">Acceder</button>
                            </form>
                        </div>
                    </li>

                    <li><a class="ps-header__item" href="#" id="cart-mini"><i class="icon-cart-empty"></i><span
                                class="badge"><?= cantidadProductos() ?></span></a>
                        <div class="ps-cart--mini">
                            <?php if (!empty($_SESSION['carrito'])): ?>
                                <?php foreach ($_SESSION['carrito'] as $item): ?>
                                    <div class="ps-cart__item">
                                        <img src="<?= $item['imagen'] ?>" alt="<?= $item['nombre'] ?>" width="60">
                                        <div class="ps-cart__content">
                                            <p><?= $item['nombre'] ?> (x<?= $item['cantidad'] ?>)</p>
                                            <small>$<?= number_format($item['precio'] * $item['cantidad'], 2) ?></small>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="ps-cart__item">
                                    <p>Carrito vacío</p>
                                </div>
                            <?php endif; ?>

                            <div class="ps-cart__total">
                                <span>Subtotal</span>
                                <span>$<?= number_format(calcularTotal(), 2) ?></span>
                            </div>
                            <div class="ps-cart__footer">
                                <a class="ps-btn ps-btn--outline" href="carrito.php">Ver carrito</a>
                                <a class="ps-btn ps-btn--warning" href="checkout.php">Pagar</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="ps-language-currency"><a class="ps-dropdown-value" href="javascript:void(0);"
                        data-toggle="modal" data-target="#popupLanguage">Español</a></div>
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
                        <li class="has-mega-menu"><a href="#"> Lentes<span class="sub-toggle"><i
                                        class="fa fa-chevron-down"></i></span></a>
                            <div class="mega-menu">
                                <div class="container">
                                    <div class="mega-menu__row">

                                        <div class="mega-menu__column col-12 col-md-4">
                                            <div class="ps-promo">
                                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                                        src="../img/promotion/01.jpg" alt="alt" />
                                                    <div class="ps-promo__content">
                                                        <h4 class="mb-20 ps-promo__name">de Sol</h4>
                                                        <a class="ps-promo__btn" href="LentesSOL.php">Ver</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mega-menu__column col-12 col-md-4">
                                            <div class="ps-promo">
                                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                                        src="../img/promotion/02.jpg" alt="alt" />
                                                    <div class="ps-promo__content">
                                                        <h4 class="mb-20 ps-promo__name">Oftalomológicos</h4>
                                                        <a class="ps-promo__btn" href="LentesOFT.php">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mega-menu__column col-12 col-md-4">
                                            <div class="ps-promo">
                                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                                        src="../img/promotion/03.jpg" alt="alt" />
                                                    <div class="ps-promo__content">
                                                        <h4 class="ps-promo__name">de Contacto</h4>
                                                        <a class="ps-promo__btn" href="LenteCONT.php">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="has-mega-menu"><a href="../modulos/sucursales.php">Sucursales</a></li>
                        <li class="has-mega-menu"><a href="../modulos/Promociones.php">Promociones</a></li>
                        <li class="has-mega-menu"><a href="#">Centro Auditivo</a></li>
                        <li class="has-mega-menu"><a href="#">Contacto</a></li>
                    </ul>
                </nav>


            </div>
            <div class="ps-navigation__right">¿Necesitas ayuda? <strong><a href="tel:+52 624 100 2030">+52 624
                        100 2030</a></strong></div>
        </div>
    </div>
</header>
<header class="ps-header ps-header--1 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0">Lorem ipsum dolor <b>sit amet, consectetur</b> adipisicing elit.</p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"> <img src="../img/mobile-logo.png" alt></a></div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<script>
    document.querySelectorAll('.form-agregar-carrito').forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            try {
                const response = await fetch('', {
                    method: 'POST',
                    body: new FormData(form)
                });

                const badge = document.querySelector('#cart-mini .badge');
                badge.textContent = parseInt(badge.textContent) + 1;

                const miniCart = document.querySelector('.ps-cart--mini');
                fetch(location.href)
                    .then(r => r.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        miniCart.innerHTML = doc.querySelector('.ps-cart--mini').innerHTML;
                    });
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });
</script>