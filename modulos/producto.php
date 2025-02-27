<div class="col-6 col-lg-4 p-0">
    <div class="ps-product ps-product--standard">
        <div class="ps-product__thumbnail"><a class="ps-product__image" href="/producto?id=<?php echo $producto['id'] ?>">
                <figure><img src="/upload/productos/<?php echo (strftime("%Y/%m", strtotime(($producto['fr'])))); ?>/<?php echo ($producto['fPortada']) ?>.jpg" alt="alt" />
                </figure>
            </a>
        </div>
        <div class="ps-product__content"><a class="ps-product__branch" href="#">Marca</a>
            <h5 class="ps-product__title"><a href="/producto?id=<?php echo $producto['id'] ?>"><?php echo $producto['nombre'] ?></a></h5>
            <div class="ps-product__meta"><span class="ps-product__price sale">$<?php echo number_format($producto['precioPub'], 2) ?></span><span class="ps-product__del">$<?php echo number_format($producto['precioSinDesc'], 2) ?></span>
            </div>
            <div class="ps-product__actions ps-product__group-mobile">
                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="/carrito/agregar/producto?addId=<?php echo $producto['id'] ?>" >Agregar a carrito</a></div>
                <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
            </div>
        </div>
    </div>
</div>