<?php
include '../resources/head.php';
include '../resources/navbar.php';
?>

<section class="faq-opti py-5" style="background: #f8f9fa;">
    <div class="container">
        <h1 class="display-4 fw-bold text-center mb-5" style="color: #33b1e3;">Preguntas Frecuentes</h1>

        <div class="row g-4">

            <div class="col-md-6">

                <div class="card faq-card border-0 mb-4">
                    <div class="card-header bg-azul-opti d-flex align-items-center">
                        <i class="fas fa-shopping-cart fa-2x text-white me-3"></i>
                        <h2 class="h4 mb-0 text-white">Pedidos</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-ruler fa-fw me-2" style="color: #f18500;"></i>
                                Tamaño
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="card faq-card border-0">
                    <div class="card-header bg-naranja-opti d-flex align-items-center">
                        <i class="fas fa-file-invoice-dollar fa-2x text-white me-3"></i>
                        <h2 class="h4 mb-0 text-white">Receta</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-credit-card fa-fw me-2" style="color: #33b1e3;"></i>
                                Pagos
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-6">

                <div class="card faq-card border-0 mb-4">
                    <div class="card-header bg-azul-opti d-flex align-items-center">
                        <i class="fas fa-store fa-2x text-white me-3"></i>
                        <h2 class="h4 mb-0 text-white">Tienda</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-truck fa-fw me-2" style="color: #f18500;"></i>
                                Envíos y devoluciones
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card faq-card border-0">
                    <div class="card-header bg-naranja-opti d-flex align-items-center">
                        <i class="fas fa-glasses fa-2x text-white me-3"></i>
                        <h2 class="h4 mb-0 text-white">Productos</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-newspaper fa-fw me-2" style="color: #33b1e3;"></i>
                                Prensa
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include '../resources/footer.php';
include '../resources/JS.php';
?>