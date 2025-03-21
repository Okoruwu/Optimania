<!DOCTYPE html>
<html lang="en">

<?php include 'resources/head.php'; ?>

<body>
    <div class="ps-page">
        <?php require_once 'resources/config2.php';
        require_once 'resources/navbar.php'; ?>

        <div class="ps-home">
            <section class="ps-section--banner">
                <div class="ps-section__overlay">
                    <div class="ps-section__loading"></div>
                </div>
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000"
                    data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
                    data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                    data-owl-mousedrag="on">

                    <div class="ps-banner" style="background:#f9c77d;">
                        <div class="container-fluid">
                            <div class="ps-banner__block">
                                <img src="banner.jpg" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>

        <section class="ps-banner--round pt-4">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 style="font-weight: 800; color: #33b1e3;" class="ps-banner__title">Somos una empresa
                            mexicana loca por los lentes.
                            <br>Especialistas en Salud Visual
                        </h4>
                        <p style="font-size: 18px; font-weight: 800; color: #f18500;">Misión es brindar a tus OJOS
                            nitidez y calidad visual.</p>
                    </div>
                </div>
            </div>
            <div class="ps-banner">
                <div class="ps-banner__block">
                    <div class="ps-banner__content">
                        <h2 class="ps-banner__title">¿Por qué <img style="max-width: 250px;" src="img/logo.png" alt>?
                        </h2>
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
                    <div class="ps-banner__thumnail"><img class="ps-banner__round" src="img/round5.png" alt><img
                            class="ps-banner__image" src="4-02.png" alt></div>
                </div>
            </div>
        </section>


        <section class="ps-section--latest pt-4 mt-4">
            <div class="container">
                <img src="agenda.png" alt="" class="img-fluid mb-4">
                <h3 class="ps-section__title mt-4">Nuestras Sucursales</h3>
                <div class="ps-section__carousel">
                    <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                        data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2"
                        data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5"
                        data-owl-duration="1000" data-owl-mousedrag="on">

                        <div class="ps-section__product">
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__content text-center">
                                    <h4 style="line-height: 30px; font-size: 18px;"
                                        class="mt-4 ps-section__title text-center">Optimania la Pilita Metepec</h4>
                                    <p style="line-height: 20px;">Av. Hermenegildo Galeana No. 500 Plaza La Pilita
                                        Metepec Colonia San Mateo Metepec Estado de México CP 52140</p>
                                    <p><a
                                            href="https://www.google.com/maps/place/Optiman%C3%ADa+La+Pilita/@19.2585674,-99.5964368,18z/data=!4m5!3m4!1s0x85cd895b7056a5cd:0x75cf3703f9ff0cfb!8m2!3d19.2578881!4d-99.5971279?shorturl=1"><i
                                                class="fa fa-map-marker" aria-hidden="true"></i>
                                            Ver mapa</a></p>
                                    <p style="line-height: 20px;"><b>Horarios:</b><br>Lunes a domingo 11: 00 AM a 8:00
                                        PM</p>
                                    <a class="ps-btn ps-btn--warning w-80" href="">Agendar cita</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php include 'resources/footer.php'; ?>
    </div>
    <div class="ps-search">
        <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i
                    class="icon-cross"></i></a>
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
        <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#" id="close-menu"><i
                    class="icon-cross"></i></a></div>
        <div class="ps-nav__item"><a href="/"><i class="icon-home2"></i></a></div>
        <div class="ps-nav__item"><a href="#"><i class="icon-user"></i></a></div>

        <div class="ps-nav__item"><a href="#"><i class="icon-cart-empty"></i><span class="badge">2</span></a></div>
    </div>
    <div class="ps-menu--slidebar">
        <div class="ps-menu__content">
            <ul class="menu--mobile">
                <li class="menu-item-has-children"><a href="/">Inicio</a></li>
                <li class="menu-item-has-children"><a href="#">Lentes</a><span class="sub-toggle"><i
                            class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">de Sol</a></li>
                        <li><a href="#">de contacto</a></li>
                        <li><a href="#">Oftalomológicos</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Sucursales</a></li>
                <li class="menu-item-has-children"><a href="#">Centro Auditivo</a></li>
                <li class="menu-item-has-children"><a href="#">Contacto</a></li>

            </ul>
        </div>
        <div class="ps-menu__footer">
            <div class="ps-menu__item">
                <ul class="ps-language-currency">
                    <li class="menu-item-has-children"><a href="#">Español</a><span class="sub-toggle"><i
                                class="fa fa-chevron-down"></i></span>
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
    <div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-quickview__body">
                        <button class="close ps-quickview__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-product--detail">
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product--gallery">
                                        <div class="ps-product__thumbnail">
                                            <div class="slide"><img src="img/products/001.jpg" alt="alt" /></div>
                                            <div class="slide"><img src="img/products/047.jpg" alt="alt" /></div>
                                            <div class="slide"><img src="img/products/047.jpg" alt="alt" /></div>
                                            <div class="slide"><img src="img/products/008.jpg" alt="alt" /></div>
                                            <div class="slide"><img src="img/products/034.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="ps-gallery--image">
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/001.jpg"
                                                        alt="alt" />
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/047.jpg"
                                                        alt="alt" />
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/047.jpg"
                                                        alt="alt" />
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/008.jpg"
                                                        alt="alt" />
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/034.jpg"
                                                        alt="alt" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product__info">
                                        <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN
                                                STOCK</span>
                                        </div>
                                        <div class="ps-product__branch"><a href="#">HeartRate</a></div>
                                        <div class="ps-product__title"><a href="#">Blood Pressure Monitor</a></div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select><span class="ps-product__review">(5 Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__meta"><span class="ps-product__price">$77.65</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="d-md-flex align-items-center">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div><a class="ps-btn ps-btn--warning" href="#" data-toggle="modal"
                                                    data-target="#popupAddcartV2">Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="ps-product__type">
                                            <ul class="ps-product__list">
                                                <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text"
                                                        href="#">Health</a><a class="ps-list__text"
                                                        href="#">Thermometer</a>
                                                </li>
                                                <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text"
                                                        href="#">SF-006</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="popupCompare" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ps-compare--popup">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider ps-compare__body">
                        <button class="close ps-compare__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-compare--product">
                            <div class="ps-compare__header">
                                <div class="container">
                                    <h2>Compare Products</h2>
                                </div>
                            </div>
                            <div class="ps-compare__content">
                                <div class="ps-compare__table">
                                    <table class="table ps-table">
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <td>
                                                    <div class="ps-product__remove"><a href="#"><i
                                                                class="fa fa-times"></i></a></div>
                                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                            href="product1.html">
                                                            <figure><img src="img/products/001.jpg" alt></figure>
                                                        </a></div>
                                                    <div class="ps-product__content">
                                                        <h5 class="ps-product__title"><a href="product1.html">Blood
                                                                Pressure Monitor</a></h5>
                                                        <div class="ps-product__meta"><span
                                                                class="ps-product__price">$77.65</span>
                                                        </div>
                                                        <button class="ps-btn ps-btn--warning">Add to cart</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="ps-product__remove"><a href="#"><i
                                                                class="fa fa-times"></i></a></div>
                                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                            href="product1.html">
                                                            <figure><img src="img/products/034.jpg" alt></figure>
                                                        </a></div>
                                                    <div class="ps-product__content">
                                                        <h5 class="ps-product__title"><a href="product1.html">Blood
                                                                Pressure Monitor Upper Arm</a></h5>
                                                        <div class="ps-product__meta"><span
                                                                class="ps-product__del">$64.65</span><span
                                                                class="ps-product__price sale">$86.67</span>
                                                        </div>
                                                        <button class="ps-btn ps-btn--warning">Add to cart</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>
                                                    <ul class="ps-product__list">
                                                        <li class="ps-check-line">5 cleaning programs</li>
                                                        <li class="ps-check-line">Digital display</li>
                                                        <li class="ps-check-line">Memory for 3 user</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="ps-product__list">
                                                        <li class="ps-check-line">5 cleaning programs</li>
                                                        <li class="ps-check-line">Digital display</li>
                                                        <li class="ps-check-line">Memory for 3 user</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Availability</th>
                                                <td>
                                                    <p class="ps-product__text ps-check-line">in stock</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text ps-check-line">in stock</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Weight</th>
                                                <td>
                                                    <p class="ps-product__text">10 kg</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text">10 kg</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Dimensions</th>
                                                <td>
                                                    <p class="ps-product__text">10 × 10 × 10 cm</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text">10 × 10 × 10 cm</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Color</th>
                                                <td>
                                                    <p class="ps-product__text">Red, Navy</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text">Green</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sku</th>
                                                <td>
                                                    <p class="ps-product__text">SF-006</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text">BE-001</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Price</th>
                                                <td><span class="ps-product__price">$77.65</span>
                                                </td>
                                                <td><span class="ps-product__del">$64.65</span><span
                                                        class="ps-product__price sale">$86.67</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="popupLanguage" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ps-popup--select">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid">
                        <button class="close ps-popup__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-popup__body">
                            <h2 class="ps-popup__title">Cambiar idioma</h2>
                            <ul class="ps-popup__list">
                                <li class="language-item"> <a class="active btn" href="javascript:void(0);"
                                        data-value="English">English</a></li>
                                <li class="language-item"> <a class="btn" href="javascript:void(0);"
                                        data-value="Deutsch">Español</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popupAddcart" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-addcart__body">
                        <button class="close ps-addcart__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to cart succesfully</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/015.jpg" alt="alt" /><img
                                                    src="img/products/040.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="#"
                                                    data-toggle="modal" data-target="#popupCompare"><i
                                                        class="fa fa-align-left"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--sale">Sale</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Lens Frame Professional
                                                Adjustable Multifunctional</a></h5>
                                        <div class="ps-product__meta"><span
                                                class="ps-product__price sale">$89.65</span><span
                                                class="ps-product__del">$60.65</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected="selected">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a>
                                            </div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a>
                                            </div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="compare.html"><i
                                                        class="fa fa-align-left"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="ps-addcart__content">
                                    <p>There are two items in your cart.</p>
                                    <p class="ps-addcart__total">Total: <span class="ps-price">$44.00</span></p><a
                                        class="ps-btn ps-btn--border" href="#" data-dismiss="modal"
                                        aria-label="Close">Continue shopping</a><a class="ps-btn ps-btn--border"
                                        href="#">View cart</a><a class="ps-btn ps-btn--warning" href="#">Proceed to
                                        checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="popupAddcartV2" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-addcart__body">
                        <div class="ps-addcart__overlay">
                            <div class="ps-addcart__loading"></div>
                        </div>
                        <button class="close ps-addcart__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to cart succesfully</p>
                        <div class="ps-addcart__product">
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                        <figure><img src="img/products/015.jpg" alt><img src="img/products/040.jpg" alt>
                                        </figure>
                                    </a></div>
                                <div class="ps-product__content">
                                    <div class="ps-product__title"><a>Lens Frame Professional Adjustable
                                            Multifunctional</a></div>
                                    <div class="ps-product__quantity"><span>x2</span></div>
                                    <div class="ps-product__meta"><span class="ps-product__price">$89.65</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-addcart__header">
                            <h3>Want o add one of these?</h3>
                            <p>People who buy this product buy also:</p>
                        </div>
                        <div class="ps-addcart__content">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3"
                                data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3"
                                data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/015.jpg" alt="alt" /><img
                                                    src="img/products/040.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="#"
                                                    data-toggle="modal" data-target="#popupCompare"><i
                                                        class="fa fa-align-left"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--sale">Sale</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Lens Frame Professional
                                                Adjustable Multifunctional</a></h5>
                                        <div class="ps-product__meta"><span
                                                class="ps-product__price sale">$89.65</span><span
                                                class="ps-product__del">$60.65</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected="selected">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a>
                                            </div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a>
                                            </div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="compare.html"><i
                                                        class="fa fa-align-left"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/028.jpg" alt="alt" /><img
                                                    src="img/products/045.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="#"
                                                    data-toggle="modal" data-target="#popupCompare"><i
                                                        class="fa fa-align-left"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                        <div class="ps-product__badge">
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer
                                                X30-Pro</a></h5>
                                        <div class="ps-product__meta"><span
                                                class="ps-product__price sale">$60.39</span><span
                                                class="ps-product__del">$89.99</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a>
                                            </div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a>
                                            </div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="compare.html"><i
                                                        class="fa fa-align-left"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/020.jpg" alt="alt" /><img
                                                    src="img/products/008.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="#"
                                                    data-toggle="modal" data-target="#popupCompare"><i
                                                        class="fa fa-align-left"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--hot">Hot</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Bronze Blood Pressure
                                                Monitor</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price">$56.65 -
                                                $97.65</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected="selected">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a>
                                            </div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a>
                                            </div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="compare.html"><i
                                                        class="fa fa-align-left"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-addcart__footer"><a class="ps-btn ps-btn--border" href="#" data-dismiss="modal"
                                aria-label="Close">No thanks :(</a><a class="ps-btn ps-btn--warning" href="#">Continue
                                to
                                Cart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'resources/JS.php'; ?>
</body>

</html>